<?php

class TaskProvider
{
    //хранилище задач
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function getUndoneList(User $user): array
    {
        $statement = $this->pdo->prepare(
            'SELECT * FROM tasks WHERE user = :user'
        );
        $statement->execute([
            ':username' => $user
        ]);

        $result = $statement->fetchAll(PDO::FETCH_ASSOC);


        foreach ($result as $item) {
            $tasks[]= new Task(
                $item['description'],
                $user
            );
        }
        return $tasks;
    }

    public function addTask(Task $task)
    {
        $statement = $this->pdo->prepare(
            'INSERT INTO users (description, isDone, user_id) VALUES (:description, :isDone, :user_id)'
        );

        return $statement->execute([
            'description' => $task->getDescription(),
            'isDone' => $task->isDone(),
            'user_id' => $task->getUser()->getId()
        ]);
    }

    public function deleteTask(int $key): void
    {
        unset($_SESSION['tasks'][$key]);
        unset($this->tasks[$key]);
    }


}