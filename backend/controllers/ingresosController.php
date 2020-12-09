<?php
/**
 *
 */
class ingresosController
{
	private $model;
	function __construct()
	{
		$this->model = new ingresosModel();
	}
	public function ingreso(){

		if (isset($_POST['usuarioIngreso']) and isset($_POST['passwordIngreso'])) {
			# code...
			if (preg_match('/^[a-zA-Z0-9]+$/', $_POST['usuarioIngreso'])) {
				# code...
				$datos = array("user"=>$_POST['usuarioIngreso']
								,"pass"=>$_POST['passwordIngreso']);
				$respuesta = $this->model->ingresoUsuarioModel($datos,"users");
				$intentos = $respuesta['intentos'];
				$md5 = md5($datos['user']);
				$salt = '$2a$07$'.$md5.'$';
				$passEncriptada = crypt($_POST['passwordIngreso'],$salt);
				//echo $passEncriptada;
				//$passEncriptada = crypt($_POST['paswordIngreso'],'$1$rasmusle$'.$datos['user']);

				if ($intentos < 2) {

					if (!empty($respuesta)) {

						$pass = $respuesta['password'];

						if ($respuesta['userName'] == $datos['user'] AND $pass == $passEncriptada) {
							$intentos = 0;
							$datosIntentos = array('user' =>$_POST['usuarioIngreso'],'intentos' => $intentos );
							$this->model->actualizaIntentos($datosIntentos,"users");
							session_start();
							$_SESSION['validar'] = true;
							$_SESSION['usuario'] = $_POST['usuarioIngreso'];
							$_SESSION['usuarioId'] = $respuesta['userId'];
							header("location:inicio");
						}else{
							++$intentos;
							$datosIntentos = array('user' => $_POST['usuarioIngreso'],'intentos' => $intentos);
							$this->model->actualizaIntentos($datosIntentos,"users");

							echo '<div class="alert alert-danger">Error al ingresar</div>';
						}
					}else{
						echo '<div class="alert alert-danger">Error al ingresar</div>';
					}
				}
				else{
					$intentos = 0;
					$datosIntentos = array('user' =>$_POST['usuarioIngreso'],'intentos' => $intentos );
					$this->model->actualizaIntentos($datosIntentos,"users");
					echo '<div class="alert alert-danger">Has fallado tres veces al ingresar, por favor comprueba que no eres un robot</div>';
				}
			}
		}
	}
	public function saveNewUserController($datos)
	{
		$imagen = $datos['imagen']['tmp_name'];
		if ($imagen != "sin imagen") {
			//var_dump($imagen);
			list($ancho,$alto) = getimagesize($imagen);
			$aleatorio = mt_rand(100,999);
			if ($ancho > 800 && $alto > 400) {

				$ruta = "../../views/images/usuarios/user".$aleatorio.".jpg";
				$thumb = imagecreatetruecolor(800,600);
				$origen = imagecreatefromjpeg($imagen);
				imagecopyresized($thumb, $origen, 0, 0, 0, 0, 800, 600, $ancho, $alto);
				//@move_uploaded_file($thumb,$ruta);
				imagejpeg($thumb,$ruta);
				imagedestroy($thumb);
				$datos += ["ruta" => $ruta];
				$respuestaId = $this->model->saveNewUserModel($datos,"users");
				$respuesta = $this->model->selectUsuarioModel($respuestaId,"users");
				echo json_encode($respuesta);
			}else{
				$rutaImg = "../../views/images/articulos/user".$aleatorio.".jpg";
				$origen =  $imagen;
				$datos += [ "ruta" => $rutaImg ];
				if (@move_uploaded_file($origen,$rutaImg)) {
					$respuestaId = $this->model->saveNewUserModel($datos,"users");
					$respuesta = $this->model->selectUsuarioModel($respuestaId,"users");
					echo json_encode($respuesta);
				}
			}
		}else{
			$datos += ["ruta" => ""];
			$respuestaId = $this->model->saveNewUserModel($datos,"users");
			$respuesta = $this->model->selectUsuarioModel($respuestaId,"users");
			echo $respuesta;
		}
		//$result = $this->model->saveNewUserModel($datos);
	}
	public function cargaUpdateUserController($userId)
	{
		$respuesta = $this->model->selectUsuarioModel($userId,"users");
		$selected1 = "";
		$selected2 = "";
		$selected3 = "";
		if ($respuesta['rollId'] == 1) {
			$selected1 = 'selected=""';
		}
		elseif ($respuesta['rollId'] == 2) {
			$selected2 = 'selected=""';
		}
		elseif ($respuesta['rollId'] == 3) {
			$selected3 = 'selected=""';
		}
		$dataUser = '<div class="row">
		<div class="col-xm-12 col-sm-12 col-lg-4">
				<input hidden="" type="text" id="userId" value="'.$respuesta['userId'].'">
		    	<label for="userNameUpdate">Nombre de usuario</label>
		      	<input id="userNameUpdate" type="text" class="form-control" placeholder="juanPijamas" maxlength="20" value="'.$respuesta['userName'].'">
		      	<div id="errorName" class="invalid-feedback">
			      El nombre no puede llevar caracteres especiales ni espacios
			    </div>
		    </div>
		    <div class="col-xm-12 col-sm-12 col-lg-4">
		       <label for="emailUpdate">Email address</label>
			   <input type="email" id="emailUpdate" class="form-control" placeholder="name@example.com" value="'.$respuesta['email'].'">
		    </div>
		    <div class="col-xm-12 col-sm-12 col-lg-4">
		    <label for="email">Tipo Usuario</label>
		    	<select class="form-control" id="perfilIdUpdate">
		    		<option '.$selected1.' value="1">1</option>
		    		<option '.$selected2.' value="2">2</option>
		    		<option '.$selected3.' value="3">3</option>
		    	</select>
		    </div>
		</div>';
		echo $dataUser;
	}

}