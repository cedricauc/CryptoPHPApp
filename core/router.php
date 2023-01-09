<?php
namespace Core;

use App\Controller\Home;
use App\Controller\Error;

class Router{

     public static function run(){
         $url = $_SERVER['REQUEST_URI'];

        if($url == "/"){
            require BASE_APP.'controller/home.php';
            $controller = new Home();
            $controller->index();
            exit;
        }

        $params = explode('/',$url);
        array_shift($params);

        $controllerName = ucfirst(array_shift($params));

        $file = BASE_APP.'controller/'.lcfirst($controllerName).'.php';
        if(file_exists($file)){
            require $file;
            $controllerName = "App"."\\"."Controller"."\\".$controllerName;
            $controller = new $controllerName();
        }else{
            require BASE_APP . "controller/error.php";
            $controller = new Error();
            $controller->index();      
            exit;
        }

        if(!empty($params)){
            $methodName = array_shift($params);
            $method = method_exists($controller, $methodName) ? $methodName : "index";
        }else{
            $method = "index";
        }

        $actions = !empty($params) ? array_values($params) : [];
        call_user_func_array([$controller, $method], $actions);
    }

}