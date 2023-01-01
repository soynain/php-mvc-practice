<?php
/*Methods executed with the url extracted method name*/
require_once __DIR__."/../Models/UsuarioCredenciales.php";
class LoginController extends Controller{
    private $loginModelInstance;
    public function __construct(PDO $connInstance)
    {
        $this->loginModelInstance=new UsuarioCredenciales($connInstance);
    }

    public function login(){
        $this->render('login',[],"bootstrapStructure"); //so we can just specify the name of the view
    }

    public function loginpost(){
        if($_POST){
            if(isset($_POST["usernametxt"])&&isset($_POST["password"])){
                $queryForCredentials=$this->loginModelInstance->validateUserAndPass($_POST["usernametxt"],$_POST["password"]);
                if(sizeof($queryForCredentials)>0){
                    $this->listar();
                }else{
                    
                }
            }
        }
    }

    public function listar(){
        $this->render('login',[],"boostrapStructure");
    }
}
?>