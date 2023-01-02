<?php
class Productos extends Orm{
    public $idProducto;
    public $nombreProducto;
    public $descripcionProducto;
    public $precioProducto;
    public $fabricante;

    public function __construct(PDO $connInstance)
    {
        parent::__construct('idProducto','productos',$connInstance);
    }
}
?>