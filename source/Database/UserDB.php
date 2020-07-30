<?php

namespace Source\Database;

use Source\Database\BasePDO;
use Source\Models\User;

class UserDB extends BasePDO 
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = new BasePDO();
    }

    public function insert(User $user): bool
    {
        $sql = 'INSERT INTO usuario(nome, email, senha, status)
                VALUES(:name, :email, :password, :status)';

        $params = [
            'name' =>  $user->getName(),
            'email' => $user->getEmail(),
            'password' => $user->getPassword(),
            'status' => $user->getStatus(),
        ];

        return $this->pdo->ExecuteNonQuery($sql, $params);
    }
}