<?php

// src/Entity/UserData.php
namespace App\Entity;

class UserData{

    #[Assert\NotBlank]
    protected string $name;
    protected string $surname;
    #[Assert\NotBlank]
    protected float $age;

    protected bool $checkbox;

    public function setCheckbox(bool $new_checkbox){
        $this->checkbox = $new_checkbox;
    }

    public function getCheckbox(){
        return $this->checkbox;
    }

    public function setName(string $new_name){
        $this->name = $new_name;
    }

    public function getName(){
        return $this->name;
    }

    public function setSurname(string $new_surname){
        $this->surname = $new_surname;
    }

    public function getSurname(){
        return $this->surname;
    }

    public function setAge(string $new_age){
        $this->age = $new_age;
    }

    public function getAge(){
        return $this->age;
    }

}