<?php
// src/Entity/SelectUser.php
namespace App\Entity;

class SelectUser
{
    protected string $email;
    protected string $name;
    protected string $surname;

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $newName): void
    {
        $this->name = $newName;
    }

    public function getSurname(): string
    {
        return $this->surname;
    }

    public function setSurname(string $newSurname): void
    {
        $this->surname = $newSurname;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $newEmail): void
    {
        $this->email = $newEmail;
    }
}
