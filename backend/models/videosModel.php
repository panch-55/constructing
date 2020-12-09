<?php
/**
 *
 */
require_once("model.php");
class videosModel extends model
{
	private $conexion;
    public function __construct()
    {
		$this->conexion = new model();
        $this->conexion = $this->conexion->connect();
    }
    public function saveVideoModel($datos,$tabla)
    {
    	$ruta = $datos['ruta'];
    	$stmt = $this->conexion->prepare("INSERT INTO $tabla(ruta,orden) VALUES (:ruta,0);");

		$stmt->bindParam(":ruta",$ruta, PDO::PARAM_STR);
		if ($stmt->execute()) {
            $lastId = $this->conexion->lastInsertId();
            //$returnData = array("lastId"=>$lastId);
            return $lastId;
		}else{
			return "error";
		}
    }
    public function selectVideosModel($tabla)
    {
    	$stmt = $this->conexion->prepare("SELECT videoId,ruta,orden FROM $tabla ORDER BY orden ASC");
		$stmt->execute();
		return $stmt->fetchAll();
		$stmt->close();
    }
    public function selectVideoByIdModel($id,$tabla)
    {
    	$stmt = $this->conexion->prepare("SELECT videoId,ruta,orden FROM $tabla WHERE videoId = :id;");

		$stmt->bindParam(":id",$id, PDO::PARAM_INT);
		$stmt->execute();
		return $stmt->fetch();
		$stmt->close();
    }
    public function deleteVideoByIdModel($id,$tabla)
    {
    	$stmt = $this->conexion->prepare("DELETE FROM $tabla WHERE videoId = :id;");

		$stmt->bindParam(":id",$id, PDO::PARAM_INT);
		if ($stmt->execute()) {
            return true;
		}else{
			return false;
		}
    }
    public function updateOrdenModel($datos,$tabla)
    {
    	$id = $datos['videoId'];
    	$orden = $datos['orden'];
    	$stmt = $this->conexion->prepare("UPDATE $tabla SET orden = :orden WHERE videoId = :id;");

		$stmt->bindParam(":id",$id, PDO::PARAM_INT);
		$stmt->bindParam(":orden",$orden, PDO::PARAM_INT);
		if ($stmt->execute()) {
            return true;
		}else{
			return false;
		}
    }
}