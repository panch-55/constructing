<?php
/**
 *
 */
class enlacesController
{
	private $enalceModel;
	function __construct()
	{
		//require_once("models/enlacesModel.php");
		$this->enalceModel = new enlacesModel();
	}

	public function enlaces(){

		if (isset($_GET['action'])) {
			$enlaces = $_GET['action'];
		}else{
			$enlaces = "index";
		}

		$respuesta = $this->enalceModel->enlacePaginaModel($enlaces);
		//include("views/modules/nav.php");
		//include("views/modules/cabezote.php");

		include($respuesta);

	}
}