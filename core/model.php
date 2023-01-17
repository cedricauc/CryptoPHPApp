<?php

namespace Core;

class Model {

    protected $db;

    function __construct(){
        $this->db = DB::init();
    }

}