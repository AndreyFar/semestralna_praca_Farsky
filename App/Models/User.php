<?php

namespace App\Models;

use App\Core\Model;

class User extends Model
{
    protected ?int $id;
    protected ?string $name;
    protected ?string $password;
    protected ?string $isAdmin;
    protected ?string $nasada;

    public function getNasada(): ?string
    {
        return $this->nasada;
    }

    public function setNasada(?string $nasada): void
    {
        $this->nasada = $nasada;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(?string $password): void
    {
        $this->password = $password;
    }

    public function getIsAdmin(): ?string
    {
        return $this->isAdmin;
    }

    public function setIsAdmin(?string $isAdmin): void
    {
        $this->isAdmin = $isAdmin;
    }
}