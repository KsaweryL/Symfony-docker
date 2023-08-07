<?php
// src/Entity/WelcomePage.php
namespace App\Entity;

class WelcomePage
{
    protected bool $login;

    protected bool $signup;

    public function getLogin(): bool
    {
    return $this->login;
    }

    public function setLogin(bool $newLogin): void
    {
    $this->login = $newLogin;
    }

    public function getSignup(): bool
    {
    return $this->signup;
    }

    public function setSignup(bool $newSignup): void
    {
    $this->signup = $newSignup;
    }
}