<?php

namespace App\Models;

use App\Core\Model;

class Review extends Model
{
    protected ?int $id;
    protected ?string $userName;
    protected ?string $picture;
    protected ?string $comment;
    protected ?int $rating;
    protected ?string $createdAt;
    protected ?string $imagePath;

    public function getId(): ?int
    {
        return $this->id;
    }
    public function getUserName(): ?string
    {
        return $this->userName;
    }

    public function setUserName(?string $userName): void
    {
        $this->userName = $userName;
    }

    public function getPicture(): ?string
    {
        return $this->picture;
    }

    public function setPicture(?string $picture): void
    {
        $this->picture = $picture;
    }

    public function getComment(): ?string
    {
        return $this->comment;
    }

    public function setComment(?string $comment): void
    {
        $this->comment = $comment;
    }

    public function getRating(): ?int
    {
        return $this->rating;
    }

    public function setRating(?int $rating): void
    {
        $this->rating = $rating;
    }

    public function getCreatedAt(): ?string
    {
        return $this->createdAt;
    }

    public function setCreatedAt(?string $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    public function getImagePath(): ?string
    {
        return $this->imagePath;
    }

    public function setImagePath(int $num): void
    {
        $this->imagePath = "public/images/star".$num.".png";
    }

}