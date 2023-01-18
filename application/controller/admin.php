<?php

namespace App\Controller;

use \App;
use App\Model\Bookmark;
use App\Model\User;
use Core\Api;
use Core\Controller;

class Admin extends Controller
{

    private string $currency = 'USD';
    private Api $api;
    private object $user;

    function __construct()
    {
        require BASE_APP . "model/bookmark.php";
        require BASE_APP . "model/user.php";
        $this->api = new Api();
        if (isset($_SESSION['user'])) {
            $this->user = $_SESSION['user'];
        }
    }

    public function index()
    {
        if (!isset($this->user)) {
            header("Location: /", true, 301);
            exit();
        }

        $this->render($message ?? null, $modal_message ?? null);
    }

    public function add($id, $slug)
    {
        if (!isset($this->user)) {
            header("Location: /", true, 301);
            exit();
        }

        $md = new Bookmark();

        if (!$md->findByCryptoId($id, $this->user->id) && $md->create($id ?? null, $slug ?? null, $this->user->id ?? null)) {
            $modal_message = "La cryptomonnaie " . $slug . " a été ajoutée à la liste des favoris";
        } else {
            $modal_message = "Une erreur s'est produite";
        }

        $this->render($message ?? null, $modal_message ?? null);
    }

    public function remove($id)
    {
        if (!isset($this->user)) {
            header("Location: /", true, 301);
            exit();
        }

        $md = new Bookmark();

        if ($md->findByCryptoId($id) && $md->delete($id ?? null)) {
            $modal_message = "La cryptomonnaie " . $id . " a été supprimé de la liste des favoris";
        } else {
            $modal_message = "Une erreur s'est produite";
        }

        $this->render($message ?? null, $modal_message ?? null);
    }

    public function bookmarks()
    {
        if (!isset($this->user)) {
            return json_encode('{}');
        }

        $md = new Bookmark();
        $bookmarks = $md->findByUserId($this->user->id);
        $crypto_ids = [];
        foreach ($bookmarks as $bookmark) {
            array_push($crypto_ids, $bookmark->crypto_id);
        }

        $req = $this->api->queryById($crypto_ids);

        echo json_encode($req);
    }

    public function edit()
    {
        if (!isset($this->user)) {
            header("Location: /", true, 301);
            exit();
        }
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            header("Location: /admin", true, 301);
            exit();
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['username'])) {
                $username = $_POST['username'];
            }
            if (isset($_POST['password'])) {
                $password = $_POST['password'];
            }

            if (!empty($username) && !empty($password)) {
                $md = new User();
                if ($md->edit($this->user->id, $username ?? null, $password ?? null)) {
                    $message = "Votre profil a correctement été modifié !";
                } else {
                    $message = "Une erreur s'est produite !";
                }
            } else {
                $message = "Vous n'avez pas saisi un nom utilisateur et mot de passe!";
            }
        }

        $this->render($message ?? null, $modal_message ?? null);
    }

    public function render($message = null, $modal_message = null)
    {
        $md = new Bookmark();
        $bookmarks = $md->findByUserId($this->user->id);
        $bookmarksId = [];
        foreach ($bookmarks as $bookmark) {
            $bookmarksId[] = $bookmark->crypto_id;
        }

        $req = $this->api->queryAll('1', '1000', $this->currency);

        $this->data = [
            'title' => "ADMIN",
            'user' => $this->user,
            'data' => $req,
            'bookmarks_id' => $bookmarksId,
            'message' => $message,
            'modal_message' => $modal_message
        ];

        $this->view('public/admin', 'dashboard', $this->data);
    }

    public function logout()
    {
        unset($_SESSION['user']);

        header("Location: /", true, 301);
        exit();
    }

}
