<?php

namespace Core;

use Core\Auth;
use PDO;
use PDOException;

class DB{

    private static $instance;
    
    public static function init(){
        if(!isset(self::$instance)){
                try{
                    self::$instance = new PDO(Auth::DSN, Auth::USER, Auth::PWD);
                    self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                }catch(PDOException $e){
                    exit("<h3>Erreur de connexion au serveur</h3>");
                }
        }
        return self::$instance;
    }

}
