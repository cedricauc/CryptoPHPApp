<?php

namespace App\Controller;

use \App;
use Core\Controller;

class Home extends Controller{

    function __construct(){

    }

    public function index(){

        $this->data = [
            'title' =>"ACCUEIL"
        ] ;

        $this->view('public','home','bootstrap',$this->data);
    }

}
