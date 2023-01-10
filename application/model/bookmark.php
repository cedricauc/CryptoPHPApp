<?php

namespace App\Model;
use Core\Model;
use \App;
use PDO;

class Bookmark extends Model{

    public function findByUserId($user_id): array
    {
        $req = $this->db->prepare("SELECT * FROM bookmark WHERE user_id = :user_id");
        $req->execute([":user_id" => $user_id]);
        return $req->fetchAll(PDO::FETCH_OBJ);
    }

    public function findByCryptoId($id)
    {
        $req = $this->db->prepare("SELECT * FROM bookmark WHERE crypto_id = :id");
        $req->execute([":id" => $id]);
        return $req->fetch(PDO::FETCH_OBJ);
    }

    public function findBySlug($slug)
    {
        $req = $this->db->prepare("SELECT * FROM bookmark WHERE slug = :slug");
        $req->execute([":slug" => $slug]);
        return $req->fetch(PDO::FETCH_OBJ);
    }

    public function create($crypto_id, $slug, $user_id): bool
    {
        $req = $this->db->prepare("INSERT INTO bookmark(id, crypto_id, slug, user_id) VALUES (uuid(), :crypto_id, :slug, :user_id)");
        return $req->execute(['crypto_id'=>$crypto_id, 'slug'=>$slug, 'user_id'=>$user_id]);
    }

    public function delete($crypto_id): bool
    {
        $req = $this->db->prepare("DELETE FROM bookmark WHERE crypto_id = :crypto_id");
        return $req->execute(['crypto_id'=>$crypto_id]);
    }

}