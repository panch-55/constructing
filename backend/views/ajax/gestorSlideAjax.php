<?php

require_once("../../controllers/gestorSlideController.php");
require_once("../../models/gestorSlideModel.php");

/**
 *
 */
class ajaxSlide
{
	public $nombreImgen;
	public $imageTemporal;

	public function gestorSlideAjax(){

		$datos = array("nombreImg" => $this->nombreImgen
					  ,"imagenTmp" => $this->imageTemporal);

		$gestorSlideController = new gestorSlideController();

		$respuesta = $gestorSlideController->mostrarImagenController($datos);

		return json_encode($respuesta);
 	}
 	public $slideid;
	public $rutaSlide;
	public $imgs = array();
 	public function borrarImagenSlide(){
 		$datos = array('slideid' => $this->slideid,
 					   'rutaSlide' => $this->rutaSlide);
 		$gestorSlideController = new gestorSlideController();
 		$respuesta = $gestorSlideController->eliminarImagenController($datos);
 		echo json_encode($respuesta);
 	}

 	public $actualizarId;
 	public $updateTitulo;
 	public $updateDescripcion;
 	public function actualizarDetalleSlide(){
 		$datos = array('actualizarId' => $this->actualizarId,
 					  'tituloEnvio' => $this->updateTitulo,
 					  'descripcionEnvio' => $this->updateDescripcion);
 		$gestorSlideController = new gestorSlideController();
 		$selectSlideController = new gestorSlideController();
 		$gestorSlideController->actualizarImagenController($datos);
 		$respuesta = $selectSlideController->selectUpdateImagenController($datos);
 		//header('Content-Type: application/json');
 		//echo json_encode($respuesta,JSON_FORCE_OBJECT);

 		//header('Content-type: application/json; charset=utf-8');
 		echo json_encode($respuesta,JSON_FORCE_OBJECT);
 		//echo json_encode($dato, JSON_FORCE_OBJECT);
 		//echo json_encode($datos);
 		//exit();
 	}
 	public $actualizarOrdenId;
 	public $actualizarOrdenItem;
 	public function updateOrdenSlide(){
 		$datos = array('actualizarOrdenId' => $this->actualizarOrdenId,
 					  'actualizarItem' => $this->actualizarOrdenItem
 						);
 		$gestorSlideController = new gestorSlideController();
 		$respuesta = $gestorSlideController->updateOdenSlideController($datos);
 		echo $respuesta;
	 }
	 public function saveImagesSlide()
	 {
		$datos = array("nombreImg" => $this->nombreImgen
					  ,"imagenTmp" => $this->imageTemporal);
		$slideController = new gestorSlideController();
 		$respuesta = $slideController->mostrarImagenController($images);
 		return $respuesta;
	 }


}
if (isset($_FILES['imagen']['name'])) {
	$a = new ajaxSlide();
	$a->nombreImgen = $_FILES['imagen']['name'];
	$a->imageTemporal = $_FILES['imagen']['tmp_name'];
	$a->gestorSlideAjax();
}

if (isset($_POST['slideid'])) {
	$b = new ajaxSlide();
	$b->slideid = $_POST['slideid'];
	$b->rutaSlide = $_POST["rutaSlide"];
	$b->borrarImagenSlide();
}
if (isset($_POST['actualizarId'])) {
	$actualizar = new ajaxSlide();
	$actualizar->actualizarId = $_POST['actualizarId'];
	$actualizar->updateTitulo = $_POST["enviarTitulo"];
	$actualizar->updateDescripcion = $_POST['enviarDescripcion'];
	$actualizar->actualizarDetalleSlide();
}
if (isset($_POST['actualizarOrdenId'])) {
	$updateOrden = new ajaxSlide();
	$updateOrden->actualizarOrdenId = $_POST['actualizarOrdenId'];
	$updateOrden->actualizarOrdenItem = $_POST['actualizarOrdenItem'];
	$updateOrden->updateOrdenSlide();
}
if (isset($_POST['funcionAjax'])) {
	$funcion = $_POST['funcionAjax'];
	switch ($funcion) {
		case 'guardaImagenSlide':
			$saveSlideImgs = new ajaxSlide();
			$saveSlideImgs->nom = $img = $_FILES['slideImgs']['tmp_name'];
			$saveSlideImgs->saveImagesSlide();
			break;

		default:
			# code...
			break;
	}
}