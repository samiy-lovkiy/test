<?php

require_once (ROOT. '/models/Tasks.php');

class SortController extends Tasks
{
    public function actionIndex($param,$page){
        if ($param=='emaildown') {
            $pageNumber=(int)$page;
            $begin=$pageNumber*3-3;
            $tasks = $this->sortTasksForEmail();
            $tasks=array_slice($tasks,$begin,3);
        }else{
            if ($param=='emailup') {
                $pageNumber=(int)$page;
                $begin=$pageNumber*3-3;
                $tasks = $this->sortTasksForEmail();
                $tasks=array_reverse($tasks);
                $tasks=array_slice($tasks,$begin,3);
            }
        }


        if ($param=='usernamedown') {
            $pageNumber=(int)$page;
            $begin=$pageNumber*3-3;
            $tasks = $this->sortTasksForUser();
            $tasks=array_slice($tasks,$begin,3);
        }else{
            if ($param=='usernameup') {
                $pageNumber=(int)$page;
                $begin=$pageNumber*3-3;
                $tasks = $this->sortTasksForUser();
                $tasks=array_reverse($tasks);
                $tasks=array_slice($tasks,$begin,3);
            }
        }
        $countTaskPages = $this->getCountTasks() / 3;
        if ($this->getCountTasks() % 3 == 0) {
            $countTaskPages = $this->getCountTasks() / 3;
        } else {
            $countTaskPages = $this->getCountTasks() / 3 + 1;
        }

        include (ROOT. '/views/index.php');
        return true;
    }
}