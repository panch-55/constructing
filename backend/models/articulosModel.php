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
    public function guardaArticuloModel($datos,$tabla)
    {
    	$titulo = $datos['titulo'];
    	$intro = $datos['intro'];
    	$contenido = $datos['contenido'];
        $ruta = $datos['ruta'];

    	$stmt = $this->conexion->prepare("INSERT INTO $tabla(titulo,introduccion,contenido,rutaImagen) VALUES (:titulo,:introduccion,:contenido,:ruta);");

		$stmt->bindParam(":titulo",$titulo, PDO::PARAM_STR);
		$stmt->bindParam(":introduccion",$intro, PDO::PARAM_STR);
		$stmt->bindParam(":contenido",$contenido, PDO::PARAM_STR);
        $stmt->bindParam(":ruta",$ruta, PDO::PARAM_STR);
		if ($stmt->execute()) {
            $lastId = $this->conexion->lastInsertId();
            //$returnData = array("lastId"=>$lastId);
            return $lastId;
		}else{
			return "error";
		}
    }
    public function selecionaArticulosModel($tabla)
    {
    	$stmt = $this->conexion->prepare("SELECT articuloId,titulo,introduccion,contenido,rutaImagen FROM $tabla ORDER BY orden ASC");
			$stmt->execute();
			return $stmt->fetchAll();
			$stmt->close();
    }
    public function selectArticuloModel($id,$tabla)
    {
        $stmt = $this->conexion->prepare("SELECT articuloId,titulo,introduccion,contenido,rutaImagen FROM $tabla WHERE articuloId = :id");
        $stmt->bindParam(":id",$id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();
        $stmt->close();
    }
    public function updateArticuloSinImagenloModel($datos,$tabla)
    {
        $id = $datos['id'];
        $titulo = $datos['titulo'];
        $intro = $datos['intro'];
        $contenido = $datos['contenido'];
        //$ruta = $datos['ruta'];

        $stmt = $this->conexion->prepare("UPDATE $tabla SET titulo = :titulo ,introduccion = :introduccion, contenido = :contenido WHERE articuloId = :id;");

        $stmt->bindParam(":id",$id, PDO::PARAM_INT);
        $stmt->bindParam(":titulo",$titulo, PDO::PARAM_STR);
        $stmt->bindParam(":introduccion",$intro, PDO::PARAM_STR);
        $stmt->bindParam(":contenido",$contenido, PDO::PARAM_STR);
        //$stmt->bindParam(":ruta",$ruta, PDO::PARAM_STR);
        if ($stmt->execute()) {
            return "ok";
        }else{
            return "error";
        }
    }
    public function updateArticuloConImagenModel($datos,$tabla)
    {
        $id = $datos['id'];
        $titulo = $datos['titulo'];
        $intro = $datos['intro'];
        $contenido = $datos['contenido'];
        $ruta = $datos['ruta'];

        $stmt = $this->conexion->prepare("UPDATE $tabla SET titulo = :titulo ,introduccion = :introduccion, contenido = :contenido, rutaImagen = :ruta WHERE articuloId = :id;");

        $stmt->bindParam(":id",$id, PDO::PARAM_INT);
        $stmt->bindParam(":titulo",$titulo, PDO::PARAM_STR);
        $stmt->bindParam(":introduccion",$intro, PDO::PARAM_STR);
        $stmt->bindParam(":contenido",$contenido, PDO::PARAM_STR);
        $stmt->bindParam(":ruta",$ruta, PDO::PARAM_STR);
        if ($stmt->execute()) {
            return "ok";
        }else{
            return "error";
        }
    }
    public function deleteArticuloModel($datos,$tabla)
    {
        $id = $datos['id'];
        $stmt = $this->conexion->prepare("DELETE FROM $tabla WHERE articuloId = :id;");

        $stmt->bindParam(":id",$id, PDO::PARAM_INT);
         if ($stmt->execute()) {
            return "ok";
        }else{
            return "error";
        }
    }
    public function UpdateOrdenModel($datos,$tabla)
    {
        $id = $datos['articuloId'];
        $orden = $datos['orden'];
        $stmt = $this->conexion->prepare("UPDATE $tabla SET orden = :orden WHERE articuloId = :id;");

        $stmt->bindParam(":id",$id, PDO::PARAM_INT);
        $stmt->bindParam(":orden",$orden, PDO::PARAM_INT);
         if ($stmt->execute()) {
            return "ok";
        }else{
            return "error";
        }
    }
}