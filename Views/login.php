<section class="container h100 items-flex align-center just-center">
    <div class="wrap w40">
        <form action="<?=BASE?>/login" method="POST" class="form-access items-flex align-center just-center flex-wrap">
            <input type="text" name="email" required placeholder="You email" class="w100 margin-bottom-small" autocomplete="off" />
            <input type="password" name="password" required placeholder="You password" class="w100 margin-bottom-small" autocomplete="off" />
            <button type="submit" name="login" class="w30 margin-bottom-default">Sign In</button>
            <div class="w100 text-right">
                <p>Don't have an account? <a href="<?= BASE.'/register' ?>">Create!</a></p>
            </div>
        </form>
    </div>
</section>

