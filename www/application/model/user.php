<?php

namespace App\Model;

use Core\Model;
use \App;
use PDO;

class User extends Model
{

    public function all(): array
    {
        $req = $this->db->query("SELECT * FROM user");
        return $req->fetchAll(PDO::FETCH_OBJ);
    }

    public function findByEmail($email)
    {
        $req = $this->db->prepare("SELECT * FROM user WHERE email = :email");
        $req->execute([":email" => $email]);
        return $req->fetch(PDO::FETCH_OBJ);
    }

    public function create($email, $username, $password): bool
    {
        $req = $this->db->prepare("INSERT INTO user(id, email, username, password) VALUES (uuid(), :email, :username, :password)");
        return $req->execute(['email' => $email, 'username' => $username, 'password' => password_hash($password, PASSWORD_BCRYPT)]);
    }

    public function edit($id, $username, $password): bool
    {
        $req = $this->db->prepare("UPDATE user SET username = :username, password = :password WHERE id = :id");
        return $req->execute([':id' => $id, 'username' => $username, 'password' => password_hash($password, PASSWORD_BCRYPT)]);
    }

}