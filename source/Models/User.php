<?php

namespace Source\Models;

use Source\Models\Model;

class User
{   
    private $id;
    private $nome;
    private $email;
    private $senha;
    private $status;
    private $token;

    public function __construct(int $id = null, string $nome = '', string $email = '', string $senha, int $status = 2, string $token = null)
    {
        $this->nome = $nome;
        $this->email = strtolower($email);
        $this->senha = $senha;
        $this->status = $status;
        $this->token = $token;
    }

    #region Setters

    public function setPassword(string $password): void 
    {
        $this->senha = $password;
    }

    #endregion

    #region Getters

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->nome;
    }

    public function getEmail()
    {
        return strtolower($this->email);
    }

    public function getPassword()
    {
        return $this->senha;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function getToken()
    {
        return $this->token;
    }

    #endregion
}