<?php

require_once (ROOT. '/models/Tasks.php');

class MainController extends Tasks
{
    public function actionIndex($page){
        if (isset($_POST['user_name'])){
            $user=$_POST['user_name'];
            $email=$_POST['email'];
            $task=$_POST['task'];
            if ($user!=='' && $email!=='' && $task!=='') {
                $this->createTask($user, $email, $task);
            }
        }

        if (isset($_GET)){
            $tasks=$this->getTasks();
            $tasks=array_slice($tasks,0,3);
        }
        if (isset($_GET['user_name'])){
            $tasks=$this->getTasksFromUser($_GET['user_name']);
        }
        if (isset($_GET['email'])){
            $tasks=$this->getTasksFromEmail($_GET['email']);
        }
        if (isset($_GET['status'])){
            $tasks=$this->getTasksFromStatus($_GET['status']);
        }
        $countTaskPages=$this->getCountTasks()/3;
        if ($this->getCountTasks()%3==0){
            $countTaskPages=$this->getCountTasks()/3;
        }else{
            $countTaskPages=$this->getCountTasks()/3+1;
        }

        if (isset($page)){
            $pageNumber=(int)$page;
            $begin=$pageNumber*3-3;
            $tasks=$this->getTasks();
            $tasks=array_slice($tasks,$begin,3);
        }
        include(ROOT . '/views/index.php');
        return true;
    }
}