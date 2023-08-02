<?php
include "model/User.php";
include "model/UserProvider.php";

$pdo = include "db.php";

$pdo->exec('CREATE TABLE users (
  id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
  name VARCHAR(150),
  username VARCHAR(100) NOT NULL,
  password VARCHAR(100) NOT NULL
)');


$user = new User('admin');
$user->setName('GeekBrains PHP');

$userProvider = new UserProvider($pdo);
$userProvider->registerUser($user, '123');

$user = $userProvider->getByUser('admin');


$pdo->exec('CREATE TABLE tasks (
  id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
  description VARCHAR(150),
  isDone INTEGER NOT NULL,
  user_id INTEGER NOT NULL  
)');

$task = new Task('Task1',$user);

$taskProvider = new TaskProvider($pdo);
$taskProvider->addTask($task);

$taskList= $taskProvider->getUndoneList($user);
