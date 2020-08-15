<?php

namespace Source\Business;

use Source\Business\BasePDO;
use Source\Models\Book;
use Source\Models\Category;
use Source\Models\User;

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

    public function update(Book $book): bool
    {
        $sql = 'UPDATE livro
                   SET titulo = :title,
                       slug = :slug,
                       valor = :price,
                       sinopse = :synopsis,
                       status = :status,
                       categoria_id = :category_id
                 WHERE usuario_id = :userId
                   AND id = :bookId';

        $params = [
            ':bookId' => $book->getId(),
            ':title' => $book->getTitle(),
            ':slug' => $book->getSlug(),
            ':price' => $book->getPrice(),
            ':synopsis' => $book->getSynopsis(),
            ':status' => $book->getStatus(),
            ':category_id' => $book->getCategory()->getId(),
            ':userId' => $book->getUser()->getId(),
        ];

        return $this->pdo->ExecuteNonQuery($sql, $params);
    }

    public function getBookByUserId(int $userId): array
    {
         $sql = "SELECT L.id,
                        L.slug,
                        L.titulo AS title,
                        L.thumb,
                        L.sinopse AS synopsis,
                        L.data_cadastro AS created_at,
                        L.status,
                        CAT.nome AS category_nome
                  FROM livro L
                 INNER JOIN categoria CAT
                    ON CAT.id = L.categoria_id
                 WHERE L.usuario_id = :userId
                 ORDER BY L.titulo ASC";

        $params = [
            ':userId' => $userId,
        ];
        
        $dataReader = $this->pdo->ExecuteQuery($sql, $params);

        $books = [];

        foreach ($dataReader as $book) 
            $books[] = $this->collection($book);

        return $books;
    }

    public function getByBookIdAndUserId(int $bookId, int $userId)
    {
        $sql = "SELECT id,
                       titulo AS title,
                       slug,
                       valor AS price,
                       status,
                       sinopse AS synopsis,
                       categoria_id AS category_id
                  FROM livro L
                  WHERE L.id = :bookId 
                    AND L.usuario_id = :userId";

        $params = [
            ':bookId' => $bookId,
            ':userId' => $userId,
        ];

        $dataReader = $this->pdo->ExecuteQueryOneRow($sql, $params);

        if ($dataReader == [] || $dataReader == null) 
            return false;

        return $this->collection($dataReader);
    }

    private function collection($data): Book
    {
        return new Book(
            $data['id'] ?? null,
            $data['title'] ?? null,
            $data['slug'] ?? null,
            $data['price'] ?? null,
            $data['thumb'] ?? null,
            $data['synopsis'] ?? null,
            $data['created_at'] ?? null,
            $data['status'] ?? null,
            new Category(
                $data['category_id'] ?? null,
                $data['category_nome'] ?? null
            ),
            new User(
                $data['usuario_id'] ?? null,
                $data['usuario_nome'] ?? null
            )
        );
    }
}
