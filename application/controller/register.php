<?php

namespace App\Controller;

use \App;
use App\Model\User;
use Core\Controller;

class Register extends Controller
{

    function __construct()
    {
        require BASE_APP . "model/user.php";
    }

    public function index()
    {
        $md = new User();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['email'])) {
                $email = $_POST['email'];
            }

            if (isset($_POST['username'])) {
                $username = $_POST['username'];
            }

            if (isset($_POST['password'])) {
                $password = $_POST['password'];
            }

            if ($md->findByEmail($email ?? null)) {
                $message = "Adresse e-mail non disponible ! ";
            } else if ($md->create($email ?? null, $username ?? null, $password ?? null)) {
                $user = $md->findByEmail($email ?? null);
                if ($user && password_verify($password ?? null, $user->password)) {
                    $_SESSION["user"] = $user;
                    header("Location: /admin", true, 301);
                    exit();
                }
            } else {
                $message = "Une erreur s'est produite lors de l'ajout du message ! ";
            }
        }

        $this->data = [
            'title' => "Créer un compte",
            'register_message' => $message ?? null
        ];

        $this->view('public', 'register', $this->data);
    }

}
