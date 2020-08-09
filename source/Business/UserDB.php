<?php

namespace Source\Business;

use Source\Business\BasePDO;
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
            ':name' =>  $user->getName(),
            ':email' => $user->getEmail(),
            ':password' => $user->getPassword(),
            ':status' => $user->getStatus(),
        ];

        return $this->pdo->ExecuteNonQuery($sql, $params);
    }

    public function update(User $user): bool
    {   
        $sql = "UPDATE usuario
                   SET nome = :name,
                   email = :email
                 WHERE id = :id";

        $params = [
            ':name' => $user->getName(),
            ':email' => $user->getEmail(),
            ':id' => $user->getId()
        ];

        return $this->pdo->ExecuteNonQuery($sql, $params);
    }

    public function updatePassword(int $userId, string $newPassword): bool 
    {
        $sql = "UPDATE usuario
                   SET senha = :password
                 WHERE id = :id";

        $params = [
            ':id' => $userId,
            ':password' => $newPassword
        ];

        return $this->pdo->ExecuteNonQuery($sql, $params);
    }

    public function verifyIfEmailExists(string $email): bool
    {
        $sql = "SELECT id FROM usuario WHERE email = :email";

        $params = [
            ':email' => $email
        ];

        $dataReader = $this->pdo->ExecuteQueryOneRow($sql, $params);

        if (isset($dataReader['id'])) {
            return true;
        }

        return false;
    }

    public function getUserByEmail(string $email)
    {
        $sql = "SELECT id, nome, email, senha, status
                  FROM usuario
                 WHERE email = :email 
                   AND status = :status";

        $params = [
            ':email' => $email,
            ':status' => 1
        ];
            
        $dataReader = $this->pdo->ExecuteQueryOneRow($sql, $params);

        if (!$dataReader)
            return false;

        return $this->collection($dataReader);
    }

    public function getUserById(int $id)
    {
        $sql = "SELECT id, nome, email, senha, status
                  FROM usuario
                 WHERE id = :id";

        $params = [
            ':id' => $id
        ];
            
        $dataReader = $this->pdo->ExecuteQueryOneRow($sql, $params);

        if (!$dataReader)
            return false;

        return $this->collection($dataReader);
    }

    private function collection($data): User
    {
        return new User(
            $data['id'] ?? null,
            $data['nome'] ?? null,
            $data['email'] ?? null,
            $data['senha'] ?? null,
            $data['status'] ?? null,
            $data['token'] ?? null,
        );
    }
}