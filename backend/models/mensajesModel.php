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
    public function selectMensajesModel($tabla)
    {
		$stmt = $this->conexion->prepare("SELECT mensajeId,nombre,email,mensaje,visto FROM $tabla  ORDER BY fechaRecibido DESC");
		$stmt->execute();
		return $stmt->fetchAll();
		$stmt->close();
    }
    public function leerMensajeModel($id, $tabla)
    {
    	$stmt = $this->conexion->prepare("SELECT mensajeId,nombre,email,mensaje FROM $tabla WHERE mensajeId = :id;");
    	$stmt->bindParam(":id",$id, PDO::PARAM_INT);
		$stmt->execute();
		return $stmt->fetch();
		$stmt->close();
    }
    public function selectEmialsModel($tabla)
    {
    	$stmt = $this->conexion->prepare("SELECT email,nombre FROM $tabla;");
		$stmt->execute();
		return $stmt->fetchAll();
		$stmt->close();
    }
    public function actulizaVistaModel($id, $tabla)
    {
       $stmt = $this->conexion->prepare("UPDATE $tabla SET visto = 1 WHERE mensajeId = :id;");
        $stmt->bindParam(":id",$id, PDO::PARAM_INT);
        $stmt->execute();
    }
    public function mensajesNoVistosModel($tabla)
    {
        $stmt = $this->conexion->prepare("SELECT count(*) as noVistos FROM $tabla where visto = 0;");
        $stmt->execute();
        return $stmt->fetch();
        $stmt->close();
    }
}