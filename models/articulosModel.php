<?php
/**
 *
 */
require_once("model.php");
class articulosModel extends model
{

	private $conexion;

        public function __construct()
        {

            $this->conexion = new model();
            $this->conexion = $this->conexion->connect();
        }
        public function selectArticulosModel($tabla)
        {
        	$stmt = $this->conexion->prepare("SELECT articuloId, titulo,introduccion,rutaImagen,contenido FROM $tabla;");

			$stmt->execute();
			return $stmt->fetchAll();
			$stmt->close();
        }
        public function getArticuloByIdModel($id,$tabla)
        {
            $stmt = $this->conexion->prepare("SELECT articuloId, titulo,introduccion,rutaImagen,contenido FROM $tabla WHERE articuloId = 
            :id;");

            $stmt->bindParam(":id",$id, PDO::PARAM_INT);
			$stmt->execute();
			return $stmt->fetch();
			$stmt->close();
        }
}