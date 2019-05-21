<?php
session_start();
require_once (ROOT. '/models/Tasks.php');

class Admin extends Tasks
{

    public function getAdmin()
    {
        $admin=$this->connection->query("SELECT * FROM admin");
        $admin=$admin->fetch();
        return $admin;
    }

    public function updateTask($id,$task){
        $this->connection->query("UPDATE tasks set task='$task' where id='$id'");
    }

    public function updateStatus($id,$status){
        $this->connection->query("UPDATE tasks set status='$status' where id='$id'");
    }


}