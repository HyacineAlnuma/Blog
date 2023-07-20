<?php

namespace App\Entity;

class Comment
{
    public int $id;
    public string $author;
    public string $content;
    public string $lastUpdateDate;
}
