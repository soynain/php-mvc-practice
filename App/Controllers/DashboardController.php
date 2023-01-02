<?php
require_once __DIR__."/../Models/Productos.php";
class DashboardController extends Controller{
    private $productosInstance;

    public function __construct(PDO $connInstance){
        $this->productosInstance=new Productos($connInstance);
    }

    public function getproductos(){
        $getProductos=$this->productosInstance->getAll();
        $this->render('dashboard',$getProductos,'bootstrapstructure');
    }

    public function add(){
        $this->render('addproduct',[],"bootstrapstructure");
    }

    public function saveprod(){
        if($_POST){
            $arrValuesToInsert=[];
            array_push($arrValuesToInsert,[
                $_POST["productotxt"],
                $_POST["desctxt"],
                $_POST["preciotxt"],
                $_POST["fabricantetxt"]
            ]);
            try {
                $this->productosInstance->save($arrValuesToInsert);
                header("Location:".PUBLIC_PATH."/dashboard/getproductos");
                
            } catch (PDOException $th) {
                header("Location:".PUBLIC_PATH."/dashboard/add");
            }
        }
    }
}
?>