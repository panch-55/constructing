<?php
/**
 *
 */
require_once("../../controllers/mensajesController.php");
require_once("../../models/mensajesModel.php");
class mensajesAjax
{
	public $nombre;
	public $email;
	public $mensaje;

	public function saveMensaje()
	{
		$datos = array('nombre' =>$this->nombre,
		'email'=>$this->email, 'mensaje' => $this->mensaje);
		$saveMensaje = new mensajesController();
		$respuesta = $saveMensaje->saveMensajeController($datos);
		echo $respuesta;
	}
}

if (isset($_POST['funcion'])) {
	$funcion = $_POST['funcion'];
	switch ($funcion) {
		case 'saveMensaje':
			$saveMensaje = new mensajesAjax();
			$saveMensaje->nombre = $_POST['nombre'];
			$saveMensaje->email = $_POST['email'];
			$saveMensaje->mensaje = $_POST['mensaje'];
			$saveMensaje->saveMensaje();
			break;

		default:
			# code...
			break;
	}
}