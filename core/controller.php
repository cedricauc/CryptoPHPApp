<?php

namespace Core;

class Controller {

    public $data = [];

    public function view($_niveau, $_page, $_theme, $_data){
        extract($_data);
        $page = BASE_APP."views/$_niveau/$_page.php";
        $header = BASE_APP."views/$_niveau/header.php";
        $footer = BASE_APP."views/$_niveau/footer.php";
        $theme = "assets/bootstrap/css/$_theme.min.css";
        require BASE_APP . "views/public/template.php";
    }

}

