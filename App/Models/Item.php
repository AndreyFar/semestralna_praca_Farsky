<?php

namespace App\Models;

use App\Core\Model;

class Item extends Model
{
    protected ?int $id;
    protected ?string $personWhoAdded;
    protected ?string $picture;

    protected ?string $title;
    protected ?string $size;
    protected ?int $count;
    protected ?int $price;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPicture(): ?string
    {
        return $this->picture;
    }

    public function setPicture(?string $picture): void
    {
        $this->picture = $picture;
    }

    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    public function getPersonWhoAdded(): ?string
    {
        return $this->personWhoAdded;
    }

    public function setPersonWhoAdded(?string $personWhoAdded): void
    {
        $this->personWhoAdded = $personWhoAdded;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(?string $title): void
    {
        $this->title = $title;
    }

    public function getSize(): ?string
    {
        return $this->size;
    }

    public function setSize(?string $size): void
    {
        $this->size = $size;
    }

    public function getCount(): ?int
    {
        return $this->count;
    }

    public function setCount(?int $count): void
    {
        $this->count = $count;
    }

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(?int $price): void
    {
        $this->price = $price;
    }
}