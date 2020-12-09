<?php
/**
 *
 */
require_once("model.php");
class gestorGaleriaModel extends model
{

	private $conexion;

        public function __construct()
        {

            $this->conexion = new model();
            $this->conexion = $this->conexion->connect();
        }

        public function subirImagenGaleriaModel($ruta,$tabla){
        	$stmt = $this->conexion->prepare("INSERT INTO $tabla(ruta) VALUES (:ruta);");

			$stmt->bindParam(":ruta",$ruta, PDO::PARAM_STR);
			if ($stmt->execute()) {
				return "ok";
			}else{
				return "error";
			}

        }
        public function selectImagenGaleriaModel($ruta,$tabla){
        	$stmt = $this->conexion->prepare("SELECT imagenId, ruta FROM $tabla WHERE ruta = :ruta");
        	$stmt->bindParam(":ruta",$ruta, PDO::PARAM_STR);
			$stmt->execute();
			return $stmt->fetch();
			$stmt->close();

        }
        public function selectGaleriaImagenesModel($tabla){
        	$stmt = $this->conexion->prepare("SELECT imagenId,ruta FROM $tabla ORDER by orden ASC;");

			$stmt->execute();
			return $stmt->fetchAll();
			$stmt->close();
        }
        public function deleteGaleriaImagenesModel($datos,$tabla)
        {
        	$imagenId = $datos['imagenId'];

        	$stmt = $this->conexion->prepare("DELETE FROM $tabla WHERE imagenId = :imagenId;");
        	$stmt->bindParam(":imagenId",$imagenId, PDO::PARAM_INT);
			//$stmt->bindParam(":ruta",$ruta, PDO::PARAM_STR);
			if ($stmt->execute()) {
				return "ok";
			}else{
				return "error";
			}
        }
        public function updateOrdenGaleriaModel($datos,$tabla)
        {
            $stmt = $this->conexion->prepare("UPDATE $tabla SET orden = :orden WHERE imagenId = :imganeId");
            $stmt->bindParam(":imganeId",$datos['actualizarOrdenId'],PDO::PARAM_INT);
            $stmt->bindParam(":orden",$datos['actualizarItem'],PDO::PARAM_INT);
            if ($stmt->execute()) {
                echo "ok";
            }else{
                echo "error";
            }

        }
}