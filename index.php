<?php

require_once("config.php");

$router = new Router(BASE);

$router->namespace("Controllers");

$router->get("/", "userController:home");
$router->get("/profile", "userController:profile");
$router->get("/login", "userController:login");
$router->get("/register", "userController:register");
$router->get("/create-song", "songController:createSong");
$router->get("/songs", "songController:allSongs");
$router->get("/playlist", "userController:myPlaylist");
$router->get("/podcasts", "songController:getPodcasts");
$router->get("/recently-playled", "userController:getRecentlysPlayleds");
$router->get("/music/{id}", "songController:getSong");
$router->get("/logout", "userController:logout");

$router->post("/login", "userController:login");
$router->post("/register", "userController:register");
$router->post("/create-song", "songController:createSong");
$router->post("/add-album", "songController:addSongAlbum");
$router->post("/", "userController:home");

$router->post("/update-profile", "userController:updateProfile");

$router->group("error")->namespace("Test");
$router->get("/{errcode}", "Coffee:notFound");

$router->dispatch();

if ($router->error()) {
    var_dump($router->error());
    //router->redirect("/error/{$router->error()}");
}

?>