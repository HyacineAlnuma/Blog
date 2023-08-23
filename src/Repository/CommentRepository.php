<?php

namespace App\Repository;

use App\Entity\Database;
use App\Entity\Comment;

class CommentRepository
{
    public Database $connection;

    private function hydrateComment(array $row): Comment
    {
        $comment = new Comment();
        $comment->id = $row['id'];
        $comment->author = $row['author'];
        $comment->content = $row['content'];
        $comment->lastUpdateDate = $row['lastUpdateDate'];
        $comment->approved = $row['approved'];

        return $comment;
    }

    public function getPostApprovedComments($id): array
    {
        $statement = $this->connection->getConnection()->prepare(
            "SELECT id, author, content, approved, DATE_FORMAT(lastUpdateDate, '%d/%m/%Y à %Hh%imin%ss') AS lastUpdateDate FROM comments WHERE id_post = ? AND approved = 1"
        );
        $statement->execute([$id]);
        $comments = [];
        while(($row = $statement->fetch())) {
            $comments[] = $this->hydrateComment($row);
        }

        return $comments;
    }

    public function getNonApprovedComments(): array
    {
        $statement = $this->connection->getConnection()->query(
            "SELECT id, author, content, approved, DATE_FORMAT(lastUpdateDate, '%d/%m/%Y à %Hh%imin%ss') AS lastUpdateDate FROM comments WHERE approved = 0"
        );
        $comments = [];
        while(($row = $statement->fetch())) {
            $comments[] = $this->hydrateComment($row);
        }

        return $comments;
    }

    public function addComment($id, $inputs)
    {
        date_default_timezone_set('Europe/Paris');
        $date = date('Y-m-d H:i:s', time());
        $statement = $this->connection->getConnection()->prepare(
            "INSERT INTO comments(author, content, lastUpdateDate, id_post, approved) VALUES ('Hyacine Alnuma', ?, ?, ?, 0)"
        );
        $statement->execute([$inputs['content'], $date, $id]);
    }

    public function approveComment($id)
    {
        $statement = $this->connection->getConnection()->prepare(
            "UPDATE comments SET approved = 1 WHERE id = ?"
        );
        $statement->execute([$id]);
    }

    public function deleteComment($id)
    {
        $statement = $this->connection->getConnection()->prepare(
            "DELETE FROM comments WHERE id = ?"
        );
        $statement->execute([$id]);
    }
}
