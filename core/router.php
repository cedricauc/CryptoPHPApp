<?php
namespace Core;

use App\Controller\Home;
use App\Controller\Error;

class Router{

     public static function run(){
         $url = $_SERVER['REQUEST_URI'];

         //var_dump(isset($url[0]));
        if(!isset($url[1])){
            require BASE_APP.'controller/home.php';
            $controller = new Home();
            $controller->index();
            exit;
        }

        $url = explode('/',$url);
        //var_dump($url);

        $controllerName = ucfirst(array_pop($url));

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

        if(!empty($url[1])){
            $methodName = array_shift($url[1]);
            $method = method_exists($controller, $methodName) ? $methodName : "index";
        }else{
            $method = "index";
        }

        $params = !empty($url[1]) ? array_values($url[1]) : [];
        call_user_func_array([$controller, $method], $params);
    }
}