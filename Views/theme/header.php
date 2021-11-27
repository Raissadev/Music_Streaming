<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="<?= BASE ?>/css/global.css" rel="stylesheet" />
    <link href="<?= BASE ?>/css/style.css" rel="stylesheet" />
    <script src="https://unpkg.com/feather-icons"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;300;400;500;600;700;800&display=swap" rel="stylesheet">
    <title>MySoongs</title>
</head>
<body>
    
<main class="items-flex h100">

    <aside class="aside w20 w70-device-small hide-device-small">
        <div class="wrap h100">
            <div class="logo pos-relative items-flex align-center margin-bottom-bigger">
                <span></span>
                <span></span>
                <span></span>
            </div>
            <div class="col h100">
                <nav class="menu h100">
                    <ul class="margin-bottom-bigger">
                        <li><a href="<?=BASE?>/"><i data-feather="home"></i> Home</a></li>
                        <li><a href="<?=BASE?>/songs"><i data-feather="compass"></i> Browse</a></li>
                        <li><a href="<?=BASE?>/playlist"><i data-feather="image"></i> Album</a></li>
                        <?php if(isset($_SESSION['login'])){ ?>
                        <li><a href="<?=BASE?>/profile"><i data-feather="user"></i> Profile</a></li>
                        <?php }else{ ?>
                        <li><a href="<?=BASE?>/login"><i data-feather="user"></i> Login</a></li>
                        <?php } ?>
                        <li><a href="<?=BASE?>/podcasts"><i data-feather="video"></i> Videos</a></li>
                    </ul>
                    <ul class="margin-bottom-bigger">
                        <h6>MY MUSICS</h6>
                        <li><a href="<?=BASE?>/recently-playled"><i data-feather="clock"></i> Recently Playled</a></li>
                        <li><a href="<?=BASE?>/create-song"><i data-feather="file"></i> New Song</a></li>
                    </ul>
                    <ul class="margin-bottom-bigger">
                        <h6>PLAYLIST</h6>
                        <li><a href="<?=BASE?>">General Playlist</a></li>
                        <li><a href="<?=BASE?>">Ease up beast</a></li>
                        <li><a href="<?=BASE?>">Pop songs</a></li>
                        <li><a href="<?=BASE?>">Mood swings</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </aside>

<main class="main-content w80 h100 w100-device-small">
    <header class="margin-bottom-bigger">
        <nav class="wrap w95 center items-flex align-center just-space-between">
            <form method="POST" action="<?= BASE ?>/" class="col w50 search items-flex align-center w50-device-small">
                <i data-feather="command" class="margin-right-default hide-device-small"></i>
                <div class="pos-relative">
                    <button type="submit" name="search" class="submit-input style-none"><i data-feather="search"></i></button>
                    <input type="text" name="name_search" placeholder="Search..." autocomplete="off" class="search-input w100" id="search-input" value="" />
                    <div class="box search-results hide">
                        <ul>
                            <?php
                                foreach($arg['results'] as $key => $result){
                            ?>
                            <li class="margin-bottom-small">
                                <a class="items-flex align-center">
                                    <figure class="img-user-small items-flex aling-center margin-right-small">
                                        <img src="<?= BASE ?>/storage/uploads/<?= $result['image'] ?>" />
                                    </figure>
                                    <h6><?= $result['name'] ?></h6>
                                </a>
                            </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </form>
            <div class="row w50 h100 items-flex just-end align-center">
                <div class="col h100 items-flex align-center hide-device-small">
                    <figure class="img-user-small margin-right-small">
                        <img src="<?=BASE?>/storage/users/<?=$_SESSION['image']?>" />
                    </figure>
                    <h6><?= $_SESSION['name']; ?></h6>
                </div>
                <div class="col w20 items-flex align-center just-center w80-device-small">
                    <?php if(isset($_SESSION['login'])){ ?>
                    <a href="<?= BASE ?>/logout" class="margin-right-default"><i data-feather="power"></i></a>
                    <?php }else{ ?>
                    <a href="<?= BASE ?>/login" class="margin-right-default"><i data-feather="log-in"></i></a>
                    <?php } ?>
                    <a href="<?= BASE.'/profile' ?>"><i data-feather="settings"></i></a>
                    <a class="toggle margin-left-default hide-device-bigger"><i data-feather="menu"></i></a>
                </div>
            </div>
        </nav>
        <div class="paste-format-desing pos-relative w95 center">
            <span></span>
        </div>
    </header>
