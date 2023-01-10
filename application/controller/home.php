<?php

namespace App\Controller;

use \App;
use Core\Controller;

class Home extends Controller{

    function __construct(){

    }

    public function index(){

        $this->data = [
            'title' => "ACCUEIL",
            'message' =>null
        ] ;

        $this->view('public','home',$this->data);
    }

}
