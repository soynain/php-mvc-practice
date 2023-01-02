<?php
require_once __DIR__ . "/../Models/Productos.php";
class DashboardController extends Controller
{
    private $productosInstance;

    public function __construct(PDO $connInstance)
    {
        $this->productosInstance = new Productos($connInstance);
    }

    public function getproductos()
    {
        $getProductos = $this->productosInstance->getAll();
        $this->render('dashboard', $getProductos, 'bootstrapstructure');
    }

    public function add()
    {
        $this->render('addproduct', [], "bootstrapstructure");
    }

    public function saveprod()
    {
        if ($_POST) {
            $arrValuesToInsert = [];
            array_push($arrValuesToInsert, [
                $_POST["productotxt"],
                $_POST["desctxt"],
                $_POST["preciotxt"],
                $_POST["fabricantetxt"]
            ]);
            try {
                $this->productosInstance->save($arrValuesToInsert);
                header("Location:" . PUBLIC_PATH . "/dashboard/getproductos");
            } catch (PDOException $th) {
                header("Location:" . PUBLIC_PATH . "/dashboard/add");
            }
        }
    }

    public function edit()
    {
        $this->render('editproduct', [], 'bootstrapstructure');
    }

    public function editprod()
    {
        if ($_POST) {
            $userId = explode("/", URL)[3];
            $arrDao = [
                "nombreProducto" => $_POST["productotxt"],
                "descripcionProducto" => $_POST["desctxt"],
                "precioProducto" => $_POST["preciotxt"],
                "fabricante" => $_POST["fabricantetxt"]
            ];
            try {
                $this->productosInstance->updateById($arrDao, $userId);
                header("Location:" . PUBLIC_PATH . "/dashboard/getproductos");
            } catch (\Throwable $th) {
                echo $th;
            }
        }
    }

    public function delete()
    {
        $rowId = explode("/", URL)[3];
        //var_dump($rowId);
        $this->productosInstance->deleteById($rowId);
        header("Location:".PUBLIC_PATH."/dashboard/getproductos");
    }
}
