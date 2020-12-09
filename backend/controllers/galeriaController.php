<?php
/**
 *
 */
/**
 *
 */
class galeriaController
{
	private $model;
	function __construct()
	{
		$this->model = new gestorGaleriaModel();
	}
	public function mostrarImagenGaleriaController($datos){
		//echo var_dump(getimagesize($datos['imagenTmp']));
		list($ancho,$alto) = getimagesize($datos['imagenTmp']);

		if ($ancho < 1500 OR $alto < 500) {
			echo 0;
		}
		else{

			$aleatorio = mt_rand(100,999);
			$ruta = "../../views/images/galeria/imagen".$aleatorio.".jpg";
			$origen =  $datos['imagenTmp'];
			if ($ancho > 1700 OR $alto > 700) {
				$thumb = imagecreatetruecolor(1600,600);
				$origenT = imagecreatefromjpeg($datos['imagenTmp']);
				imagecopyresampled($thumb, $origenT, 0, 0, 0, 0, 1600, 600, $ancho, $alto);
			}

			if (@move_uploaded_file($origen,$ruta)) {
				$this->model->subirImagenGaleriaModel($ruta,"galeria");
				$respuesta = $this->model->selectImagenGaleriaModel($ruta,"galeria");
				//echo $respuesta;
				return json_encode($respuesta);
			}else{
				echo 1;
			}
		}
	}
	public function selectGaleriaImagenesController()
	{
		$respuesta = $this->model->selectGaleriaImagenesModel("galeria");
		foreach ($respuesta as $key => $value) {
			echo '<li id="'.$value['imagenId'].'" class="bloqueSlide">
				<span ruta="'.$value['ruta'].'" class="fa fa-times eliminarImagen"></span>
				<a class="disabled" rel="grupo" href="'.substr($value['ruta'], 6) .'">
					<img src="'.substr($value['ruta'], 6) .'" class="handleImg">
				</a>
			</li>';
		}
	}public function selectGaleriaImagenesOrdenar()
	{
		$respuesta = $this->model->selectGaleriaImagenesModel("galeria");
		foreach ($respuesta as $key => $value) {
			echo '<li id="'.$value['imagenId'].'" class="bloqueSlide">
				<span ruta="'.$value['ruta'].'" class="fa fa-times eliminarImagen"></span>
					<img src="'.substr($value['ruta'], 6) .'" class="handleImg">
			</li>';
		}
	}
	public function deleteImagenGaleriaController($datos)
	{
		$respuesta = $this->model->deleteGaleriaImagenesModel($datos,"galeria");
		unlink($datos['ruta']);
		echo $respuesta;
	}
	public function updateOdenGaleriaController($datos)
	{
		$respuesta = $this->model->updateOrdenGaleriaModel($datos,"galeria");
		echo $respuesta;

	}
}