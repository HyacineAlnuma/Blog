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
            "INSERT INTO users(username, email, passwordHash) VALUES ( ?, ?, ?)"
        );
        $statement->execute([$inputs['username'], $inputs['email'], $passwordHash]);
    }
}
