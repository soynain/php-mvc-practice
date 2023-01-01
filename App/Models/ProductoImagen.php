<?php
class ProductoImagen extends Orm{
    public $idImagenProducto;
    public $pathFoto;
    public $fkProductoRegistro;

    public function __construct(PDO $connInstance)
    {
        parent::__construct('idImagenProducto','productoimagen',$connInstance);
    }
}
?>