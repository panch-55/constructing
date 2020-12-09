<?php

/**
 *
 */
require_once("model.php");
class slideModel extends model
{
	private $conexion;

        public function __construct()
        {

            $this->conexion = new model();
            $this->conexion = $this->conexion->connect();
        }
	 public function selectImagenesModel($tabla){
        	$stmt = $this->conexion->prepare("SELECT slideId, ruta,titulo,descripcion FROM $tabla ORDER by orden ASC;");

			$stmt->execute();
			return $stmt->fetchAll();
			$stmt->close();
        }
}


