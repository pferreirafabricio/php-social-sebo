<?php

namespace Source\Database;

use Source\Database\BasePDO;
use Source\Models\User as UserModel;

class User extends BasePDO 
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = new BasePDO();
    }

    public function insert(UserModel $user): void
    {
        $sql = 'INSERT INTO usuario(id, nome, email, senha, status)
                VALUES(:name, :email, :password, :status)';

        $params = [
            'name' =>  $user->getName(),
            'email' => $user->getEmail(),
            'password' => $user->getPassword(),
            'status' => $user->getStatus(),
        ];

        $this->pdo->ExecuteNonQuery($sql, $params);
    }
}