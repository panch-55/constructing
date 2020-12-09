<?php
/**
 *
 */
require_once("../../controllers/ingresosController.php");
require_once("../../models/ingresosModel.php");
class ingresosAjax
{
	public $userId;
	public $userName;
	public $email;
	public $pass;
	public $imagen;
	public $tipoUsuarioId;
	public function saveNewUser()
	{
		$datos = array('userName' =>$this->userName,'email' =>$this->email
			,'pass'=>$this->pass,'imagen'=>$this->imagen);
		$newUser = new ingresosController();
		$respuesta = $newUser->saveNewUserController($datos);
		echo $respuesta;
	}
	public function cargaUpdateUser()
	{
		$userId = $this->userId;
		$showUser = new ingresosController();
		$respuesta = $showUser->cargaUpdateUserController($userId);
		echo $respuesta;
	}

}
if (isset($_POST["funcionAjax"])) {
	$funcion = $_POST["funcionAjax"];
	switch ($funcion) {
		case 'guardaUsuario':
			$guarda = new ingresosAjax();
			$guarda->userName = $_POST['userName'];
			$guarda->email = $_POST['email'];
			$guarda->pass = $_POST['pass'];
			if (isset($_POST['image'])) {
				$guarda->imagen = $_POST['image'];
			}else{
				$guarda->imagen = $_FILES['image'];
			}

			$guarda->saveNewUser();
			break;
		case 'actulizaUsuario':
			$update = new ingresosAjax();
			$update->userId = $_POST['userId'];
			$update->cargaUpdateUser();
			break;
		default:
			# code...
			break;
	}
}