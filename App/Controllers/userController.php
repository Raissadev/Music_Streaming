<?php

namespace Controllers;
use mainView;
use Models\User;
use Models\Song;

class userController{

    public function home($data){
        $users = User::get();
        $songs = Song::get();
        $song = $data !== null ? $song = Song::getSong($data) : Song::getSong('1');
        $results = Song::getResults(isset($_POST['name_search']) ? $_POST['name_search'] : '');
        mainView::render('home', [ 'users' => $users, 'songs' => $songs, 'results' => $results, 'song' => $song ]);
    }

    public function login(){
        if(isset($_POST['login'])){
            $signIn = User::signIn($_POST['email'],$_POST['password']);
        }
        mainView::renderAccess('login', []);
    }

    public function register(){
        if(isset($_POST['register'])){
            $signUp = User::signUp($_POST['name'], $_POST['email'], $_POST['password'], $_FILES['image']);
            header('Location: '.BASE.'');
        }
        mainView::renderAccess('register', []);
    }

    public static function myPlaylist($data){
        $songs = Song::get();
        $users = User::get();
        $getSong = $data !== null ? $song = Song::getSong($data) : Song::getSong('1');
        $results = Song::getResults(isset($_POST['name_search']) ? $_POST['name_search'] : '');
        $playlist = Song::getMyPlaylist($_SESSION['id']);
        mainView::render('playlist', [ 'playlist' => $playlist,  'results' => $results, 'song' => $song, 'users' => $users, 'songs' => $songs ]);
    }

    public static function profile(){
        $profile = User::profile($_SESSION['id']);
        mainView::render('profile', [ 'profile' => $profile ]);
    }

    public static function updateProfile(){
        if(isset($_POST['update'])){
            $update = User::updateProfile($_SESSION['id'], $_POST['name'], $_POST['email'], $_POST['password'], $_FILES['image']);
            header("Location: ".BASE.'/profile');
        }
    }

    public static function getRecentlysPlayleds($data){
        $songs = Song::get();
        $users = User::get();
        $song = $data !== null ? $song = Song::getSong($data) : Song::getSong('1');
        $results = Song::getResults(isset($_POST['name_search']) ? $_POST['name_search'] : '');
        mainView::render('recently-playled', [ 'results' => $results, 'song' => $song, 'users' => $users, 'songs' => $songs ]);
    }

    public static function logout($data){
        $user = User::logout($data);
        header('Location: '.BASE.'/login');
    }

}


?>