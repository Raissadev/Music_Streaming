<section class="song-container margin-bottom-bigger h65-vh">
    <div class="wrap w95 center items-flex just-space-between flex-wrap-device-small">
        <div class="col w40 w100-device-small margin-bottom-default-device-small">
            <div class="title margin-bottom-default ">
                <h1>All Songs</h1>
            </div>
            <?php include('components/box-song.php'); ?>
        </div>
        <div class="col w55 w100-device-small">
            <div class="title margin-bottom-default ">
                <h1>Mostly Playled</h1>
            </div>
            <div class="row">
                <ul>
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