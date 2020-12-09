<?php

/**
 *
 */
require_once("model.php");
class galeriaModel extends model
{

	private $conexion;

        public function __construct()
        {

            $this->conexion = new model();
            $this->conexion = $this->conexion->connect();
        }
        public function selectImgGaleriaModel($tabla)
        {
        	$stmt = $this->conexion->prepare("SELECT imagenId, ruta FROM $tabla ORDER by orden ASC;");

			$stmt->execute();
			return $stmt->fetchAll();
			$stmt->close();
        }
}