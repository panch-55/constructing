<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>BackEnd</title>

	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="icon" href="views/images/icono.jpg">


	<link rel="stylesheet" href="//malihu.github.io/custom-scrollbar/jquery.mCustomScrollbar.min.css">

    <link rel="stylesheet" href="views/assets/css/custom.css">
    <link rel="stylesheet" href="views/assets/css/custom-themes.css">
    <link rel="shortcut icon" type="image/png" href="views/assets/img/favicon.png" />

     <!--<script src="//malihu.github.io/custom-scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
	-->

	<link rel="stylesheet" href="views/css/bootstrap.min.css">

	<link href="views/fileinput/css/fileinput.min.css" media="all" rel="stylesheet" type="text/css"/>

	<link rel="stylesheet" href="views/css/font-awesome.min.css">
	<link rel="stylesheet" href="views/css/style.css">
	<link rel="stylesheet" href="views/css/fonts.css">

	<link rel="stylesheet" href="views/css/jquery-ui.min.css">
	<link rel="stylesheet" href="views/css/sweetalert.css">
	<link rel="stylesheet" href="views/css/cssFancybox/jquery.fancybox.css">

	<link rel="stylesheet" type="text/css" href="views/DataTables/datatables.min.css"/>
	<link rel="stylesheet" type="text/css" href="views/DataTables/DataTables-1.10.22/css/jquery.dataTables.min.css"/>
	<link rel="stylesheet" type="text/css" href="views/DataTables/Responsive-2.2.6/css/responsive.dataTables.min.css"/>




	<script src="views/js/jquery-3.5.1.js"></script>
	<script src="views/js/bootstrap.min.js"></script>
	<script src="views/js/jquery.fancybox.js"></script>

	<script src="views/js/jquery-ui.min.js"></script>
	<script src="views/js/sweetalert.min.js"></script>
	<script src="views/DataTables/DataTables-1.10.22/js/jquery.dataTables.min.js"></script>
	<script src="views/DataTables/DataTables-1.10.22/js/dataTables.bootstrap.min.js"></script>
	<script src="views/DataTables/Responsive-2.2.6/js/dataTables.responsive.min.js"></script>

	<script src="views/fileinput/js/fileinput.min.js"></script>
	<!-- following theme script is needed to use the Font Awesome 5.x theme (`fas`) -->
	<script src="views/fileinput/themes/fas/theme.min.js"></script -->
	<!-- optionally if you need translation for your language then include the locale file as mentioned below (replace LANG.js with your language locale) -->
	<script src="views/fileinput/js/locales/LANG.js"></script>

</head>

<body>

	<div class="container-fluid">

		<section class="row">

		<!--=====================================
		COLUMNA CONTENIDO
		======================================-->

		<?php

			require_once("controllers/enlacesController.php");

			$modulo = new enlacesController();

			$modulo->enlaces();

		 ?>

		<!--====  Fin de COLUMNA CONTENIDO  ====-->

		</section>

	</div>
	<script src="views/assets/js/custom.js"></script>
	<script src="views/js/script.js"></script>
	<script src="views/js/validarIngreso.js"></script>
	<script src="views/js/gestorSlide.js"></script>
	<script src="views/js/gestorGaleria.js"></script>
	<script src="views/js/articulos.js"></script>
	<script src="views/js/videos.js"></script>
	<script src="views/js/suscriptores.js"></script>
	<script src="views/js/mensajes.js"></script>
	<script src="views/js/newLogin.js"></script>
	<script src="views/js/getHora.js"></script>

</body>

</html>