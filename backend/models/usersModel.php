<?php
/**
 *
 */
require_once("model.php");
class usersModel extends model
{
	private $conexion;
    public function __construct()
    {
		$this->conexion = new model();
        $this->conexion = $this->conexion->connect();
    }

    public function getUsersModel($tabla)
    {
    	$stmt = $this->conexion->prepare("SELECT userId,userName,email,photo FROM $tabla");
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt->close();
    }
    public function getUserByIdModel($id,$tabla)
    {
       $stmt = $this->conexion->prepare("SELECT userId,userName,email,photo,password FROM $tabla WHERE userId = :id");
        $stmt->bindParam(":id",$id,PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();
        $stmt->close();
    }
    public function updateUserModel($datosModel,$tabla)
    {
        $stmt = $this->conexion->prepare("UPDATE $tabla SET userName = :userName,email = :email, rollId = :perfilId WHERE userId = :userId");

        $stmt->bindParam(":userId", $datosModel["userId"], PDO::PARAM_INT);
        $stmt->bindParam(":userName", $datosModel["userName"], PDO::PARAM_STR);
        $stmt->bindParam(":email", $datosModel["email"], PDO::PARAM_STR);
        $stmt->bindParam(":perfilId", $datosModel["perfilId"], PDO::PARAM_INT);

        if ($stmt->execute()) {
            return "ok";
        }else{
            return "error";
        }

        $stmt->close();
    }
    public function updateEmailModel($id,$email,$tabla)
    {
        $stmt = $this->conexion->prepare("UPDATE $tabla SET email = :email WHERE userId = :userId");

        $stmt->bindParam(":userId", $id, PDO::PARAM_INT);
        $stmt->bindParam(":email", $email, PDO::PARAM_STR);

        if ($stmt->execute()) {
            return "ok";
        }else{
            return "error";
        }

        $stmt->close();
    }
    public function updateUserNameModel($id,$userName,$tabla)
    {
        $stmt = $this->conexion->prepare("UPDATE $tabla SET userName = :userName WHERE userId = :userId");

        $stmt->bindParam(":userId", $id, PDO::PARAM_INT);
        $stmt->bindParam(":userName", $userName, PDO::PARAM_STR);

        if ($stmt->execute()) {
            return "ok";
        }else{
            return "error";
        }

        $stmt->close();
    }
    public function updatePassModel($id,$pass,$tabla)
    {
         $stmt = $this->conexion->prepare("UPDATE $tabla SET password = :pass WHERE userId = :userId");

        $stmt->bindParam(":userId", $id, PDO::PARAM_INT);
        $stmt->bindParam(":pass", $pass, PDO::PARAM_STR);

        if ($stmt->execute()) {
            return "ok";
        }else{
            return "error";
        }

        $stmt->close();
    }
    public function updateImgUserModel($datos,$tabla)
    {
        $id = $datos['userId'];
        $ruta = $datos['ruta'];
        $stmt = $this->conexion->prepare("UPDATE $tabla SET photo = :ruta WHERE userId = :userId");

        $stmt->bindParam(":userId", $id, PDO::PARAM_INT);
        $stmt->bindParam(":ruta", $ruta, PDO::PARAM_STR);

        if ($stmt->execute()) {
            return "ok";
        }else{
            return "error";
        }

        $stmt->close();
    }
}