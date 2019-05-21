<?php


class Router
{

    private $routes;
    public function __construct()
    {

        $routePath=ROOT. '/config/routes.php';
        $this->routes=include ($routePath);
    }

    private function getURI(){
        if (!empty($_SERVER['REQUEST_URI'])) {
            return trim($_SERVER['REQUEST_URI']);
        }
    }

    public function run(){
        //получаем строку запроса
         $uri=$this->getURI();
         //ищем $uri в routes
        foreach($this->routes as $uriPattern=>$path){
           if(preg_match("`$uriPattern`",$uri)){
                $segment=explode('/', $path);
                $controllerName=array_shift($segment) . 'Controller';
                $controllerName=ucfirst($controllerName);

                $actonName='action' . ucfirst(array_shift($segment));

                $fileController=ROOT. "/controllers/$controllerName.php";

                if (file_exists($fileController)){
                    include ($fileController);
                }

                $controllerObject=new $controllerName;
               $reuslt=$controllerObject->$actonName();
               if ($reuslt!=0){
                   break;
               }
           }
        }
    }
}