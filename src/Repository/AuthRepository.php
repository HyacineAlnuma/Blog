<?php

namespace App\Repository;

use App\Entity\Database;
use App\Entity\User;

class AuthRepository
{
    public Database $connection;

    public function signin($inputs)
    {
        $passwordHash = password_hash($inputs['password'], PASSWORD_DEFAULT);
        $statement = $this->connection->getConnection()->prepare(
            "INSERT INTO users(username, email, passwordHash, userRole) VALUES ( ?, ?, ?, 'user')"
        );
        $statement->execute([$inputs['username'], $inputs['email'], $passwordHash]);
    }

    public function login($inputs): User
    {
        $statement = $this->connection->getConnection()->prepare(
            "SELECT id, username, passwordHash, userRole FROM users WHERE username = ?"
        );
        $statement->execute([$inputs['username']]);
        var_dump($inputs['username']);

        $user = new User();
        $row = $statement->fetch();
        $user->id = $row['id'];
        $user->username = $row['username'];
        $user->passwordHash = $row['passwordHash'];
        $user->userRole = $row['userRole'];

        return $user;
    }
}
