<?php

namespace App\Entity;

class User
{
    public int $id;
    public string $username;
    public string $email;
    public string $passwordHash;
    public string $userRole;
}

// class User
// {
//     private int $id;
//     private string $username;
//     private string $email;
//     private string $passwordHash;
//     private string $userRole;

//     public function getId(): int
//     {
//         return $this->id;
//     }

//     public function setId(int $id): self
//     {
//         $this->id = $id;
//         return $this;
//     }

//     public function getUsername(): string
//     {
//         return $this->username;
//     }

//     public function setUsername(string $username): self
//     {
//         $this->username = $username;
//         return $this;
//     }

//     public function getEmail(): string
//     {
//         return $this->email;
//     }

//     public function setEmail(string $email): self
//     {
//         $this->email = $email;
//         return $this;
//     }

//     public function getPasswordHash(): string
//     {
//         return $this->passwordHash;
//     }

//     public function setPasswordHash(string $passwordHash): self
//     {
//         $this->passwordHash = $passwordHash;
//         return $this;
//     }

//     public function getUserRole(): string
//     {
//         return $this->userRole;
//     }

//     public function setUserRole(string $userRole): self
//     {
//         $this->userRole = $userRole;
//         return $this;
//     }
// }
