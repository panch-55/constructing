<?php

/**
 *
 */
require_once("model.php");
class gestorSlideModel extends model
{

	 private $conexion;

        public function __construct()
        {

            $this->conexion = new model();
            $this->conexion = $this->conexion->connect();
        }

        public function subirImagenSlideModel($ruta,$tabla){
        	$stmt = $this->conexion->prepare("INSERT INTO $tabla(ruta,orden) VALUES (:ruta,0);");

			$stmt->bindParam(":ruta",$ruta, PDO::PARAM_STR);
			if ($stmt->execute()) {
				return "ok";
			}else{
				return "error";
			}

        }
        public function selectImagenSlideModel($ruta,$tabla){
        	$stmt = $this->conexion->prepare("SELECT slideId, ruta,titulo,descripcion FROM $tabla WHERE ruta = :ruta");
        	$stmt->bindParam(":ruta",$ruta, PDO::PARAM_STR);
			$stmt->execute();
			return $stmt->fetch();
			$stmt->close();

        }
        public function selectImagenesModel($tabla){
        	$stmt = $this->conexion->prepare("SELECT slideId, ruta,titulo,descripcion FROM $tabla ORDER by orden ASC;");

			$stmt->execute();
			return $stmt->fetchAll();
			$stmt->close();
        }
        public function deleteImagenesModel($datos,$tabla){
        	$slideId = $datos['slideid'];

        	$stmt = $this->conexion->prepare("DELETE FROM $tabla WHERE slideId = :slideid");
        	$stmt->bindParam(":slideid",$slideId,PDO::PARAM_INT);
        	if ( $stmt->execute()) {
        	 	echo "ok";
        	 }else{
        	 	echo "error";
        	 }
        	 $stmt->close();
        }
        public function updateImagenesModel($datos,$tabla){
        	$slideId = $datos['actualizarId'];
        	$titulo = $datos['tituloEnvio'];
        	$descripcion = $datos['descripcionEnvio'];

        	$stmt = $this->conexion->prepare("UPDATE $tabla SET titulo = :titulo, descripcion = :descripcion WHERE slideId = :slideId");
        	$stmt->bindParam(":slideId",$slideId,PDO::PARAM_INT);
        	$stmt->bindParam(":titulo",$titulo,PDO::PARAM_STR);
        	$stmt->bindParam(":descripcion",$descripcion,PDO::PARAM_STR);
        	if ( $stmt->execute()) {
        	 	echo "ok";
        	 }else{
        	 	echo "error";
        	 }
        	 //$stmt->close();
        }
        public function selectUpdateImagenModel($datos,$tabla)
        {
        	$slideId = $datos['actualizarId'];
        	$stmt = $this->conexion->prepare("SELECT titulo,descripcion FROM $tabla WHERE slideId = :slideId");
        	$stmt->bindParam(":slideId",$slideId,PDO::PARAM_INT);
			$stmt->execute();
			return $stmt->fetch();
			$stmt->close();
        }
        public function updateOrdenSlideModel($datos,$tabla)
        {
        	$stmt = $this->conexion->prepare("UPDATE $tabla SET orden = :orden WHERE slideId = :slideId");
        	$stmt->bindParam(":slideId",$datos['actualizarOrdenId'],PDO::PARAM_INT);
        	$stmt->bindParam(":orden",$datos['actualizarItem'],PDO::PARAM_INT);
			if ($stmt->execute()) {
				echo "ok";
			}else{
				echo "error";
			}

        }
}