<?php

include('../../config.php');
include('../DB.php');

if(isset($_GET['id'])){
    $ajax = \DB::connect()->prepare("SELECT * FROM `songs` WHERE id = '$_GET[id]'");
    $ajax->execute();
    $song = $ajax->fetch();
    echo '
        <div class="row margin-bottom-default" id="box-song">
            <a href="'.BASE.'/'.$song['id'].'"><p class="text-right margin-bottom-bigger-in">Next - <span style="color:var(--myBlackDefault)">'.$song['name'].'</span></p></a>
            <figure class="img-small-song text-center margin-bottom-default">
                <img src="'.BASE.'/storage/uploads/'.$song['image'].'" id="image-song" />
            </figure>
            <div class="text-center">
                <h5 id="name-song" class="margin-bottom-small">'.$song['name'].'</h5>
                <p>'.$song['category'].'</p>
            </div>
        
            <div class="row">
                <audio controls autoplay id="audio" class="audio">
                    <source src="'.BASE.'/storage/songs/'.$song['song'].'" type="audio/mp3">
                </audio>
            </div>
        </div>
    ';
}

?>