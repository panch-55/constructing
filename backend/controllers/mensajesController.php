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
	public function selectMensajesController()
	{
		$result = $this->model->selectMensajesModel("mensajes");
		foreach ($result as $key) {
			if ($key['visto'] == 0) {
					$visto = "Sin ver";
					$classView = "badge badge-pill badge-danger";
				}else{
					$visto = "Visto";
					$classView = "badge badge-pill badge-success";
				}
			echo '<div id="'.$key['mensajeId'].'" class="well well-sm alert alert-secondary">
				<span class="fa fa-times pull-right"></span>
				<h3>De:'.$key['nombre'].'</h3>
				<h5>Email: '.$key['email'].'</h5>
				<p>'.substr($key['mensaje'],0,40)."...".'</p>
				<div class="row justify-content-between pl-3 pr-3">
					<button id="leerMensaje" class="btn btn-info btn-sm">Leer</button>
					<p class="card-text"><small style="color:white!important;" class="text-muted '.$classView.'">'.$visto.
					'</small></p>
				</div>
			</div>';
		}
	}
	public function leerMensajeController($id)
	{
		$result = $this->model->leerMensajeModel($id,"mensajes");
		$this->model->actulizaVistaModel($id,"mensajes");
		echo '<div class="well well-sm alert alert-info shadow">
			<span class="fa fa-times pull-right closeMsj"></span>
			<h3>De: '.$result['nombre'].'</h3>
			<h5>Email: '.$result['email'].'</h5>
			<p style="background:#fff; padding:10px; border-radius: 1em/5em;">'.$result['mensaje'].'</p>
			<button id="responderMsj" class="btn btn-info btn-sm" data-toggle="modal" data-target="#exampleModal">Responder</button>
		</div>';
	}
	public function enviaCorreoController($datos)
	{
		$email = $datos['email'];
		$titulo = $datos['titulo'];
		$mensaje = $datos['mensaje'];
		$nombre = $datos['nombre'];

		$correoDestino = $email . ', ';
		$correoDestino .= "letsrcok116@gmail.com";
		$asunto = $titulo;
		$mensajeCorreo = '<!DOCTYPE html>
		<html>
		<head>
			<title>Correo</title>
		</head>
		<body>

			<h1>Hola '.$nombre.'</h1>
			<p>'.$mensaje.'</p>
			<p><b>Franciso, correo de prueba</b><br>
			From: develeCreations<br>
			Direccion: esta es una deireccion de prueba<br>
			WhatsApp: 346721813<br>
			develeCreations@gmail.com<br>
			<a href="www.mipaginaweb.com" target="blank"><img src="" alt="mi pagina web"></a>
			<a href="www.faceboock.com" target="blank"><img src="" alt="faceboock"></a>
			<a href="www.youtube.com" target="blank"><img src="" alt="YouTube"></a>
			<a href="www.instagrame.com" target="blank"><img src="" alt="Instagrame"></a>
			</p>

			<hr>

		</body>
		</html>';
		$cabeceras = 'MIME-Version: 1.0'."\r\n";
		$cabeceras .= 'Content-type: text/html; charset= UTF-8'."\r\n";
		$cabeceras .= 'From:<develeCreations@gmail.com>'."\r\n";
		$envio = mail($correoDestino, $asunto, $mensajeCorreo, $cabeceras);
		if ($envio) {
			echo true;
		}else{
			echo false;
		}
	}
	public function sendEmailToAllController($datos)
	{
		$titulo = $datos['titulo'];
		$mensaje = $datos['mensaje'];

		$emails = $this->model->selectEmialsModel("mensajes");
		foreach ($emails as $key) {

			$email = $key['email'];
			$nombre = $key['nombre'];

			$correoDestino = $email;
			$asunto = $titulo;
			$mensajeCorreo = '<!DOCTYPE html>
			<html>
			<head>
				<title>Correo</title>
			</head>
			<body>

				<h1>Hola '.$nombre.'</h1>
				<p>'.$mensaje.'</p>
				<p><b>Franciso, correo de prueba</b><br>
				From: develeCreations<br>
				Direccion: esta es una deireccion de prueba<br>
				WhatsApp: 346721813<br>
				develeCreations@gmail.com<br>
				<a href="www.mipaginaweb.com" target="blank"><img src="" alt="mi pagina web"></a>
				<a href="www.faceboock.com" target="blank"><img src="" alt="faceboock"></a>
				<a href="www.youtube.com" target="blank"><img src="" alt="YouTube"></a>
				<a href="www.instagrame.com" target="blank"><img src="" alt="Instagrame"></a>
				</p>

				<hr>

			</body>
			</html>';
			$cabeceras = 'MIME-Version: 1.0'."\r\n";
			$cabeceras .= 'Content-type: text/html; charset= UTF-8'."\r\n";
			$cabeceras .= 'From:<develeCreations@gmail.com>'."\r\n";
			$envio = mail($correoDestino, $asunto, $mensajeCorreo, $cabeceras);
			if ($envio) {
				echo true;
			}else{
				echo false;
			}
		}
	}
	public function mensajesNoVistosController()
	{
		$result = $this->model->mensajesNoVistosModel("mensajes");
		echo $result['noVistos'];
	}
}

