<?php

namespace App\Entity;

class Post
{
    public int $id;
    public string $title;
    public string $author;
    public string $chapo;
    public string $content;
    public string $lastUpdateDate;
}

// class Post
// {
//     private int $id;
//     private string $title;
//     private string $author;
//     private string $chapo;
//     private string $content;
//     private string $lastUpdateDate;

//     public function getId(): int
//     {
//         return $this->id;
//     }

//     public function getTitle(): string
//     {
//         return $this->title;
//     }

//     public function getAuthor(): string
//     {
//         return $this->author;
//     }

//     public function getChapo(): string
//     {
//         return $this->chapo;
//     }

//     public function getContent(): string
//     {
//         return $this->content;
//     }

//     public function getLastUpdateDate(): string
//     {
//         return $this->lastUpdateDate;
//     }

//     public function setId(int $id): self
//     {
//         $this->id = $id;
//         return $this;
//     }

//     public function setTitle(string $title): self
//     {
//         $this->title = $title;
//         return $this;
//     }

//     public function setAuthor(string $author): self
//     {
//         $this->author = $author;
//         return $this;
//     }

//     public function setChapo(string $chapo): self
//     {
//         $this->chapo = $chapo;
//         return $this;
//     }

//     public function setContent(string $content): self
//     {
//         $this->content = $content;
//         return $this;
//     }

//     public function setLastUpdateDate(string $lastUpdateDate): self
//     {
//         $this->lastUpdateDate = $lastUpdateDate;
//         return $this;
//     }
// }
