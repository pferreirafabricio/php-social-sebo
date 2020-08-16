<?php 

namespace Source\Business;

use Source\Business\BasePDO;

class CommentDB extends BasePDO
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = new BasePDO();
    }

    public function insert(int $bookId, int $userId, string $comment): bool
    {
        $sql = 'INSERT INTO comentario(descricao, livro_id, usuario_id)
                VALUES(:comment, :bookId, :userId)';

        $params = [
            ':comment' => $comment,
            ':bookId' => $bookId,
            ':userId' => $userId,
        ];

        return $this->pdo->ExecuteNonQuery($sql, $params);
    }

    public function getAllCommentsByBookId(int $bookId)
    {
        $sql = 'SELECT USR.nome AS userName,
                       C.descricao AS comment
                  FROM comentario C
                 INNER JOIN usuario USR
                    ON USR.id = C.usuario_id
                 WHERE C.livro_id = :bookId
                 ORDER BY C.id DESC';

        $params = [
            ':bookId' => $bookId,
        ];
        $dataReader = $this->pdo->ExecuteQuery($sql, $params);

        $comments = [];

        foreach ($dataReader as $comment) {
            $comments[] = [
                'userName' => $comment['userName'],
                'comment' => $comment['comment'],
            ];
        }

        return $comments;
    }
}