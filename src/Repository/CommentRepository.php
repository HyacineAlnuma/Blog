<?php

namespace App\Repository;

use App\Entity\Database;
use App\Entity\Comment;

class CommentRepository
{
    public Database $connection;

    public function getComments($id): array
    {
        $statement = $this->connection->getConnection()->prepare(
            "SELECT id, author, content, DATE_FORMAT(lastUpdateDate, '%d/%m/%Y à %Hh%imin%ss') AS lastUpdateDate FROM comments WHERE id_post = ?"
        );
        $statement->execute([$id]);
        $comments = [];
        while(($row = $statement->fetch())) {
            $comment = new Comment();
            $comment->id = $row['id'];
            $comment->author = $row['author'];
            $comment->content = $row['content'];
            $comment->lastUpdateDate = $row['lastUpdateDate'];

            $comments[] = $comment;
        }

        return $comments;
    }

    public function addComment($id, $inputs)
    {
        date_default_timezone_set('Europe/Paris');
        $date = date('Y-m-d H:i:s', time());
        $statement = $this->connection->getConnection()->prepare(
            "INSERT INTO comments(author, content, lastUpdateDate, id_post) VALUES ('Hyacine Alnuma', ?, ?, ?)"
        );
        $statement->execute([$inputs['content'], $date, $id]);
    }

    public function updateComment($id, $inputs)
    {
        date_default_timezone_set('Europe/Paris');
        $date = date('Y-m-d H:i:s', time());
        $statement = $this->connection->getConnection()->prepare(
            "UPDATE comments SET content = ?, lastUpdateDate = ? WHERE id = ?"
        );
        $statement->execute([$inputs['content'], $date, $id]);
    }

    public function deleteComment($id)
    {
        $statement = $this->connection->getConnection()->prepare(
            "DELETE FROM comments WHERE id = ?"
        );
        $statement->execute([$id]);
    }
}
