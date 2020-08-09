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

    public function insert(Category $category): bool
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
}