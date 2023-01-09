<?php

namespace Core;

class Controller {

    public array $data = [];

    public function view($_niveau, $_page, $_data){
        extract($_data);
        $page = BASE_APP."views/$_niveau/$_page.php";
        $header = BASE_APP."views/$_niveau/header.php";
        $footer = BASE_APP."views/$_niveau/footer.php";
        require_once BASE_APP . "views/public/template.php";
    }

}

