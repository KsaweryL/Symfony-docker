<?php
// src/Entity/emailPage.php
namespace App\Entity;

class LoginPage
{
    protected string $email;

    protected string $password;

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $newEmail): void
    {
        $this->email = $newEmail;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $newPassword): void
    {
        $this->password = $newPassword;
    }
}