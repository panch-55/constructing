<?php
/**
 *
 */
require_once("../../controllers/mensajesController.php");
require_once("../../models/mensajesModel.php");
class mensajesAjax
{
	public $id;
	public $email;
	public $titulo;
	public $mensaje;
	public $nombre;
	public function cargaMensaje()
	{
		$msjController = new mensajesController();
		$id = $this->id;
		$respuesta = $msjController->leerMensajeController($id);
		echo $respuesta;
	}
	public function enviarCorreo()
	{
		$datos = array('email' =>$this->email,
						'titulo'=>$this->titulo,
						'mensaje'=>$this->mensaje,
						'nombre'=>$this->nombre);
		$enviaCorreo = new mensajesController();
		$respuesta = $enviaCorreo->enviaCorreoController($datos);
		echo $respuesta;
	}
	public function sendEmailToAll()
	{
		$datos = array('titulo'=>$this->titulo,
						'mensaje'=>$this->mensaje,);
		$enviaCorreoToAll = new mensajesController();
		$respuesta = $enviaCorreoToAll->sendEmailToAllController($datos);
		echo $respuesta;
	}
}
if (isset($_POST['funcion'])) {
	$funcion = $_POST['funcion'];
	switch ($funcion) {
		case 'cargaMensaje':
			$mensaje = new mensajesAjax();
			$mensaje->id = $_POST['mensajeId'];
			$mensaje->cargaMensaje();
			break;
		case 'enviarCorreo':
			$enviaCorreo = new mensajesAjax();
			$enviaCorreo->email = $_POST['email'];
			$enviaCorreo->titulo = $_POST['titulo'];
			$enviaCorreo->mensaje = $_POST['mensaje'];
			$enviaCorreo->nombre = $_POST['nombre'];
			$enviaCorreo->enviarCorreo();
			break;
		case 'sendToAll':
			$sendToAll = new mensajesAjax();
			$sendToAll->titulo = $_POST['titulo'];
			$sendToAll->mensaje = $_POST['mensaje'];
			$sendToAll->sendEmailToAll();
			break;

		default:
			# code...
			break;
	}
}