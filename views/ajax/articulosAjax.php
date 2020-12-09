<?php
/**
 * +
 */
require_once("../../controllers/articulosController.php");
require_once("../../models/articulosModel.php");
class articulosAjax
{   
    public $id;
    public function getArticuloById()
    {
        $id = $this->id;
        $articulo = new articulosController();
        $result = $articulo->getArticuloByIdController($id);
        echo $result;
    }
}
if (isset($_POST['funcionAjax'])) {
    $funcion = $_POST['funcionAjax'];
    switch ($funcion) {
        case 'getArticulo':
            $getArticulo = new articulosAjax();
            $getArticulo->id = $_POST['articuloId'];
            $getArticulo->getArticuloById();
            break;
        
        default:
            # code...
            break;
    }
}