<?php

/**
 *
 */
require_once("model.php");
class ingresosModel extends model
{

	 private $conexion;

        public function __construct()
        {

            $this->conexion = new model();
            $this->conexion = $this->conexion->connect();
        }

        public function ingresoUsuarioModel($datosModel, $tabla){
		$stmt = $this->conexion->prepare("SELECT userId, userName, password,intentos, rollId FROM $tabla WHERE userName = :userName");

		$stmt->bindParam(":userName", $datosModel["user"], PDO::PARAM_STR);
		$stmt->execute();

		return $stmt->fetch();

		$stmt->close();

	}

	public function actualizaIntentos($datosModel,$tabla){
		$stmt = $this->conexion->prepare("UPDATE $tabla SET intentos = :intentos WHERE userName = :userName");

		$stmt->bindParam(":userName", $datosModel["user"], PDO::PARAM_STR);
		$stmt->bindParam(":intentos", $datosModel["intentos"], PDO::PARAM_INT);
		if ($stmt->execute()) {
			return "ok";
		}else{
			return "error";
		}

		$stmt->close();

	}
	public function saveNewUserModel($datos, $tabla)
	{
		$userName = $datos['userName'];
    	$email = $datos['email'];
    	$pass = $datos['pass'];
        $ruta = $datos['ruta'];

    	$stmt = $this->conexion->prepare("INSERT INTO $tabla(userName,email,password,photo,rollId,intentos) VALUES (:userName,:email,:pass,:ruta,1,0);");

		$stmt->bindParam(":userName",$userName, PDO::PARAM_STR);
		$stmt->bindParam(":email",$email, PDO::PARAM_STR);
		$stmt->bindParam(":pass",$pass, PDO::PARAM_STR);
        $stmt->bindParam(":ruta",$ruta, PDO::PARAM_STR);
		if ($stmt->execute()) {
            $lastId = $this->conexion->lastInsertId();
            //$returnData = array("lastId"=>$lastId);
            return $lastId;
		}else{
			return "error";
		}
	}
	public function selectUsuarioModel($id,$tabla)
	{
		$stmt = $this->conexion->prepare("SELECT userId, userName,email,photo,rollId FROM $tabla WHERE userId = :id");

		$stmt->bindParam(":id", $id, PDO::PARAM_INT);
		$stmt->execute();

		return $stmt->fetch();

		$stmt->close();
	}

}