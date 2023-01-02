<?php

class AuthMiddleware{
    private $nextObject;
    private $methodName;

    public function __construct($nextObject,$methodName)
    {
        $this->nextObject=$nextObject;
        $this->methodName=$methodName;
    }

    public function protectRoutes(){
        if(isset($_SESSION["user"]) && $this->nextObject instanceof LoginController){
            if($this->methodName==="logout"){
                $this->next();
            }else{
                header("Location:".PUBLIC_PATH."/dashboard/getproductos");
            }
        }else if(!isset($_SESSION["user"]) && $this->nextObject instanceof DashboardController){
            header("Location:".PUBLIC_PATH."/login");
        }else{
            $this->next();
        }
    }

    public function next(){
        $methodExec=$this->methodName;
        $this->nextObject->$methodExec();
    }
}

?>