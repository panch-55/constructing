<?php
/**
 *
 */

class videosController
{
	private $model;
	function __construct()
	{
		$this->model = new videosModel();
	}
	public function subirVideoController($datos)
	{
		$aleatorio = mt_rand(100,999);
		$rutaVideo = "../../views/videos/video".$aleatorio.".mp4";
		$origen =  $datos['videoTmp'];
		$datos += ["ruta" => $rutaVideo];

		if (@move_uploaded_file($origen,$rutaVideo)) {
			$result = $this->model->saveVideoModel($datos,"videos");
			if ($result != 0) {
				$resultSelect = $this->model->selectVideoByIdModel($result,"videos");
				$liVideo = '<li id="'.$resultSelect['videoId'].'">
			        <span class="fa fa-times eliminarVideo" ruta="'.$resultSelect['ruta'].'"></span>
			            <video controls>
			               <source src="'.substr($resultSelect['ruta'],6).'" type="video/mp4">
			            </video>
			    </li>';
				echo $liVideo;
			}
		}else{
			return false;
		}
	}
	public function selectVideosController()
	{
		$result = $this->model->selectVideosModel("videos");
		foreach ($result as $key => $value) {
			echo  '<li id="'.$value['videoId'].'" class="bloqueVideo">
			        <span class="fa fa-times eliminarVideo"  ruta="'.$value['ruta'].'"></span>
			            <video controls class="handleVideo">
			               <source src="'.substr($value['ruta'],6).'" type="video/mp4">
			            </video>
			    </li>';
		}
	}
	public function deleteVideoController($datos)
	{
		$id = $datos['id'];
		$result = $this->model->deleteVideoByIdModel($id, "videos");
		if ($result) {
			unlink($datos['ruta']);
			echo 'ok';
		}else{
			echo 'error';
		}
	}
	public function updateOrdenController($datos)
	{
		$resutl = $this->model->updateOrdenModel($datos,"videos");
		echo $result;
	}
}