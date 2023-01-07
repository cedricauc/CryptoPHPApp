<?php

use Core\Model;

class Bookmark extends Model{


    public function all(){
        // $db = DB::init();
        $req = $this->db->query("SELECT * FROM bookmark");
        return $req->fetchAll(PDO::FETCH_OBJ);
    }
}