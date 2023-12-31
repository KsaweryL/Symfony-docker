<?php

namespace App\Entity;

use App\Repository\UsersTasksRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UsersTasksRepository::class)]
class UsersTasks
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $user_id = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $task = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    protected ?\DateTimeInterface $dueDate;

    #[ORM\Column]
    private ?bool $taskStatus = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUserId(): ?int
    {
        return $this->user_id;
    }

    public function setUserId(int $user_id): static
    {
        $this->user_id = $user_id;

        return $this;
    }

    public function getTask(): ?string
    {
        return $this->task;
    }

    public function setTask(string $task): static
    {
        $this->task = $task;

        return $this;
    }

    public function getDueDate(): string
    {
        if($this->dueDate)
            return $this->dueDate->format(DATE_RFC7231);
        else
            return 'none';
    }

    public function setDueDate(?\DateTimeInterface $dueDate): void
    {
        $this->dueDate = $dueDate;
    }

    public function isTaskStatus(): ?bool
    {
        return $this->taskStatus;
    }

    public function setTaskStatus(bool $taskStatus): static
    {
        $this->taskStatus = $taskStatus;

        return $this;
    }
}
