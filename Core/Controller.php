<?php
/*As we'll have more controllers per action, we need a global 
template render function, so thats where this class comes into action*/
class Controller{
    protected function render($path,$params=[],$layout=''){
        ob_start();//we start the buffer to pass variables between views
        require_once __DIR__."/../App/Views/".$path.".view.php";//web component 
        $content=ob_get_clean();//we get the web component in a variable
        require_once __DIR__."/../App/Views/Layouts/".$layout.".layout.php";//we get the html structure and we print the web component
    }
}
?>