<section class="container-profile h65-vh items-flex align-center just-center">
    <form method="post" action="<?=BASE?>/create-song" enctype="multipart/form-data" class="wrap w95 items-flex just-space-between flex-wrap-device-small">
        <div class="box w49 w100-device-small margin-bottom-small-device-small">
            <input type="text" name="name" placeholder="Name" autocomplete="off" class="w100 margin-bottom-small" />
            <textarea name="description" placeholder="Description" class="w100 margin-bottom-small"></textarea>
            <select name="category" class="w100 margin-bottom-small">
                <option value="Pop">Pop</option>
                <option value="Rock">Rock</option>
                <option value="Funk">Funk</option>
                <option value="Eletronica">Eletrônica</option>
                <option value="Country">Country</option>
                <option value="Axé">Axé</option>
                <option value="Forro">Forró</option>
                <option value="Hip-Hop">Hip Hop</option>
                <option value="Gospel">Gospel</option>
            </select>
            <select name="type" class="w100 margin-bottom-default">
                <option value="music">Music</option>
                <option value="podcast">Podcast</option>
            </select>
            <button type="submit" name="create_song" class="w30 center bg-gradient">Create!</button>
        </div>
        <div class="box w49 items-flex align-center just-space-evenly flex-wrap w100-device-small">
            <label for="image-song" class="format-send-image">
                <p>Image</p>
                <i data-feather="image"></i>
                <input type="file" name="image" id="image-song" class="hide" accept="image/png, image/jpeg" />
            </label>
            <label for="video" class="format-send-image">
                <p>Video</p>
                <i data-feather="video"></i>
                <input type="file" name="video" id="video" class="hide" accept="video/mp4" />
            </label>
            <label for="song" class="format-send-image">
                <p>Song</p>
                <i data-feather="music"></i>
                <input type="file" name="song" id="song" class="hide" accept="audio/mp3" />
            </label>
        </div>
    </form>
</section>
