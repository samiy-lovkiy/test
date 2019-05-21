<?php
session_start();
require_once(ROOT . '/models/Admin.php');

class AdminController extends Admin
{

    public function checkLogin($login)
    {
        $adminLogin=$this->getAdmin();
        $adminLogin=$adminLogin['login'];
        if ($login==$adminLogin){
            return true;
        }else{
            return false;
        }
    }

    public function checkPassword($password)
    {
        $adminPassword=$this->getAdmin();
        $adminPassword=$adminPassword['password'];
        if ($password==$adminPassword){
            return true;
        }else{
            return false;
        }
    }

    public function checkAdmin(){
        if (isset($_POST['login']) && isset($_POST['password'])){
                if ($_POST['login']!=='' && $_POST['password']!==''){
                    $login=$_POST['login'];
                    $password=$_POST['password'];
                    if ($this->checkLogin($login)==true && $this->checkPassword($password)==true){
                        return true;
                    }else{
                        return false;
                    }
                }else{
                    return false;
                }
            }else{
            return false;
        }
        }

    public function actionIndex()
    {
        if ($this->checkAdmin()==true){
            session_start();
            $_SESSION['login']=$_POST['login'];
            $_SESSION['password']=$_POST['password'];
        }
        if (isset($_POST['id']) && isset($_POST['task'])){
            if ($_POST['task']!==''){
                $id=$_POST['id'];
                $task=$_POST['task'];
                $this->updateTask($id,$task);
            }

        }
        if (isset($_POST['id'])&& isset($_POST['status'])){
            if ($_POST['id']!=='' && $_POST['status']!==''){
                $id=$_POST['id'];
                if ($_POST['status']==0){
                    $status=1;
                }else{
                    $status=0;
                }
                $this->updateStatus($id,$status);

            }
        }

        $tasks=$this->getTasks();
        include(ROOT . '/views/admin.php');
        return true;

    }

};
