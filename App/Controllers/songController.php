<?php

namespace Controllers;
use mainView;
use Models\User;
use Models\Song;

class songController{

    public function createSong(){
        if(isset($_POST['create_song'])){
            $createSong = Song::createSong($_SESSION['id'], $_POST['name'], $_POST['description'], $_FILES['image'], $_FILES['video'], $_FILES['song'], $_POST['category'], $_POST['type']);
        }
        mainView::render('create-song', []);
    }

    public function getSong($data){
        if($data){
            $results = Song::getResults(isset($_POST['name_search']) ? $_POST['name_search'] : '');
            $songs = Song::get();
            $getSong = Song::getSongArtist($data['id']);
            $getArtist = Song::getArtist($getSong['user_id']);
            isset($data['id']) ? $song = Song::getSong($data['id']) : Song::getSong('1');
            $_SESSION['songs'][] = $data['id'];
        }
        mainView::render('song', [ 'results' => $results, 'getSong' => $getSong, 'getArtist' => $getArtist, 'songs' => $songs, 'song' => $song ]);
    }

    public static function getPodcasts(){
        $results = Song::getResults(isset($_POST['name_search']) ? $_POST['name_search'] : '');
        $podcasts = Song::podcasts();
        $users = User::get();
        mainView::render('podcasts', [ 'results' => $results, 'podcasts' => $podcasts, 'users' => $users ]);
    }

    public static function allSongs($data){
        $results = Song::getResults(isset($_POST['name_search']) ? $_POST['name_search'] : '');
        $song = $data !== null ? $song = Song::getSong($data) : Song::getSong('1');
        $songs = Song::get();
        $users = User::get();
        mainView::render('songs', [ 'results' => $results, 'songs' => $songs, 'users' => $users, 'song' => $song ]);  
    }

    public static function addSongAlbum(){
        $insertAlbum = Song::addSongAlbum($_POST['song_id']);
        header('Location: '.BASE.'/playlist');
    }

}

?>