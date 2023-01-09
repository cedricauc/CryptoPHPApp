<?php

namespace App\Controller;

use \App;
use App\Model\User;
use Core\Controller;

class Login extends Controller{

    function __construct(){
        require BASE_APP."model/user.php";
    }

    public function index(){

        if (isset($_SERVER['HTTP_REFERER'])) {
            $url = explode('/',$_SERVER['HTTP_REFERER']);
            $param = array_pop($url);
            if(!empty($param)){
                $template = $param;
            }
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['email'])) {
                $email = $_POST['email'];
            }

            if (isset($_POST['password'])) {
                $password = $_POST['password'];
            }

            $md = new User();
            $user = $md->findByEmail($email ?? null);

            if($user && password_verify($password ?? null, $user->password)) {
                header("Location: /admin", true, 301);
                exit();
            }
            else {
                $message = "Identifiants invalides";
            }
        }

        $this->data = [
            'title' =>"ACCUEIL",
            'message' => $message ?? null
        ] ;

        $template = $template ?? 'home';

        $this->view('public',$template,$this->data);
    }

}