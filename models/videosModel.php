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
       	public function selectVideosModel($tabla)
       	{
       		$stmt = $this->conexion->prepare("SELECT videoId,ruta,orden FROM $tabla ORDER BY orden ASC");
			$stmt->execute();
			return $stmt->fetchAll();
			$stmt->close();
       	}
}