<?php
/**
 *
 */
class galeriaController
{

	private $model;
	function __construct()
	{
		$this->model = new galeriaModel();
	}
	public function cargaGaleriaController()
	{
		$reslult = $this->model->selectImgGaleriaModel("galeria");
		foreach ($reslult as $key => $value) {
			echo '<figure>
			       <a class="galeriaImg" data-fancybox="gallery" href="backend/'.substr($value['ruta'], 6).'"><img class="img-thumbnail" src="backend/'.substr($value['ruta'], 6).'"></a>
			    </figure>';
		           //echo substr($value['ruta'], 4);
		}
	}
}