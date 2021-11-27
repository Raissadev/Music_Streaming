<?php

namespace Models;

class Song{

    protected $table = 'users';

    private $id;

    protected $fillable = [
        'id',
        'name',
        'description',
        'image',
        'video',
        'song'
    ];

    public static function createSong($user_id, $name, $description, $image, $video, $song, $category, $type){
        if($name == '' || $description == '' || $image == '' || $video == '' || $category == '' || $type == ''){
            echo "<script> alert('Preencha todos os campos!') </script>";
            header("Refresh");
            return;
        }
        $insertSong = \DB::connect()->prepare("INSERT INTO `songs` VALUES (null,?,?,?,?,?,?,?,?,?,?)");
        $insertSong->execute(array($user_id, $name, $description, $image['name'], $video['name'], $song['name'], $category, $type, '0',date("Y-m-d H-i-s")));
        move_uploaded_file($image['tmp_name'], BASE_IMAGES_SONGS.$image['name']);
        move_uploaded_file($video['tmp_name'], BASE_VIDEOS.$video['name']);
        move_uploaded_file($song['tmp_name'], BASE_SONGS.$song['name']);
        if($insertSong){
            echo "<script> alert('Música cadastrada com sucesso!') </script>";
            header("Refresh");
        }
    }

    public static function get(){
        $songs = \DB::connect()->prepare("SELECT * FROM `songs`");
        $songs->execute();
        $songs = $songs->fetchAll();
        return $songs;
    }

    public static function getSong($data){
        $songs = \DB::connect()->prepare("SELECT * FROM `songs`");
        $songs->execute();
        $songs = $songs->fetch();
        return $songs;
    }

    public static function getSongArtist($data){
        $songs = \DB::connect()->prepare("SELECT * FROM `songs` WHERE id = '$data'");
        $songs->execute();
        $songs = $songs->fetch();
        if($songs){
            $views = ($songs['views'] + 1);
            $songsUpdate = \DB::connect()->prepare("UPDATE `songs` SET views = ? WHERE id = '$data'");
            $songsUpdate->execute(array($views));
        }
        return $songs;
    }

    public static function getArtist($getSong){
        $artist = \DB::connect()->prepare("SELECT * FROM `users` WHERE id = '$getSong'");
        $artist->execute();
        $artist = $artist->fetch();
        return $artist;
    }

    public static function getResults($name){
        $query = '';
        if($name){
            $query = "WHERE name LIKE '$name%'";
        }
        $results = \DB::connect()->prepare("SELECT * FROM `songs` $query");
        $results->execute();
        $results = $results->fetchAll();
        if(count($results) == 0){
            echo "<script> alert('Nenhuma música encontrada!') </script>";
        }else{
            return $results;
        }
    }

    public static function getMyPlaylist($data){
        if($data){
            $playlist = \DB::connect()->prepare("SELECT * FROM `playlist` WHERE user_id = '$data'");
            $playlist->execute();
            $playlist = $playlist->fetch();
            return $playlist;
        }
    }

    public static function podcasts(){
        $podcast = \DB::connect()->prepare("SELECT * FROM `songs` WHERE type = 'podcast'");
        $podcast->execute();
        $podcast = $podcast->fetchAll();
        return $podcast;
    }

    public static function addSongAlbum($song){
        $album = \DB::connect()->prepare("SELECT * FROM `playlist` WHERE user_id = '$_SESSION[id]'");
        $album->execute();
        $album = $album->fetch();
        if($album['user_id'] == $_SESSION['id']){
            $songPlus = $album['song_id'].','.$song;
            $insertAlbum = \DB::connect()->prepare("UPDATE `playlist` SET song_id = ? WHERE user_id = '$_SESSION[id]'");
            $insertAlbum->execute(array($songPlus));
        }
        else{
            $insertAlbum = \DB::connect()->prepare("INSERT INTO `playlist` VALUES (null,?,?)");
            $insertAlbum->execute(array($_SESSION['id'],$song));
        }
    }

}

?>