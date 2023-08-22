<?php

namespace App\Entity;

use App\Repository\UserDataSQLRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Form\Extension\Core\Type\DateType;

#[ORM\Entity(repositoryClass: UserDataSQLRepository::class)]
class UserDataSQL
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $surname = null;

    #[ORM\Column(nullable: true)]
    private ?int $age = null;

    #[ORM\Column(length: 255)]
    private ?string $email = null;

    #[ORM\Column(nullable: true)]
    private ?bool $checkbox = null;

    #[ORM\Column(length: 255)]
    private ?string $password = null;

    //initially, none of the users is an admin
    #[ORM\Column]
    private ?bool $admin = false;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $task = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    protected ?\DateTimeInterface $dueDate;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $dueDateString = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function isAdmin(): ?bool{
        return $this->admin;
    }

    /**
     * @param bool|null $admin
     */
    public function setAdmin(?bool $admin): void
    {
        $this->admin = $admin;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getSurname(): ?string
    {
        return $this->surname;
    }

    public function setSurname(string $surname): static
    {
        $this->surname = $surname;

        return $this;
    }

    public function getAge(): ?int
    {
        return $this->age;
    }

    public function setAge(int $age): static
    {
        $this->age = $age;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function isCheckbox(): ?bool
    {
        return $this->checkbox;
    }

    public function setCheckbox(bool $checkbox): static
    {
        $this->checkbox = $checkbox;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): static
    {
        $this->password = $password;

        return $this;
    }

    public function getTask(): ?string
    {
        return $this->task;
    }

    public function setTask(?string $task): static
    {
        $this->task = $task;

        return $this;
    }

    public function getDueDate(): string
    {
        if($this->dueDateString)
            //return $this->dueDate->format(DATE_RFC7231);
            return $this->dueDateString;
        else
            return 'none';
    }

    public function setDueDate(?\DateTimeInterface $dueDate): void
    {
        $this->dueDate = $dueDate;
        $this->dueDateString = $dueDate->format(DATE_RFC7231);
    }

    public function setDueDateFromString(string $newDueDate): void
    {
        $this->dueDateString = $newDueDate;
    }

}