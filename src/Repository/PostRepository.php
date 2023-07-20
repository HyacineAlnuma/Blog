<?php

namespace App\Repository;

use App\Entity\Database;
use App\Entity\Post;

class PostRepository
{
    public Database $connection;

    public function getPost(string $id): Post
    {
        $statement = $this->connection->getConnection()->prepare(
            "SELECT id, title, chapo, author, content, DATE_FORMAT(lastUpdateDate, '%d/%m/%Y à %Hh%imin%ss') AS lastUpdateDate FROM posts WHERE id = ?"
        );
        $statement->execute([$id]);

        $row = $statement->fetch();
        $post = new Post();
        $post->id = $row['id'];
        $post->title = $row['title'];
        $post->author = $row['chapo'];
        $post->chapo = $row['author'];
        $post->content = $row['content'];
        $post->lastUpdateDate = $row['lastUpdateDate'];

        return $post;
    }

    public function getPosts(): array
    {
        $statement = $this->connection->getConnection()->query(
            "SELECT id, title, chapo, author, content, DATE_FORMAT(lastUpdateDate, '%d/%m/%Y à %Hh%imin%ss') AS lastUpdateDate FROM posts"
        );
        $posts = [];
        while(($row = $statement->fetch())) {
            $post = new Post();
            $post->id = $row['id'];
            $post->title = $row['title'];
            $post->author = $row['author'];
            $post->chapo = $row['chapo'];
            $post->content = $row['content'];
            $post->lastUpdateDate = $row['lastUpdateDate'];

            $posts[] = $post;
        }

        return $posts;
    }

    public function addPost($inputs)
    {
        date_default_timezone_set('Europe/Paris');
        $date = date('Y-m-d H:i:s', time());
        $statement = $this->connection->getConnection()->prepare(
            "INSERT INTO posts(author, title, chapo, content, lastUpdateDate) VALUES ('Hyacine Alnuma', ?, ?, ?, ?)"
        );
        $statement->execute([$inputs['title'], $inputs['chapo'], $inputs['content'], $date]);
    }

    public function updatePost($id, $inputs)
    {
        date_default_timezone_set('Europe/Paris');
        $date = date('Y-m-d H:i:s', time());
        $statement = $this->connection->getConnection()->prepare(
            "UPDATE posts SET title = ?, chapo = ?, content = ?, lastUpdateDate = ? WHERE id = ?"
        );
        $statement->execute([$inputs['title'], $inputs['chapo'], $inputs['content'], $date, $id]);
    }

    public function deletePost($id)
    {
        $statement = $this->connection->getConnection()->prepare(
            "DELETE FROM posts WHERE id = ?"
        );
        $statement->execute([$id]);
    }
}
