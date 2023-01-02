<?php

class Router
{
    private $controller;
    private $method;

    public function __construct()
    {
        $this->matchRoute();
    }


    /*Logic in raw php is the following:
    split the url in an array of urls, and with those url
    parameters, locate the controller and the method to be executed.*/
    public function matchRoute()
    {
        $urlArray = explode("/", URL);
        $this->controller = !empty($urlArray[1]) ? ucwords($urlArray[1]) . "Controller" : "LoginController";
        $this->method = !empty($urlArray[2]) ? $urlArray[2] : "login";
        require_once(__DIR__ . "/Controllers/" . $this->controller . ".php");
    }

    public function run()
    {
        $dbconn = new DatabaseRepository();
        $controllerFunc = new $this->controller($dbconn->getConnection()); //so this means php can create constructors with a string it appears.
        /*Necessary to create a localvariable to host the method executer*/
        $methodExec = $this->method;
        //$controllerFunc->$methodExec(); //you execute one of the methods in the correspondent controller files
        $authMiddleware=new AuthMiddleware($controllerFunc,$this->method);
        $authMiddleware->protectRoutes();
        //echo empty($_SESSION["user"])." sdasdas";
    }
}
