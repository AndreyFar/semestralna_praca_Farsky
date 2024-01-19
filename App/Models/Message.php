<?php

namespace App\Models;

use App\Core\Model;

class Message extends Model
{
    protected ?int $id;
    protected ?string $author;
    protected ?string $email;
    protected ?string $message;
    protected ?string $sentAt;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    public function getAuthor(): ?string
    {
        return $this->author;
    }

    public function setAuthor(?string $author): void
    {
        $this->author = $author;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): void
    {
        $this->email = $email;
    }

    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function setMessage(?string $message): void
    {
        $this->message = $message;
    }

    public function getSentAt(): ?string
    {
        return $this->sentAt;
    }

    public function setSentAt(?string $sentAt): void
    {
        $this->sentAt = $sentAt;
    }

}