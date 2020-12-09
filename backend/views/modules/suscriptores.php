<?php

session_start();
if (!$_SESSION['validar']) {
	header("location:ingreso");
	exit();
}

include "views/modules/nav.php";
include "views/modules/cabezote.php";

?>

<!--=====================================
SUSCRIPTORES
======================================-->
<div class="container">
<div class="row justify-content-center">
<div id="suscriptores" class="col-lg-12 col-md-12 col-sm-12 align-self-center">

		<table id="tablaSuscriptores" class="table table-sm table-striped dt-responsive nowrap">

			<thead>
			    <tr>
			        <th>Suscriptor</th>
			        <th>Email</th>
			        <th>Fecha Registro</th>
			        <th>Acciones</th>
			    </tr>
			</thead>
			<tbody>
			<?php
				$suscriptores = new suscriptoresController();
				$suscriptores->selectSuscriptoresController();
			 ?>
			</tbody>
		</table>
		<!--
		<a>
			button class="btn btn-warning pull-right" id="" style="margin:20px;">Imprimir Suscriptores</button>
		</a>
		-->
	</div>
</div>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		$("#imprimePDF").click(function(){
			$.ajax({
			url:"views/ajax/MYPDF.php",
			//data: param,
            type:  'post',
			success: function(respuesta){
				console.log(respuesta);
				//$("#agregarArtículo").html(respuesta);
			}

			});
		});

	});
</script>

<!--====  Fin de SUSCRIPTORES  ====-->