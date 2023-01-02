<?php
session_start();
//you redirect all the requests here from your htaccess file
require_once __DIR__ . "/../App/autoload.php";
/*Autoload file just works for linking your init files in a external file*/






$routerOrquestrator = new Router(); //you start the router with the contructor by executing first the matchRoute method

$routerOrquestrator->run();// after the matchMethod, you exec run with the extacted method and controllername
