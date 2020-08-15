<?php

namespace Source\Business;

use Source\Business\BasePDO;
use Source\Models\Book;

class BookDB extends BasePDO
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = new BasePDO();
    }

    public function insert(Book $book): bool
    {
        $sql = 'INSERT INTO livro(titulo,
                                  slug,
                                  valor,
                                  thumb,
                                  sinopse,
                                  data_cadastro,
                                  status,
                                  categoria_id,
                                  usuario_id)
                VALUES(:title,
                       :slug,
                       :price,
                       :thumb,
                       :synopsis,
                       :created_at,
                       :status,
                       :category_id,
                       :user_id)';

        $params = [
            ':title' => $book->getTitle(),
            ':slug' => $book->getSlug(),
            ':price' => $book->getPrice(),
            ':thumb' => $book->getThumb(),
            ':synopsis' => $book->getSynopsis(),
            ':created_at' => $book->getCreatedAt(),
            ':status' => $book->getStatus(),
            ':category_id' => $book->getCategory()->getId(),
            ':user_id' => $book->getUser()->getId(),
        ];

        if (!$this->pdo->ExecuteNonQuery($sql, $params)) 
            return false;

        return $this->pdo->GetLastID();
    }
}
