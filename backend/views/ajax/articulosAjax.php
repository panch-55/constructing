<?php
/**
 * +
 */
require_once("../../controllers/articulosController.php");
require_once("../../models/articulosModel.php");
class articulosAjax
{
	public $articuloId;
	public $titulo;
	public $introArticulo;
	public $imagenTmp;
	public $imagen;
	public $contenido;
	public $oldRuta;
	public $orden;
	public function subirImagenTemp()
	{
		$datos = $this->imagenTmp;
		//echo $datos;
		$articuloController = new articulosController();
		$result = $articuloController->subirImagenTmpController($datos);
		echo $result;
	}
	public function guardaArticulo()
	{
		//echo $this->imagen;
		$datosArticulo = array('titulo'=>$this->titulo,
					   'intro'=>$this->introArticulo,
					   'contenido'=>$this->contenido,
					   'imagen'=>$this->imagen);
		$guardaArticuloController = new articulosController();
		$resultado = $guardaArticuloController->guardaArticuloController($datosArticulo);
		echo ($resultado);
	}
	public function selectUpdateArticulo()
	{
		$editarController = new articulosController();
		$resultado = $editarController->selectArticuloEdicionController($this->articuloId);
		echo $resultado;
	}
	public function updateArticulo()
	{
		$datos = array('id' => $this->articuloId,'titulo' => $this->titulo,
					'intro' => $this->introArticulo,'contenido'=> $this->contenido,
					'imagen' => $this->imagen,'oldRuta'=>$this->oldRuta);
		$updateArticulo = new articulosController();
		$resultado = $updateArticulo->updateArticuloController($datos);
		return json_encode($resultado);
	}
	public function eliminarArticulo()
	{
		$datos = array('id' => $this->articuloId,'oldRuta'=>$this->oldRuta);
		$updateArticulo = new articulosController();
		$resultado = $updateArticulo->deleteArticuloController($datos);
		echo $resultado;
	}
	public function leerMas()
	{
		$id = $this->articuloId;
		$selectArticulo = new articulosController();
		$resultado = $selectArticulo->selectArticuloLeerMasController($id);
		echo $resultado;
	}
	public function mostrarArticulosOrdenar()
	{
		$articulosOrdenar = new articulosController();
		$resultado = $articulosOrdenar->mostrarArticulosOrdenarController();
		echo $resultado;
	}
	public function updateOrden()
	{
		$datos = array('articuloId' => $this->articuloId ,'orden'=>$this->orden);
		$Ordenar = new articulosController();
		$resultado = $Ordenar->updateOrdenController($datos);
		echo $resultado;
	}
}
if (isset($_FILES["imagen"]["tmp_name"])) {
	$articulo = new articulosAjax();
	$articulo->imagenTmp = $_FILES["imagen"]["tmp_name"];
	$articulo->subirImagenTemp();
}
if (isset($_POST["titulo"])) {
	$articulo = new articulosAjax();
	$articulo->titulo = $_POST['titulo'];
	$articulo->introArticulo = $_POST['intro'];
	$articulo->contenido = $_POST['contenido'];
	$articulo->imagen = $_FILES["file"]["tmp_name"];
	$articulo->guardaArticulo();
}
if (isset($_POST['funcion'])) {
	$funcion = $_POST['funcion'];
	switch ($funcion) {
		case 'selectUpdateArticulo':
			$editar = new articulosAjax();
			$editar->articuloId = $_POST['articuloId'];
			$editar->selectUpdateArticulo();
			# code...
			break;
		case 'saveUpdateArticulo':
			$articulo = new articulosAjax();
			$articulo->articuloId = $_POST['articuloId'];
			$articulo->titulo = $_POST['tituloEdit'];
			$articulo->introArticulo = $_POST['introEdit'];
			$articulo->contenido = $_POST['contenidoEdit'];
			$articulo->oldRuta = $_POST['oldRuta'];
			if (isset($_POST['file'])) {
			$articulo->imagen = "";
			}
			if (isset($_FILES["file"]["tmp_name"])) {
				$articulo->imagen = $_FILES["file"]["tmp_name"];
			}
			$articulo->updateArticulo();
			break;
		case 'eliminarArticulo':
			$eliminar = new articulosAjax();
			$eliminar->articuloId = $_POST['articuloId'];
			$eliminar->oldRuta = $_POST['rutaImg'];
			$eliminar->eliminarArticulo();
			break;
		case 'leerMas':
			$leerMas = new articulosAjax();
			$leerMas->articuloId = $_POST['idArticulo'];
			$leerMas->leerMas();
			break;
		case 'selectOrdenarArticulos':
			$ordenar = new articulosAjax();
			$ordenar->mostrarArticulosOrdenar();
			break;
		case 'actualizarOrden':
			$updatOrden = new articulosAjax();
			$updatOrden->articuloId = $_POST['actualizarOrdenId'];
			$updatOrden->orden = $_POST['actualizarOrdenItem'];
			$updatOrden->updateOrden();
			break;
		default:
			# code...
			break;
	}
}
