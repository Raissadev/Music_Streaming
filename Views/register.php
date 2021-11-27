<section class="container h100 items-flex align-center just-center">
    <div class="wrap w40">
        <form action="<?=BASE?>/register" method="POST" enctype="multipart/form-data" class="form-access items-flex align-center just-center flex-wrap">
            <input type="text" name="name" required placeholder="Your name" class="w100 margin-bottom-small" autocomplete="off" />
            <input type="text" name="email" required placeholder="Your email" class="w100 margin-bottom-small" autocomplete="off" />
            <input type="file" name="image" required accept="image/png, image/jpeg" class="w100 margin-bottom-small" />
            <input type="password" name="password" required placeholder="Your password" class="w100 margin-bottom-small"  />
            <button type="submit" name="register" class="w30 margin-bottom-default">Sign Up</button>
            <div class="w100 text-right">
                <p>Already have an account? <a href="<?= BASE.'/login' ?>">Log in!</a></p>
            </div>
        </form>
    </div>
</section>
