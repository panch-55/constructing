<?php

/**
 *
 */
class gestorSlideController
{
	private $model;
	function __construct()
	{
		$this->model = new gestorSlideModel();
	}


	public function mostrarImagenController($datos){

		//echo var_dump(getimagesize($datos['imagenTmp']));
		list($ancho,$alto) = getimagesize($datos['imagenTmp']);

		if ($ancho < 1600 OR $alto < 600) {
			echo 0;
		}
		else{

			$aleatorio = mt_rand(100,999);
			$ruta = "../../views/images/slide/slide".$aleatorio.".jpg";
			$origen =  $datos['imagenTmp'];
			if ($ancho > 1800 OR $alto > 800) {

				$thumb = imagecreatetruecolor(1600,600);
				$origenT = imagecreatefromjpeg($datos['imagenTmp']);
				imagecopyresampled($thumb, $origenT, 0, 0, 0, 0, 1600, 600, $ancho, $alto);
				//@move_uploaded_file($thumb,$ruta);
				//imagejpeg($thumb, null, 100);
				imagejpeg($thumb,$ruta);

				//echo json_encode($ruta);
				//imagedestroy($thumb);
				//echo $ruta;
				$this->model->subirImagenSlideModel($ruta,"slide");
				$respuesta = $this->model->selectImagenSlideModel($ruta,"slide");
				echo json_encode($respuesta);
			}else{
				@move_uploaded_file($origen,$ruta);
				$this->model->subirImagenSlideModel($ruta,"slide");
				$respuesta = $this->model->selectImagenSlideModel($ruta,"slide");
				echo json_encode($respuesta);
			}
				/*if (@move_uploaded_file($origen,$ruta)) {

				}else{
					echo 0;
				}*/
		}
	}

	public function mostrarImagensController(){
		$respuesta = $this->model->selectImagenesModel("slide");
		foreach ($respuesta as $key => $value) {
			echo '<li id="'.$value['slideId'].'" class="bloqueSlide">
					<span class="fa fa-times eliminarSlide" ruta="'.$value['ruta'].'"></span>
					<img src="'.substr($value['ruta'], 6) .'" class="handleImg">
				</li>';
		}
	}
	public function editorSlideController(){
		$respuesta = $this->model->selectImagenesModel("slide");
		foreach ($respuesta as $key => $value) {

			echo '<li id="item'.$value["slideId"].'">
			<span class="fa fa-pencil editarSlide" style="background:blue"></span>
			<img src="'.substr($value['ruta'], 6).'" style="float:left; margin-bottom:10px" width="80%">
			<h1>'.$value['titulo'].'</h1>
			<p>'. $value['descripcion'].'</p>
		</li>';
		}
	}
	public function eliminarImagenController($datos){
		$respuesta = $this->model->deleteImagenesModel($datos,"slide");
		unlink($datos['rutaSlide']);

	}
	public function actualizarImagenController($datos){
		$this->model->updateImagenesModel($datos,"slide");
	}
	public function selectUpdateImagenController($datos)
	{
		$respuesta = $this->model->selectUpdateImagenModel($datos,"slide");
		$dato = array('titulo' => $respuesta['titulo']
					,'descripcion' => $respuesta['descripcion']);
		return json_encode($dato);
	}
	public function updateOdenSlideController($datos)
	{
		$respuesta = $this->model->updateOrdenSlideModel($datos,"slide");
		echo $respuesta;

	}
	public function saveImgsSlideController($images)
	{

		//Como el elemento es un arreglos utilizamos foreach para extraer todos los valores
		foreach($images['tmp_name'] as $key => $tmp_name)
		{
			//echo var_dump(getimagesize($datos['imagenTmp']));
		list($ancho,$alto) = getimagesize($images['imagenTmp']);

		if ($ancho < 1600 OR $alto < 600) {
			echo 0;
		}
		else{

			$aleatorio = mt_rand(100,999);
			$ruta = "../../views/images/slide/slide".$aleatorio.".jpg";
			$origen =  $images['imagenTmp'];
			if ($ancho > 1800 OR $alto > 800) {

				$thumb = imagecreatetruecolor(1600,600);
				$origenT = imagecreatefromjpeg($images['imagenTmp']);
				imagecopyresampled($thumb, $origenT, 0, 0, 0, 0, 1600, 600, $ancho, $alto);
				//@move_uploaded_file($thumb,$ruta);
				//imagejpeg($thumb, null, 100);
				imagejpeg($thumb,$ruta);

				//echo json_encode($ruta);
				//imagedestroy($thumb);
				//echo $ruta;
				$this->model->subirImagenSlideModel($ruta,"slide");
				$respuesta = $this->model->selectImagenSlideModel($ruta,"slide");
				echo json_encode($respuesta);
			}else{
				@move_uploaded_file($origen,$ruta);
				$this->model->subirImagenSlideModel($ruta,"slide");
				$respuesta = $this->model->selectImagenSlideModel($ruta,"slide");
				echo json_encode($respuesta);
			}
				/*if (@move_uploaded_file($origen,$ruta)) {

				}else{
					echo 0;
				}*/
		}
		}
	}
}