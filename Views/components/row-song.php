<li class="box items-flex align-center just-space-between margin-bottom-small">
    <div class="col w30 items-flex align-center">
        <h6><?= isset($song['id']) ? $song['id'] : $arg['getArtist']['id'] ?></h6>
        <figure class="img-small-in-song margin-side-default">
            <img src="<?= BASE ?>/storage/uploads/<?= $song['image'] ?>" />
        </figure>
        <h6><?= $song['category'] ?></h6>
    </div>
    <div class="col w30 text-center hide-device-small">
        <p><?php echo isset($user['name']) ? $user['name'] : $arg['getArtist']['name'] ?></p>
    </div>
    <div class="col w30 items-flex align-center just-space-between">
        <p><?= $song['views'] ?></p>
        <div class="pos-relative">
            <input id="check-id" type="checkbox" name="id-value" value="<?= $song['id'] ?>"  />
            <i data-feather="skip-forward"></i>
        </div>
    </div>
</li>