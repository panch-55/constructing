<?php
/**
 *
 */
class suscriptoresController
{
	private $model;
	function __construct()
	{
		$this->model = new suscriptoresModel();
	}
	public function selectSuscriptoresController()
	{
		$result = $this->model->selectSuscriptoresModel("mensajes");
		foreach ($result as $key) {
			echo $tabla = '<tr>
			        <td>'.$key['nombre'].'</td>
			        <td>'.$key['email'].'</td>
			        <td>'.$key['fechaRecibido'].'</td>
			        <td id="'.$key['mensajeId'].'"><span id="quitarSuscriptor" class="btn btn-danger fa fa-times quitarSuscriptor"></span></td>
			    	</tr>';
		}
		// $tabla;
	}
	public function deleteSuscriptroController($id)
	{
		$respuesta = $this->model->deleteSuscriptroModel($id,"mensajes");
		echo $respuesta;
	}
}