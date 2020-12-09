<?php
/**
 *
 */
class enlacesModel
{

	function __construct()
	{
		# code...
	}

	public function enlacePaginaModel($enlace){

		if ($enlace == "inicio" OR $enlace == "slide"
			OR $enlace == "articulos" OR $enlace == "galeria"
			OR $enlace == "videos" OR $enlace == "mensajes"
			OR $enlace == "suscriptores" OR $enlace == "perfil"
			OR $enlace == "salir"){

			$module = "views/modules/".$enlace.".php";
		}
		else if ($enlace == "nuevoLogin") {
			$module = "views/modules/newLogin.php";
		}
		else if ($enlace == "index") {
			$module = "views/modules/login.php";
		}
		else if ($enlace == "ingreso") {
			$module = "views/modules/login.php";
		}
		else{
			$module = "views/modules/login.php";
		}

		return $module;
	}
}