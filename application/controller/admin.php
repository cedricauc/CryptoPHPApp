<?php

namespace App\Controller;

use \App;
use Core\Controller;

class Admin extends Controller{

    function __construct(){

    }

    public function index(){

        $this->data = [
            'title' =>"ADMIN"
        ] ;

        $this->view('public/admin','dashboard','admin',$this->data);
    }

}
