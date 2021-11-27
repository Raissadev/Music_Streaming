<section class="container-songs margin-bottom-bigger">
    <div class="wrap w95 center">
        <div class="title margin-bottom-default items-flex align-center">
            <div class="col w50">
                <h1>New Musics</h1>
            </div>
            <div class="col w50 items-flex align-center just-end">
                <a class="button left-arrow"><i data-feather="arrow-left"></i></a>
                <a class="button right-arrow margin-left-small"><i data-feather="arrow-right"></i></a>
            </div>
        </div>
        <div class="slide">
            <ul class="slide-ul items-flex">
                <?php
                    foreach($arg['songs'] as $key => $song){
                        foreach($arg['users'] as $key => $user){
                            if($user['id'] == $song['user_id']){
                ?>
                <li class="w20 box-song box-one margin-right-default min-w45-device-small">
                    <a href="<?= BASE ?>/music/<?= $song['id'] ?>">
                        <figure class="img-default-song margin-bottom-small">
                            <img src="<?= BASE ?>/storage/uploads/<?= $song['image'] ?>" />
                        </figure>
                        <h6><?= $song['name'] ?></h6>
                        <p><?= $user['name'] ?></p>
                    </a>
                </li>
                <?php }}} ?>
            </ul>
        </div>
    </div>
</section>


<section class="song-container margin-bottom-bigger">
    <div class="wrap w95 center items-flex just-space-between flex-wrap-device-small">
        <div class="col w40 w100-device-small margin-bottom-default-device-small">
            <div class="title margin-bottom-default ">
                <h1>Now Planyng</h1>
            </div>
            <?php include('components/box-song.php'); ?>
        </div>
        <div class="col w55 w100-device-small">
            <div class="title margin-bottom-default ">
                <h1>Mostly Playled</h1>
            </div>
            <div class="row">
                <ul class="ul-song">
                <form method="GET">
                <?php
                    foreach($arg['songs'] as $key => $song){
                        foreach($arg['users'] as $key => $user){
                            if($user['id'] == $song['user_id']){
                                include('components/row-song.php');
                            }
                        }
                    } 
                  ?>
                 </form>
                </ul>
            </div>
        </div>
    </div>
</section>