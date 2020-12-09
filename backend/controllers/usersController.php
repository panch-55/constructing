<?php
/**
 *
 */
class usersController
{
	private $model;
	function __construct()
	{
		$this->model = new usersModel();
	}
	public function getUsersController()
	{
		$result = $this->model->getUsersModel("users");
		$row = 1;
		foreach ($result as $key) {
			echo $users = '<tr>
					<td>'.$row.'</td>
					<td hidden="">'.$key['userId'].'</td>
			        <td>'.$key['userName'].'</td>
			        <td>Administrador</td>
			        <td>'.$key['email'].'</td>
			        <td><span class="btn btn-info fa fa-pencil editarPefil"></span></td>
			    </tr>';
			$row += 1;
		}
	}
	public function getUsuarioByIdController()
	{
		$id = $_SESSION['usuarioId'];
		$result = $this->model->getUserByIdModel($id,"users");

		$user = '<input hidden="" type="text" id="userIdlog" value="'.$result['userId'].'">
		<h1><span class="spanUserName">'.$result['userName'].'</span>
		<span class="btn btn-info fa fa-pencil pull-left editaUserName" style="font-size:10px; margin-right:10px"></span></h1>

		<div style="position:relative">
			<img src="'. substr($result['photo'],4) .'" class="rounded-pill  pull-right">
			<span class="btn btn-info fa fa-pencil editaPhoto" style="font-size:10px; margin-right:10px; position:absolute; right:-20px; top:-50px"></span>
		</div>

		<hr>

		<h4>Perfil: <span class="admin">Administrador</span>
		<span class="btn btn-info fa fa-pencil pull-left editaPerfil" style="font-size:10px; margin-right:10px"></span></h4>
		<div>
		<h4>Email: <span class="email">'.$result['email'].'</span> <span class="btn btn-info fa fa-pencil pull-left editaEmail" style="font-size:10px; margin-right:10px; display: flex;"></span></h4>
		</div>
		<h4>Contraseña: ******* <span class="btn btn-info fa fa-pencil pull-left editaPassword" style="font-size:10px; margin-right:10px"></span></h4>
		';
		echo $user;
	}
	public function updateUserController($datos)
	{
		$result = $this->model->updateUserModel($datos,"users");
		echo $result;
	}
	public function cargaEmailController($id)
	{
		$respuesta = $this->model->getUserByIdModel($id,"users");
		$user = '<div class="col-xm-12 col-sm-12 col-lg-12">
		       <label for="emailUpdate">Email address</label>
			   <input type="email" id="emailUpdate" class="form-control" placeholder="name@example.com" value="'.$respuesta['email'].'">
		    </div>';
		echo $user;
	}
	public function updateEmailController($id,$email)
	{
		$respuesta = $this->model->updateEmailModel($id,$email,"users");
		echo $respuesta;
	}
	public function updateUserNameController($id,$userName)
	{
		$respuesta = $this->model->updateUserNameModel($id,$userName,"users");
		echo $respuesta;
	}
	public function validaPassController($id,$pass)
	{
		$user = $this->model->getUserByIdModel($id,"users");
		$password = $user['password'];
		$md5 = md5($user['user']);
		$salt = '$2a$07$'.$md5.'$';
		$passEncriptada = crypt($pass,$salt);
		if ($password == $passEncriptada) {
			echo "ok";
		}else{
			echo "error";
		}
	}
	public function updatePassController($id,$pass)
	{	
		$user = $this->model->getUserByIdModel($id,"users");
		$md5 = md5($user['user']);
		$salt = '$2a$07$'.$md5.'$';
		$passEncriptada = crypt($pass,$salt);
		$respuesta = $this->model->updatePassModel($id,$passEncriptada,"users");
		echo $respuesta;
	}
}