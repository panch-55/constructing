<?php

/**
 *
 */
require_once("../../controllers/videosController.php");
require_once("../../models/videosModel.php");

class videosAjax
{
	public $videoId;
	public $videoTmp;
	public $ruta;
	public $orden;
	private $controller;

	function __construct()
	{
		$this->controller = new videosController();
	}

	public function subirVideo()
	{
		$datos = array('videoTmp' => $this->videoTmp);
		$videoController = new videosController();
		$result = $videoController->subirVideoController($datos);
		echo $result;
	}
	public function delteVideo()
	{
		$datos = array('id' => $this->videoId,'ruta' => $this->ruta);
		//$deleteVideoController = new videosController();
		$result = $this->controller->deleteVideoController($datos);
		echo $result;
	}
	public function updateOrden()
	{
		$datos = array('videoId' =>$this->videoId,"orden"=>$this->orden);
		$result = $this->controller->updateOrdenController($datos);
		echo $result;

	}
}

if (isset($_POST['funcion'])) {
	$funcion = $_POST['funcion'];
	switch ($funcion) {
		case 'subirVideo':
			$subirVideo = new videosAjax();
			$subirVideo->videoTmp = $_FILES['video']['tmp_name'];
			$subirVideo->subirVideo();
			break;
		case 'eliminarVideo':
			$delte = new videosAjax();
			$delte->videoId = $_POST['videoId'];
			$delte->ruta = $_POST['ruta'];
			$delte->delteVideo();
			break;
		case 'actualizarOrden':
			$updateOrden = new videosAjax();
			$updateOrden->videoId = $_POST['ordenVideoId'];
			$updateOrden->orden = $_POST['ordenItemId'];
			$updateOrden->updateOrden();
			break;
		default:
			# code...
			break;
	}
}
