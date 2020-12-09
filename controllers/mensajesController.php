<?php
/**
 *
 */

class mensajesController
{
	private $model;
	function __construct()
	{
		$this->model = new mensajesModel();
	}
	public function saveMensajeController($datos)
	{
		$nombre = $datos['nombre'];
		$email = $datos['email'];
		$mensaje = $datos['mensaje'];
		if(preg_match('/^[a-zA-Z\s]+$/', $nombre) && preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $email) && preg_match('/^[a-zA-Z0-9\s\.,]+$/', $mensaje)){

			$correoDestino = "letsrcok116@gmail.com";
			$asunto = "Nuevo mensje de la pagina";
			$mensajeCorreo = "Nombre: ".$nombre."\n"."Email: ".$email."\n"."Mensaje: ".$mensaje;
			$cabecera = "From: sitio web";
			$envio = mail($correoDestino, $asunto, $mensajeCorreo, $cabecera);

			$respuesta = $this->model->saveMensajeModel($datos,"mensajes");
				if ($envio == true && $respuesta == "ok") {
					echo $respuesta;
				}
			}
	}
}
