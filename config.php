<?php

session_start();
date_default_timezone_set('America/Sao_Paulo');

$autoload = function($class){
    if(file_exists("App/$class.php")){
        include("App/$class.php");
    }
    if(file_exists("App/Controllers/$class.php")){
        include("App/Contollers/$class.php");
    }
    if(file_exists("App/Models/$class.php")){
        include("App/Models/$class.php");
    }
};

spl_autoload_register($autoload);

define("HOST","localhost");
define("USER","root");
define("PASSWORD","");
define("DATABASE","database");
define("BASE","http://localhost");
define("BASE_UPLOADS",__DIR__.'/storage/users/');
define("BASE_IMAGES_SONGS",__DIR__.'/storage/uploads/');
define("BASE_SONGS",__DIR__.'/storage/songs/');
define("BASE_VIDEOS",__DIR__.'/storage/videos/');

if(!isset($_SESSION['login'])){
    $_SESSION['id'] = hexdec(uniqid());
    $_SESSION['name'] = 'Visitante';
    $_SESSION['email'] = '';
    $_SESSION['password'] = '';
    $_SESSION['image'] = 'user-one.png';
}

?>
