<?php
/**
 *
 */
require_once("model.php");
class mensajesModel extends model
{
	private $conexion;

    public function __construct()
    {

        $this->conexion = new model();
        $this->conexion = $this->conexion->connect();
    }
    public function saveMensajeModel($datos,$tabla)
    {
    	$stmt = $this->conexion->prepare("INSERT INTO $tabla(nombre,email,mensaje,fechaRecibido,visto) VALUES (:nombre,:email,:mensaje,now(),0);");
    	$stmt->bindParam(":nombre", $datos['nombre'], PDO::PARAM_STR);
    	$stmt->bindParam(":email", $datos['email'], PDO::PARAM_STR);
    	$stmt->bindParam(":mensaje", $datos['mensaje'], PDO::PARAM_STR);
		if ($stmt->execute()) {
			echo "ok";
		}else{
			echo "error";
		}
    }
}