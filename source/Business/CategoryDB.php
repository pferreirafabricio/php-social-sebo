<?php 

namespace Source\Business;

use Source\Business\BasePDO;

class CategoryDB extends BasePDO
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = new BasePDO();
    }
}