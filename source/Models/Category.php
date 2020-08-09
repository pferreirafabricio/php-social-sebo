<?php

namespace Source\Models;

use Source\Models\Model;

class Category
{
    private $id;
    private $nome;
    private $slug;

    public function __construct($id = null, string $nome = '', string $slug = '')
    {
        $this->id = $id;
        $this->nome = $nome;
        $this->slug = $slug;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->nome;
    }

    public function getSlug()
    {
        return $this->slug;
    }
}