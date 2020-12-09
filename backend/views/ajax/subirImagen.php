<?php
/**
 *
 */
if (isset($_FILES['userImgFile'])) {
	require_once("../../models/usersModel.php");

	$userId = $_POST['userId'];
	$img = $_FILES['userImgFile']['tmp_name'];
	$aleatorio = mt_rand(10,999);
	$rutaImg = "../../views/images/usuarios/user".$aleatorio.".jpg";
	$origen =  $img;
	$datos = array();
	$datos = ["userId" => $userId,"ruta" => $rutaImg];

	if (@move_uploaded_file($origen,$rutaImg)) {
		$model = new usersModel();
		$model->updateImgUserModel($datos,"users");
		$respuesta = array('mensaje' => "se subio la foto",'userId'=>$userId);
		echo json_encode($respuesta);
	}
	else{
		return ['error' => "Error"];
	}
}