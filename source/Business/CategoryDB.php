<?php 

namespace Source\Business;

use Source\Business\BasePDO;
use Source\Models\Category;

class CategoryDB extends BasePDO
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = new BasePDO();
    }

    public function insert(Category $category)
    {
        $sql = 'INSERT INTO categoria(nome, slug)
                VALUES(:name, :slug)';

        $params = [
            ':name' =>  $category->getName(),
            ':slug' => $category->getSlug(),
        ];

        if(!$this->pdo->ExecuteNonQuery($sql, $params))
            return false;
        
        return $this->pdo->GetLastID();
    }   

    public function update(Category $category): bool
    {
        $sql = 'UPDATE categoria
                   SET nome = :name,
                       slug = :slug
                 WHERE id = :id';

        $params = [
            ':id' => $category->getId(),
            ':name' =>  $category->getName(),
            ':slug' => $category->getSlug(),
        ];

        return $this->pdo->ExecuteNonQuery($sql, $params);
    }

    public function getAll(): array
    {
        $sql = "SELECT *
                  FROM categoria
                 ORDER BY nome ASC";

        $dataReader = $this->pdo->ExecuteQuery($sql);

        $categories = [];

        foreach ($dataReader as $category) 
            $categories[] = $this->collection($category);

        return $categories;
    }

    public function getById(int $id)
    {
        $sql = "SELECT *
                  FROM categoria
                 WHERE id = :id";

        $params = [
            ':id' => $id,
        ];

        $dataReader = $this->pdo->ExecuteQueryOneRow($sql, $params);

        if (!$dataReader)
            return false;

        return $this->collection($dataReader);
    }

    public function getCategoryNameBySlug(string $slug)
    {
        $sql = "SELECT nome
                  FROM categoria
                 WHERE slug = :slug";

        $params = [
            ':slug' => $slug,
        ];

        $dataReader = $this->pdo->ExecuteQueryOneRow($sql, $params);

        if (!$dataReader)
            return false;

        return $this->collection($dataReader);
    }

    public function collection($data): Category
    {
        return new Category(
            $data['id'] ?? null,
            $data['nome'] ?? null,
            $data['slug'] ?? null
        );
    }
}