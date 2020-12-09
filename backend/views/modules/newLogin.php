<?php
session_start();
if (!$_SESSION['validar']) {
	header("location:ingreso");
	exit();
}

include "views/modules/nav.php";
include "views/modules/cabezote.php";

?>
<div class="container-fluid mt-5">
	  <div class="row ">
	  	<div class="col-12 alert alert-warning" style="display: none;">
			<p>Todos los campos son requeridos</p>
		</div>
	    <div class="col-xm-12 col-sm-6">
	    	<label for="userName">Nombre de usuario</label>
	      	<input id="userName" type="text" class="form-control" placeholder="juanPijamas" maxlength="20">
	      	<div id="errorName" class="invalid-feedback">
		      El nombre no puede llevar caracteres especiales ni espacios
		    </div>
	    </div>
	    <div class="col-xm-12 col-sm-6">
	       <label for="email">Email address</label>
		   <input type="email" id="email" class="form-control" placeholder="name@example.com">
	    </div>
	    <div class="col-xm-12 col-sm-6">
	    	<label for="pass">Contraseña</label>
	      	<input type="password" id="pass" class="form-control" placeholder="contraseña">
	      	<div id="errorPass" class="invalid-feedback">
		      La contraseña no puede ir vacia
		    </div>
	    </div>
	    <div class="col-xm-12 col-sm-6">
	    	<label for="repeatPass">Repita su contraseña</label>
	      	<input type="password" id="repeatPass" class="form-control" placeholder="contraseña">
	      	<div id="errorPassRepeat" class="invalid-feedback">
		      La contraseña no puede ir vacia
		    </div>
	    </div>
	    <div id="errorPassDiferentes" class="col-12 mt-4 alert alert-warning alert-dismissible fade show" role="alert" style="display: none;">
		  <strong>Holy guacamole!</strong> Las contraseñas tienen que ser iguales
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		    <span aria-hidden="true">&times;</span>
		  </button>
		</div>
	    <div class="col-xm-12 col-sm-12 col-md-12 col-lg-12 mt-4">
	      	<div class="custom-file">
			  <input type="file" class="form-control" id="imagenPerfil" lang="es">

			</div>
	    </div>
	    <div class="col mt-4">
	 		<button class="btn btn-primary" id="guardarNuevoLogin">guardar</button>
	 	</div>
	  </div>
	  </div>
</div>
<div id="respuestaIngreso"></div>
