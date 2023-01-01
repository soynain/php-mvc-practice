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
            'cost'=>12,
            'salt'=>'prueba'
        ];
        $validateUserAndPassStm=$this->connInstance->prepare("SELECT usuario,contrasena FROM {$this->tableName} WHERE usuario=:USER and contrasena=:PASS");
        $validateUserAndPassStm->bindValue(":USER",$username);
        $validateUserAndPassStm->bindValue(":PASS",password_hash($password,PASSWORD_BCRYPT,$opciones));
        
        $validateUserAndPassStm->execute();
        return $validateUserAndPassStm->fetch();
    }
}
?>