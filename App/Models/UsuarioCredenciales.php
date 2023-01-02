<?php
class UsuarioCredenciales extends Orm{
    public $idCredencial;
    public $usuario;
    public $contrasena;
    public $correoElectronico;
    public $fkUsuarioDatos;
    private $connInstance;
    public function __construct(PDO $connInstance)
    {
        parent::__construct('idCredencial','usuariocredenciales',$connInstance);
        $this->connInstance=$connInstance;
    }

    public function validateUserAndPass($username,$password){
        $opciones=[
            'cost'=>12
        ];
        $validateUserAndPassStm=$this->connInstance->prepare("SELECT usuario,contrasena FROM {$this->tableName} WHERE usuario=:USER");
        $validateUserAndPassStm->bindValue(":USER",$username);
        //$validateUserAndPassStm->bindValue(":PASS",password_hash($password,PASSWORD_BCRYPT,$opciones));
        //$passwordMatchBool=
        $validateUserAndPassStm->execute();
        $credentials = $validateUserAndPassStm->fetch();
        $validCredentialsBool=password_verify($password,$credentials["contrasena"]);
        return $validCredentialsBool==true?$credentials:[];
    }
}
?>