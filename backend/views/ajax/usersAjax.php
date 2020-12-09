<?php
/**
 *
 */
require_once("../../controllers/usersController.php");
require_once("../../models/usersModel.php");
class usersAjax
{
	public $userId;
	public $userName;
	public $email;
	public $pass;
	public $imagen;
	public $perfilId;
	public function updateUser($value='')
	{
		$datos = array('userId' => $this->userId,'userName'=>$this->userName, 'email'=>$this->email,'perfilId'=>$this->perfilId );
		$updateUser = new usersController();
		$result = $updateUser->updateUserController($datos);
		echo $result;
	}
	public function cargaUpdateEmail()
	{
		$id = $this->userId;
		$cargaEmial = new usersController();
		$result = $cargaEmial->cargaEmailController($id);
		echo $result;
	}
	public function updateEmialUser()
	{
		$id = $this->userId;
		$email = $this->email;
		$updateEmail = new usersController();
		$result = $updateEmail->updateEmailController($id,$email);
		echo $result;
	}
	public function updateUserName()
	{
		$id = $this->userId;
		$userName = $this->userName;
		$update = new usersController();
		$result = $update->updateUserNameController($id,$userName);
		echo $result;
	}
	public function validaPass()
	{
		$id = $this->userId;
		$pass = $this->pass;
		$valida = new usersController();
		$result = $valida->validaPassController($id,$pass);
		echo $result;
	}
	public function updatePassword()
	{
		$id = $this->userId;
		$pass = $this->pass;
		$valida = new usersController();
		$result = $valida->updatePassController($id,$pass);
		echo $result;
	}
}


if (isset($_POST["funcionAjax"])) {
	$funcion = $_POST["funcionAjax"];
	switch ($funcion) {
		case 'updatePerfilAjax':
			$update = new usersAjax();
			$update->userId = $_POST['userId'];
			$update->userName = $_POST['userName'];
			$update->email = $_POST['email'];
			$update->perfilId = $_POST['perfilId'];
			$update->updateUser();
			break;
		case 'cargaUpdateEmail':
			$updateEmail = new usersAjax();
			$updateEmail->userId = $_POST['userId'];
			$updateEmail->cargaUpdateEmail();
			break;
		case 'updateEmailAjax':
			$updateEmail = new usersAjax();
			$updateEmail->userId = $_POST['userId'];
			$updateEmail->email = $_POST['email'];
			$updateEmail->updateEmialUser();
			break;
		case 'updateUserNameAjax':
			$updateEmail = new usersAjax();
			$updateEmail->userId = $_POST['userId'];
			$updateEmail->userName = $_POST['userName'];
			$updateEmail->updateUserName();
			break;
		case 'validaPassAjax':
			$validaPass = new usersAjax();
			$validaPass->userId = $_POST['userId'];
			$validaPass->pass = $_POST['password'];
			$validaPass->validaPass();
			break;
		case 'updatePassAjax':
			$updatePass = new usersAjax();
			$updatePass->userId = $_POST['userId'];
			$updatePass->pass = $_POST['password'];
			$updatePass->updatePassword();
			break;
		default:
			# code...
			break;
	}
}