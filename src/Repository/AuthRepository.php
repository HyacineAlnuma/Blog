<?php

namespace App\Repository;

use App\Entity\Database;
use App\Entity\User;

class AuthRepository
{
    public Database $connection;

    private function hydrateUser(array $row): User
    {
        $user = new User();
        $user->id = $row['id'];
        $user->username = $row['username'];
        $user->passwordHash = $row['passwordHash'];
        $user->userRole = $row['userRole'];

        return $user;
    }

    public function getUserByUsername($inputs)
    {
        $statement = $this->connection->getConnection()->prepare(
            "SELECT id, username, passwordHash, userRole FROM users WHERE username = ?"
        );
        $statement->execute([$inputs['username']]);
        $row = $statement->fetch();
        if (!$row) {
            return null;
        } else {
            return $this->hydrateUser($row);
        }
    }

    public function getUserByEmail($inputs)
    {
        $statement = $this->connection->getConnection()->prepare(
            "SELECT id, username, passwordHash, userRole FROM users WHERE email = ?"
        );
        $statement->execute([$inputs['email']]);
        $row = $statement->fetch();
        if (!$row) {
            return null;
        } else {
            return $this->hydrateUser($row);
        }
    }

    public function register($inputs)
    {
        $passwordHash = password_hash($inputs['password'], PASSWORD_DEFAULT);
        $statement = $this->connection->getConnection()->prepare(
            "INSERT INTO users(username, email, passwordHash, userRole) VALUES ( ?, ?, ?, 'user')"
        );
        $statement->execute([$inputs['username'], $inputs['email'], $passwordHash]);
    }
}
