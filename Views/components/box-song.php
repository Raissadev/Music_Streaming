<div class="box box-song-one toc-song">
    <div class="row margin-bottom-default" id="box-song">
        <a href="<?= BASE ?>/music/<?php echo $arg['song']['id'] ?>"><p class="text-right margin-bottom-bigger-in">See - <span style="color:var(--myBlackDefault)"><?php echo $arg['song']['name']; ?></span></p></a>
        <figure class="img-small-song text-center margin-bottom-default">
            <img src="<?= BASE ?>/storage/uploads/<?= $arg['song']['image'] ?>" id="image-song" />
        </figure>
        <div class="text-center">
            <h5 id="name-song" class="margin-bottom-small"><?= $arg['song']['name'] ?></h5>
            <p><?= $arg['song']['category'] ?></p>
        </div>
        
        <div class="row">
            <audio controls autoplay id="audio" class="audio">
                <source src="<?= BASE ?>/storage/songs/<?= $arg['song']['song'] ?>" type="audio/mp3">
            </audio>
        </div>
    </div>

    <div class="col items-flex align-center just-space-evenly">
        <a><i data-feather="shuffle"></i></a>
        <a id="minus-seconds"><i data-feather="rewind"></i></a>
        <a class="button-icon-emphasis" id="button-play"><i data-feather="play"></i></a>
        <a class="hide button-icon-emphasis" id="button-pause"><i data-feather="pause"></i></a>
        <a id="plus-seconds"><i data-feather="fast-forward"></i></a>
        <a id="reset-audio"><i data-feather="repeat"></i></a>
    </div>
</div>
