<?php
/**
 *
 */
class fechaHoraAjax
{

	public function getHoraSystem()
	{
		date_default_timezone_set("America/Mexico_City");
		setlocale(LC_ALL,"es_ES");
		$dia = date("d");
		$nombreDia = date("l");
		$sufijoAmPm = date("a");
		$hora = date("h");
		$minutos = date("i");
		$segundos = date("s");
		$fechaActual = getdate();

		//echo "$nombreDia, $fechaActual[mday] de $fechaActual[month] de $fechaActual[year] $hora:$minutos:$segundos $sufijoAmPm";
		echo '<div class="text-center">'.$nombreDia.', '.$fechaActual['mday'].' de '.$fechaActual['month'].' de '.$fechaActual['year'].'</div>
		<div class="text-center">'.$hora.':'.$minutos.':'.$segundos.' '.$sufijoAmPm.'</div>';
	}
}
if (isset($_POST['funcionAjax'])){
	$funcion = $_POST['funcionAjax'];
	switch ($funcion) {
		case 'getHoraActual':
			$fecha = new fechaHoraAjax();
			$fecha->getHoraSystem();
			break;

		default:
			# code...
			break;
	}
}

