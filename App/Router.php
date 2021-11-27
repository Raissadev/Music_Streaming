<?php

trait RouterContour{

    protected $routes;
    protected $patch;
    protected $httpMethod;

    public function route($name, $data = null): ?string {
        foreach($this->routes as $http_verb){
            foreach($http_verb as $route_item){
                if(!empty($route_item["name"]) && $route_item["name"] == $name){
                    return $this->treat($route_item, $data);
                }
            }
        }
        return null;
    }

    public function redirect($route, $data = null): void {
        if($name = $this->route($route, $data)){
            header("Location: {$name}");
            exit;
        }
        if(filter_var($route, FILTER_VALIDATE_URL)){
            header("Location: {$route}");
            exit;
        }

        $route = (substr($route, 0, 1) == "/" ? $route : "/{$route}");
        header("Location: {$this->projectUrl}{$route}");
        exit;
    }

    protected function addRoute($method, $route, $handler, $name = null): void {
        if($route == "/"){
            $this->addRoute($method, "", $handler, $name);
        }
        preg_match_all("~\{\s* ([a-zA-Z_][a-zA-Z0-9_-]*) \}~x", $route, $keys, PREG_SET_ORDER);
        $routeDiff = array_values(array_diff(explode("/", $this->patch), explode("/", $route)));
        
        $this->formSpoofing();
        $offset = ($this->group ? 1 : 0);
        foreach($keys as $key){
            $this->data[$key[1]] = ($routeDiff[$offset++] ?? null);
        }

        $route = (!$this->group ? $route : "/{$this->group}{$route}");
        $data = $this->data;
        $namespace = $this->namespace;
        $router = function () use ($method, $handler, $data, $route, $name, $namespace){
            return [
                "route" => $route,
                "name" => $name,
                "method" => $method,
                "handler" => $this->handler($handler, $namespace),
                "action" => $this->action($handler),
                "data" => $data,
            ];
        };

        $route = preg_replace('~{([^}]*)}~', "([^/]+)", $route);
        $this->routes[$method][$route] = $router();
    }

    private function handler($handler, $namespace){
        return (!is_string($handler) ? $handler : "{$namespace}\\" . explode($this->separator, $handler)[0]);
    }

    private function action($handler): ?string{
        return (!is_string($handler) ?: (explode($this->separator, $handler)[1] ?? null));
    }

    private function treat($route_item, $data = null): ?string{
        $route = $route_item["route"];
        if(!empty($data)) {
            $arguments = [];
            $params = [];
            foreach($data as $key => $value){
                if(!strstr($route, "{{$key}}")){
                    $params[$key] = $value;
                }
                $arguments["{{$key}}"] = $value;
            }
            $route = $this->process($route, $arguments, $params);
        }

        return "{$this->projectUrl}{$route}";
    }

    private function process($route, $arguments, $params = null): string {
        $params = (!empty($params) ? "?" . http_build_query($params) : null);
        return str_replace(array_keys($arguments), array_values($arguments), $route) . "{$params}";
    }

}

abstract class Dispatch{

    use RouterContour;

    protected $route;
    protected $projectUrl;
    protected $separator;
    protected $namespace;
    protected $group;
    protected $data;
    protected $error;

    public const BAD_REQUEST = 400;
    public const NOT_FOUND = 404;
    public const METHOD_NOT_ALLOWED = 405;
    public const NOT_IMPLEMENTED = 501;

    public function __construct($projectUrl, $separator = ":"){
        $this->projectUrl = (substr($projectUrl, "-1") == "/" ? substr($projectUrl, 0, -1) : $projectUrl);
        $this->patch = (filter_input(INPUT_GET, "route", FILTER_DEFAULT) ?? "/");
        $this->separator = ($separator ?? ":");
        $this->httpMethod = $_SERVER['REQUEST_METHOD'];
    }

    public function __debugInfo(){
        return $this->routes;
    }

    public function namespace($namespace): Dispatch {
        $this->namespace = ($namespace ? ucwords($namespace) : null);
        return $this;
    }

    public function group($group): Dispatch {
        $this->group = ($group ? str_replace("/", "", $group) : null);
        return $this;
    }

    public function data(){
        return $this->data;
    }

    public function error(){
        return $this->error;
    }

    public function dispatch(){
        if(empty($this->routes) || empty($this->routes[$this->httpMethod])) {
            return false;
        }

        $this->route = null;
        foreach($this->routes[$this->httpMethod] as $key => $route){
            if(preg_match("~^" . $key . "$~", $this->patch, $found)){
                $this->route = $route;
            }
        }

        return $this->execute();
    }

    private function execute(){

        if($this->route){
            if(is_callable($this->route['handler'])){
                call_user_func($this->route['handler'], ($this->route['data'] ?? []));
                return true;
            }

            $controller = $this->route['handler'];
            $method = $this->route['action'];

            if(class_exists($controller)) {
                $newController = new $controller($this);
                if(method_exists($controller, $method)){
                    $newController->$method(($this->route['data'] ?? []));
                    return true;
                }

                $this->error = self::METHOD_NOT_ALLOWED;
                return false;
            }

            $this->error = self::BAD_REQUEST;
            return false;
        }

        $this->error = self::NOT_FOUND;
        return false;

    }

    protected function formSpoofing(): void {
        $post = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        if(!empty($post['_method']) && in_array($post['_method'], ["PUT", "PATCH", "DELETE"])) {
            $this->httpMethod = $post['_method'];
            $this->data = $post;

            unset($this->data["_method"]);
            return;
        }

        if($this->httpMethod == "POST") {
            $this->data = filter_input_array(INPUT_POST, FILTER_DEFAULT);

            unset($this->data["_method"]);
            return;
        }

        if(in_array($this->httpMethod, ["PUT", "PATCH", "DELETE"]) && !empty($_SERVER['CONTENT_LENGTH'])){
            parse_str(file_get_contents('php://input', false, null, 0, $_SERVER['CONTENT_LENGTH']), $putPatch);
            $this->data = $putPatch;

            unset($this->data["_method"]);
            return;
        }

        $this->data = [];
        return;
    }
}

class Router extends Dispatch{

    public function __construct($projectUrl, $separator = ":"){
        parent::__construct($projectUrl, $separator);
    }

    public function post($route, $handler, $name = null): void {
        $this->addRoute("POST", $route, $handler, $name);
    }

    public function get($route, $handler, $name = null): void {
        $this->addRoute("GET", $route, $handler, $name);
    }

    public function put($route, $handler, $name = null): void {
        $this->addRoute("PUT", $route, $handler, $name);
    }

    public function patch($route, $handler, $name = null): void {
        $this->addRoute("PATCH", $route, $handler, $name);
    }

    public function delete($route, $handler, $name = null): void {
        $this->addRoute("DELETE", $route, $handler, $name);
    }

}

?>