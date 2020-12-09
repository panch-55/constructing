<?php
/**
 *
 */
require_once("../../controllers/suscriptoresController.php");
require_once("../../models/suscriptoresModel.php");
class suscriptoresAjax
{

	public $suscriptorId;
	public function eliminaSuscriptor()
	{
		$id = $this->suscriptorId;
		$eliminaSuscriptor = new suscriptoresController();
		$respuesta = $eliminaSuscriptor->deleteSuscriptroController($id);
		echo $respuesta;
	}
}
if (isset($_POST['funcion'])) {
	$funcion = $_POST['funcion'];
	switch ($funcion) {
		case 'deleteSuscriptor':
			$delete = new suscriptoresAjax();
			$delete->suscriptorId = $_POST['id'];
			$delete->eliminaSuscriptor();
			break;

		default:
			# code...
			break;
	}
}