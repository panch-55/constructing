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
PERFIL
======================================-->
<div class="container container-fluid">
<div class="row justify-content-center">
	<div class="col-12 mt-4 mb-3">
		<button id="nuevoUsuario" class="btn btn-light" data-toggle="modal" data-target="#nuevoUsuarioModal">Registrar un nuevo miembro</button>
	</div>

	<div id="editarPerfil" class="col-xl-5">
		<?php
			$user = new usersController();
			$user->getUsuarioByIdController();
		 ?>
    </div>
	<div class="col-lg-7">
		<table id="tabalaUsuarios" class="table table-striped dt-responsive nowrap">
			<thead>
			    <tr>
			    	<th>#</th>
			    	<th hidden="">id</th>
			      	<th>Usuario</th>
			      	<th>Perfil</th>
			      	<th>Email</th>
			      	<th></th>
			    </tr>
			</thead>
			<tbody>
			    <?php
					$users = new usersController();
					$users->getUsersController();
				 ?>
			    </tbody>
			</table>
		</div>
   	</div>
</div>

<!--====  Fin de PERFIL  ====-->

<!-- Modal nuevo Usuario-->
<div class="modal fade" id="nuevoUsuarioModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agrega nuevo usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!--Cuerpo del modal-->

	    <div class="container-fluid">
		  <div class="row">
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
		  </div>
		</div>
		<div id="respuestaIngreso"></div>

        <!--fin del cuuerpo del modal-->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button id="guardarNuevoLogin" class="btn btn-primary">Guardar</button>
        <button id="guardarEdicionPerfil" class="btn btn-warning" style="display: none;">Guardar</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal de actulizacion-->
<div class="modal fade" id="editarPerfilModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div id="editaPerfilBody" class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar Perfil</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<div class="container-fluid" id="bodyModalActualizaUsuario">
      	<!--modal body -->

      	<!--end modal body -->
      	</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-warning" data-dismiss="modal">Cancelar</button>
        <div id="botones">

        </div>
      </div>
    </div>
  </div>
</div>