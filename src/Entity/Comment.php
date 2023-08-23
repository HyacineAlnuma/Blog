<?php

namespace App\Entity;

class Comment
{
    private int $id;
    private string $author;
    private string $content;
    private string $lastUpdateDate;
    private int $id_post;
    private int $approved;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;
        return $this;
    }

    public function getAuthor(): string
    {
        return $this->author;
    }

    public function setAuthor(string $author): self
    {
        $this->author = $author;
        return $this;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function setContent(string $content): self
    {
        $this->content = $content;
        return $this;
    }

    public function getLastUpdateDate(): string
    {
        return $this->lastUpdateDate;
    }

    public function setLastUpdateDate(string $lastUpdateDate): self
    {
        $this->lastUpdateDate = $lastUpdateDate;
        return $this;
    }

    public function getIdPost(): int
    {
        return $this->id_post;
    }

    public function setIdPost(int $id_post): self
    {
        $this->id_post = $id_post;
        return $this;
    }

    public function getApproved(): int
    {
        return $this->approved;
    }

    public function setApproved(int $approved): self
    {
        $this->approved = $approved;
        return $this;
    }
}
