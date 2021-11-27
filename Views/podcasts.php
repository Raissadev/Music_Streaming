<section class="container-songs margin-bottom-bigger">
    <div class="wrap w95 center">
        <div class="title margin-bottom-default">
            <div class="col">
                <h1>New Podcasts</h1>
            </div>
        </div>
        <div>
            <ul class="items-flex flex-wrap">
                <?php
                    foreach($arg['podcasts'] as $key => $podcasts){
                        foreach($arg['users'] as $key => $user){
                            if($user['id'] == $podcasts['user_id']){
                ?>
                <li class="w17 box-song margin-right-default margin-bottom-default min-w45-device-small">
                    <a href="<?= BASE ?>/music/<?= $podcasts['id'] ?>">
                        <figure class="img-default-song margin-bottom-small">
                            <img src="<?= BASE ?>/storage/uploads/<?= $podcasts['image'] ?>" />
                        </figure>
                        <h6><?= $podcasts['name'] ?></h6>
                        <p><?= $podcasts['name'] ?></p>
                    </a>
                </li>
                <?php }}} ?>
            </ul>
        </div>
    </div>
</section>