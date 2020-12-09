<?php

/**
 *
 */
require_once("../../controllers/galeriaController.php");
require_once("../../models/gestorGaleriaModel.php");

class galeriaAjax
{

	public $nombreImgen;
	public $imageTemporal;
	public $imagenId;
 	public $ruta;

	public function gestorGaleriaAjax(){

		$datos = array("nombreImg" => $this->nombreImgen
					  ,"imagenTmp" => $this->imageTemporal);

		$galeriaController = new galeriaController();

		$respuesta = $galeriaController->mostrarImagenGaleriaController($datos);

		echo $respuesta;
 	}

 	public function deleteImagenGaleria()
 	{
 		$datos = array("imagenId" => $this->imagenId
					  ,"ruta" => $this->ruta);
 		$galeriaController = new galeriaController();
		$respuesta = $galeriaController->deleteImagenGaleriaController($datos);
		echo $respuesta;
 	}
 	public $actualizarOrdenId;
 	public $actualizarOrdenItem;
 	public function updateOrdenGaleria(){
 		$datos = array('actualizarOrdenId' => $this->actualizarOrdenId,
 					  'actualizarItem' => $this->actualizarOrdenItem
 						);
 		$galeriaController = new galeriaController();
 		$respuesta = $galeriaController->updateOdenGaleriaController($datos);
 		echo $respuesta;
 	}
 	public function muestraOrdenarGleria()
 	{
 		$galeriaController = new galeriaController();
 		$respuesta = $galeriaController->selectGaleriaImagenesOrdenar();
 		echo $respuesta;
 	}
}

if (isset($_FILES['imagen']['name'])) {
	$a = new galeriaAjax();
	$a->nombreImgen = $_FILES['imagen']['name'];
	$a->imageTemporal = $_FILES['imagen']['tmp_name'];
	$a->gestorGaleriaAjax();
}
if (isset($_POST['imagenId'])) {
	$delete = new galeriaAjax();
	$delete->imagenId = $_POST['imagenId'];
	$delete->ruta = $_POST['ruta'];
	$delete->deleteImagenGaleria();
}
if (isset($_POST['actualizarOrdenId'])) {
	$updateOrden = new galeriaAjax();
	$updateOrden->actualizarOrdenId = $_POST['actualizarOrdenId'];
	$updateOrden->actualizarOrdenItem = $_POST['actualizarOrdenItem'];
	$updateOrden->updateOrdenGaleria();
}

if (isset($_POST['funcion'])) {
	$funcion = $_POST['funcion'];
	switch ($funcion) {
		case 'muestraArticulosOrdenar':
			//echo "hola";
			$Orden = new galeriaAjax();
			$Orden->muestraOrdenarGleria();
			break;
		case 'guardaImagenGaleria':
			$saveImg = new galeriaAjax();
			$saveImg->nombreImgen = $_FILES['galeriaImg']['name'];
			$saveImg->imageTemporal = $_FILES['galeriaImg']['tmp_name'];
			$saveImg->gestorGaleriaAjax();
			break;
		default:
			# code...
			break;
	}
}
