<?php
class Usuarios extends Orm{
    public $idUsuario;
    public $nombres;
    public $apellidoPaterno;
    public $apellidoMaterno;
    public $fechaNacimiento;

    public function __construct(PDO $connInstance)
    {
        parent::__construct('idUsuario','usuarios',$connInstance);
    }
}
?>