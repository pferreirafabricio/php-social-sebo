<?php

namespace Source\Models;

use Source\Models\Category;
use Source\Models\User;

class Book
{
    private $id;
    private $title;
    private $slug;
    private $price;
    private $thumb;
    private $synopsis;
    private $created_at;
    private $status;
    private $category;
    private $user;

    public function __construct(
        $id = null,
        string $title = null,
        string $slug = null,
        int $price = null,
        string $thumb = null,
        string $synopsis = null,
        string $created_at = null,
        int $status = null,
        Category $category = null,
        User $user = null
    ) {
        $this->id = $id;
        $this->title = $title;
        $this->slug = $slug;
        $this->price = $price;
        $this->thumb = $thumb;
        $this->synopsis = $synopsis;
        $this->created_at = $created_at;
        $this->status = $status;
        $this->category = $category ?? new Category();
        $this->user = $user ?? new User();
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getSlug(): string
    {
        return $this->slug;
    }
    public function getPrice(): float
    {
        return $this->price;
    }

    public function getThumb(): string
    {
        return $this->thumb;
    }

    public function getSynopsis(): string
    {
        return $this->synopsis;
    }

    public function getCreatedAt(): string
    {
        return $this->created_at;
    }

    public function getStatus(): int
    {
        return $this->status;
    }

    public function getCategory(): Category
    {
        return $this->category;
    }

    public function getUser(): User
    {
        return $this->user;
    }
}
