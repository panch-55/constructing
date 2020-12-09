<?php
/**
 *
 */
class articulosController
{
	private $model;
	function __construct()
	{
		$this->model = new articulosModel();
	}
	public function selectArticulosController()
	{
		$respuesta = $this->model->selectArticulosModel("articulos");
		$cuentaArticulos = 1;
		foreach ($respuesta as $key => $value) {
			if ($cuentaArticulos == 1) {
				$pocision = 'cardL1';
			}
			elseif ($cuentaArticulos == 2) {
				$pocision = 'cardR1';
			}
			elseif ($cuentaArticulos == 3) {
				$pocision = 'cardL2';
			}
			elseif ($cuentaArticulos == 4) {
				$pocision = 'cardR2';
			}
			echo '<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
			<div class="card '.$pocision.' articuloCard">
			  <div class="row no-gutters">
			    <div class="col-md-4 boxImg">
			      <img src="backend/'.substr($value['rutaImagen'], 6).'" class="card-img" alt="...">
			    </div>
			    <div class="col-md-8">
			      <div class="card-body">
			        <h5 class="card-title">'.$value['titulo'].'</h5>
			        <p>'.$value['introduccion'].'</p>
			        <div class="row justify-content-end">
			        	<div class="col-6 align-self-end">
			        		<p class="card-text"><button id="'.$value['articuloId'].'" class="btn btn-sm leerMas" data-target="#articuloModal" data-toggle="modal">Leer Mas</button></p>
			        	</div>
			        </div>
			      </div>
			    </div>
			  </div>
			</div>
		</div>';
		$cuentaArticulos = $cuentaArticulos + 1;

		//echo substr($value['ruta'], 4);
		}

	}
	public function getArticuloByIdController($id)
	{
		$respuesta = $this->model->getArticuloByIdModel($id,"articulos");
		$articulo = array('titulo' => $respuesta['titulo'],'ruta'=> substr($respuesta['rutaImagen'],6) , 'contenido'=> $respuesta['contenido']);
		return json_encode($articulo);
		//echo $respuesta;
	}

}