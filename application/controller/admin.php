<?php

namespace App\Controller;

use \App;
use App\Model\Bookmark;
use App\Model\User;
use Core\Api;
use Core\Controller;


class Admin extends Controller{

    private string $currency = 'USD';
    private Api $api;
    private Object $user;

    function __construct(){
        require BASE_APP."model/bookmark.php";
        $this->api = new Api();
        $this->user = $_SESSION['user'];
    }

    public function index(){
        if(!$this->user) {
            header("Location: /", true, 301);
            exit();
        }

        $md = new Bookmark();
        $bookmarks = $md->findByUserId($this->user->id);
        $crypto_ids = [];
        foreach ($bookmarks as $bookmark) {
            array_push($crypto_ids,$bookmark->crypto_id);
        }

        $my_crypto = $this->api->prepare($crypto_ids);

        $req = $this->api->query('1','1000',$this->currency);

        $this->data = [
            'title' => "ADMIN",
            'items' => $req,
            'currency' => $this->currency,
            'bookmarks' => $crypto_ids,
            'user' => $this->user,
            'my_crypto' => $my_crypto
        ] ;

        $this->view('public/admin','dashboard',$this->data);
    }

    public function add($id, $slug){
        if(!$this->user) {
            header("Location: /", true, 301);
            exit();
        }

        $md = new Bookmark();

        if(!$md->findByCryptoId($id) && $md->create($id ?? null, $slug ?? null, $this->user->id ?? null)) {
            $message = "Crypto: " . $id . " ajoutée à la liste des favoris";
        }
        header("Location: /admin", true, 301);
        exit();
    }

    public function remove($id){
        if(!$this->user) {
            header("Location: /", true, 301);
            exit();
        }

        $md = new Bookmark();

        if(!$md->findByCryptoId($id) && $md->delete($id ?? null)) {
            $message = "Crypto: " . $id . " supprimé de la liste des favoris";
        }
        header("Location: /admin", true, 301);
        exit();
    }

    public function bookmarks() {
        if(!$this->user) {
            header("Location: /", true, 301);
            exit();
        }

        $md = new Bookmark();
        $bookmarks = $md->findByUserId($this->user->id);
        $crypto_ids = [];
        foreach ($bookmarks as $bookmark) {
            array_push($crypto_ids,$bookmark->crypto_id);
        }

        $req = $this->api->prepare($crypto_ids);

        echo json_encode($req);
    }


}
