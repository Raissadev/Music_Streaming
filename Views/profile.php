<section class="container-profile h65-vh items-flex align-center just-center">
    <form method="post" action="<?= BASE ?>/update-profile" enctype="multipart/form-data" class="wrap w95 items-flex just-space-between flex-wrap-device-small">
        <div class="box w49 w100-device-small margin-bottom-small-device-small">
            <input type="text" name="name" placeholder="Your name" value="<?= $arg['profile']['name'] ?>" autocomplete="off" class="w100 margin-bottom-small" />
            <input type="text" name="email" placeholder="Your email" value="<?= $arg['profile']['email'] ?>"  autocomplete="off" class="w100 margin-bottom-small" />
            <input type="password" name="password" placeholder="Your password" value="<?= $arg['profile']['password'] ?>"  autocomplete="off" class="w100 margin-bottom-bigger" />
            <button type="submit" name="update" class="w30 center bg-gradient">Update</button>
        </div>
        <div class="box w49 w100-device-small">
            <figure class="img-user-bigger text-center">
                <label id="image-put">
                    <img src="<?= BASE ?>/storage/users/<?= $arg['profile']['image'] ?>" />
                    <input type="file" name="image" value="<?= $arg['profile']['image'] ?>" id="image-put" style="display:none" />
                </label>
            </figure>
        </div>
    </form>
</section>