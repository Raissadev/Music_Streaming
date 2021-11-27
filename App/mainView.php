<?php

class mainView{

    public static function render($filename, $arg = [], $header = './Views/theme/header.php', $footer = './Views/theme/footer.php'){
        include($header);
        include("./Views/{$filename}.php");
        include($footer);
        die();
    }

    public static function renderAccess($filename, $arg = [], $header = './Views/theme/header-access.php'){
        include($header);
        include("./Views/{$filename}.php");
        die();
    }

}

?>