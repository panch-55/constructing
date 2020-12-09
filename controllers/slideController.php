<?php

/**
 *
 */
class slideController
{
	private $model;
	function __construct()
	{
		$this->model = new slideModel();
	}
	public function listaDeSlide()
	{
		$respuesta = $this->model->selectImagenesModel("slide");
		$numSldie = count($respuesta);
			for ($i=0; $numSldie < 6 ; $i++) {
				$setActive = '';
				if ($i == 0) {
					$setActive = 'active';
				}
			echo '<li data-target="#carouselExampleCaptions" data-slide-to="'.$i.'" class="'.$setActive.'"></li>';
		}
	}
	public function selectImagenesSlideController()
	{
		$respuesta = $this->model->selectImagenesModel("slide");
		$numSldie = count($respuesta);
		//echo $numSldie;
		$active = 1;
		foreach ($respuesta as $key => $value) {
			$setActive = '';
			if ($active == 1) {
				$setActive = 'active';
			}

			echo '<div class="carousel-item '.$setActive.' imgnormalizada">
		        <img src="backend/'.substr($value['ruta'], 6).'" class="d-block w-100" alt="pexels">
		        <div class="carousel-caption d-none d-md-block">
		          <h5>'.$value['titulo'].'</h5>
		          <p>'.$value['descripcion'].'</p>
		        </div>
		      </div>';
			/*
			echo '<li>
		        <img src="backend/'.substr($value['ruta'], 6).'">
	           	<div class="slideCaption">
	           		<h3>'.$value['titulo'].'</h3>
			   		<p>'.$value['descripcion'].'</p>
	           	</div>
	           </li>';
           */
           //echo substr($value['ruta'], 4);
	        $active = 0;
		}

	}

}