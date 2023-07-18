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
            "SELECT * FROM posts WHERE id = ?"
        );
        $statement->execute([$id]);

        $row = $statement->fetch();
        $post = new Post();
        $post->title = $row['title'];
        $post->author = $row['author'];
        $post->chapo = $row['chapo'];
        $post->content = $row['content'];
        // $post->lastUpdateDate = $row['lastUpdateDate'];

        return $post;
    }

    // public function getPosts(): array
    // {
    //     $statement = $this->connection->getConnection()->query(
    //         ""
    //     );
    //     $posts = [];
    //     while($row = $statement->fecth()) {
    //         $post = new Post();
    //         $post->title = $row['title'];
    //         $post->chapo = $row['chapo'];
    //         $post->content = $row['content'];
    //         $post->lastUpdateDate = $row['lastUpdateDate'];

    //         $posts[] = $post;
    //     }

    //     return $posts;
    // }
}
