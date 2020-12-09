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
MENSAJES
======================================-->

<div class="container container-fluid">
	<div class="row">
		<div class="col col-lg-12 col-md-12 col-sm-12 mt-3" style="width: 100%!important;">
				<h1>Bandeja de Entrada</h1>
			<hr>
		</div>
		<div  id="mensajes" class="col col-lg-12 col-md-12 col-sm-12">
			<?php
				$mensajes = new mensajesController();
				$mensajes->selectMensajesController();
			 ?>
		</div>

    	<div id="lecturaMensajes" class="col col-lg-12 col-md-12 col-sm-12">
    	<!--
		<div class="well well-sm">

			<span class="fa fa-times pull-right"></span>
			<h3>De: Lorem Ipsum</h3>
			<h5>Email: correo@correo.com</h5>
			<p style="background:#fff; padding:10px">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>

			<button id="responderMsj" class="btn btn-info btn-sm" data-toggle="modal" data-target="#exampleModal">Responder</button>

		</div>
		-->

		</div>
	</div>
</div>


<!--====  Fin de MENSAJES -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Contestar Mensaje</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<div id="content"></div>
    </div>
  </div>
</div>