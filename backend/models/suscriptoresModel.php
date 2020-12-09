<?php
/**
 *
 */
require_once("model.php");
class suscriptoresModel extends model
{
	private $conexion;
    public function __construct()
    {
		$this->conexion = new model();
        $this->conexion = $this->conexion->connect();
    }
    public function selectSuscriptoresModel($tabla)
    {
    	$stmt = $this->conexion->prepare("SELECT mensajeId, nombre, email, fechaRecibido FROM $tabla");
		$stmt->execute();
		return $stmt->fetchAll();
		$stmt->close();
    }
    public function deleteSuscriptroModel($id,$tabla)
    {
    	$stmt = $this->conexion->prepare("DELETE FROM $tabla WHERE mensajeId = :id;");

		$stmt->bindParam(":id",$id, PDO::PARAM_INT);

		if ($stmt->execute()) {
			echo "ok";
		}else{
			echo "error";
		}
    }
}