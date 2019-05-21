<?php


class Tasks
{
    protected $connection;
    private $db;

    public function __construct()
    {
        $dburl = ROOT . '/config/db.php';
        $this->db = include($dburl);
        $host = $this->db['host'];
        $dbname = $this->db['dbname'];
        $username = $this->db['username'];
        $password = $this->db['password'];
        $this->connection = new PDO("mysql:host=$host; dbname=$dbname; charset=utf8", "$username", "$password");
    }

    public function getTasks()
    {
        $tasks = $this->connection->query("SELECT * FROM tasks");
        $tasks = $tasks->fetchAll();
        return $tasks;
    }

    public function createTask($user, $email, $task)
    {
        $this->connection->query("INSERT INTO tasks (user_name,email,task) values ('$user','$email','$task')");
    }

    public function getTasksFromUser($user)
    {
        $tasks=$this->connection->query("SELECT * FROM tasks where user_name='$user'");
        $tasks=$tasks->fetchAll();
        return $tasks;
    }

    public function getTasksFromEmail($email)
    {
        $tasks=$this->connection->query("SELECT * FROM tasks where email='$email'");
        $tasks=$tasks->fetchAll();
        return $tasks;
    }

    public function getTasksFromStatus($status)
    {
        $tasks=$this->connection->query("SELECT * FROM tasks where status='$status'");
        $tasks=$tasks->fetchAll();
        return $tasks;
    }



    public function getCountTasks()
    {
        $count=count($this->getTasks());
        return $count;
    }



}