<?php

class Task
{
    private ?int $id;
    private string $description;
    private bool $isDone = false;
    private User $user;


    public function __construct(string $description,User $user)
    {
        $this->description = $description;
        $this->user = $user;
    }


    public function getDescription(): string
    {
        return $this->description;
    }


    public function setDescription(string $description): void
    {
        $this->description = $description;
    }


    public function isDone(): bool
    {
        return $this->isDone;
    }


    public function setIsDone(bool $isDone): void
    {
        $this->isDone = $isDone;
    }

    /**
     * @return User
     */
    public function getUser(): User
    {
        return $this->user;
    }




}