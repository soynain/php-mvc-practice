<?php
$folderPath=dirname($_SERVER['SCRIPT_NAME']); //root path name of the project (folder) plus filename of this file
$urlPath=$_SERVER['REQUEST_URI']; //url request parameters, with root path name included
$url=substr($urlPath,strlen($folderPath)); //so you remove the root path name from the url to get controller name and method

/*
if we add the index.php to the public folder, the config scripts will cut also the
folder's name too
echo $folderPath.'</br>';
echo $urlPath.'</br>'; */

define("URL",$url); //you define the url as constant eachtime you reload
define("PUBLIC_PATH",$folderPath);

?>