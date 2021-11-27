<section class="container-song-player margin-bottom-bigger">
    <div class="wrap w95 center">
        <div class="title margin-bottom-default">
            <p class="margin-bottom-small">Music Five Strongs 🔥</p>
            <h1>New Musics</h1>
        </div>
        <figure style="background-image:url('<?= BASE ?>/storage/uploads/<?= $arg['getSong']['image'] ?>');" class="banner-song items-flex align-end pos-relative">
            <div class="col w100">
                <p class="margin-bottom-small">Artist <?= ($arg['getArtist']['name']) ?></p>
                <h1><?= $arg['getSong']['name'] ?></h1>
                <form method="post" action="<?= BASE ?>/add-album" class="items-flex w100 margin-top-default">
                    <input type="hidden" name="song_id" value="<?= $arg['getSong']['id'] ?>" />
                    <button type="submit" name="add-album" class="w17 w60-device-small">Add Album</button>
                </form>
            </div>
        </figure>
    </div>
</section>

<section class="song-container margin-bottom-bigger">
    <div class="wrap w95 center items-flex just-space-between flex-wrap-device-small">
        <div class="col w40 w100-device-small margin-bottom-default-device-small">
            <div class="title margin-bottom-default">
                <h1>Now Planyng</h1>
            </div>
            <?php include('components/box-song.php'); ?>
        </div>
        <div class="col w55 w100-device-small">
            <div class="title margin-bottom-default">
                <h1>Mostly Playled</h1>
            </div>
            <div class="row">
                <ul>
                <form method="GET">
                <?php
                    foreach($arg['songs'] as $key => $song){
                        if($arg['getArtist']['0'] == $song['user_id']){
                            include('components/row-song.php');
                        }
                    } 
                  ?>
                 </form>
                </ul>
            </div>
        </div>
    </div>
</section>