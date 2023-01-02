<?php
class Router
{
    private $controller;
    private $method;

    public function __construct()
    {
        $this->matchRoute();
    }

    private function middlewareAuth()
    {
        return isset($_SESSION["user"]) && isset($_SESSION["id"]) ? true : false;
    }

    /*Logic in raw php is the following:
    split the url in an array of urls, and with those url
    parameters, locate the controller and the method to be executed.*/
    public function matchRoute()
    {
        $urlArray = explode("/", URL);
        $this->controller = !empty($urlArray[1]) ? ucwords($urlArray[1]) . "Controller" : "LoginController";
        $this->method = !empty($urlArray[2]) ? $urlArray[2] : "login";
        if ($this->middlewareAuth()) {
            if($this->controller!="login"){
                require_once(__DIR__ . "/Controllers/" . $this->controller . ".php");
            }else{
                $this->controller="DashboardController";
                $this->method="getproductos";
                require_once(__DIR__ . "/Controllers/" . $this->controller . ".php");
            }
        }else{
            echo $this->controller;
            if($this->controller!="login"){
               /* $this->controller="LoginController";
                $this->method="login";
                require_once(__DIR__ . "/Controllers/" . $this->controller . ".php");*/
                header("Location:".PUBLIC_PATH."/");
            }else{
                echo "asdas";
                require_once(__DIR__ . "/Controllers/" . $this->controller . ".php");
            }
        }
    }

    public function run()
    {
        $dbconn = new DatabaseRepository();
        $controllerFunc = new $this->controller($dbconn->getConnection()); //so this means php can create constructors with a string it appears.
        /*Necessary to create a localvariable to host the method executer*/
        $methodExec = $this->method;
        $controllerFunc->$methodExec(); //you execute one of the methods in the correspondent controller files
    }
}
