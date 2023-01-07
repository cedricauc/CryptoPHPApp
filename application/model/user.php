<?php

namespace App\Model;
use Core\Model;

use \App;

class User extends Model{


    public function all(){
    // $db = DB::init();
    $req = $this->db->query("SELECT * FROM user");
    return $req->fetchAll(PDO::FETCH_OBJ);
    }
}