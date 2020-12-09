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
ARTÍCULOS ADMINISTRABLE
======================================-->
<style>
  .sortable { list-style-type: none; margin: 0; padding: 0; width: 60%; }
  .sortable li { margin: 0 3px 3px 3px; padding: 0.4em; padding-left: 1.5em; font-size: 1.4em; height: 18px; }
  .sortable li span { position: absolute; margin-left: -1.3em; }
</style>

<div id="seccionArticulos" class="col-lg-10 col-md-10 col-sm-9 col-xs-12 mt-5">

	<button id="btnArticulo" class="btn btn-info btn-lg" data-toggle="modal" data-target="#exampleModal">Agregar Artículo</button>

	<!--==== AGREGAR ARTÍCULO  ====-->

	<hr>
	<div id="divArticulos" class="">
		<ul id="editarArticulo">
			<?php
				$mostrarArticulos = new articulosController();
				$mostrarArticulos->selectArticulosController();
			 ?>
		</ul>
	</div>

	<button id="ordenarArticulos" class="btn btn-warning pull-right" style="margin:10px 30px">
		Ordenar Artículos
	</button>
	<button id="guardarOrdenArticulos" class="btn btn-primary pull-right" style="margin:10px 30px; display: none;">
		Guardar Orden Artículos
	</button>
	<button  id="btnArticulo" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
		Agregar Artículo
	</button>

</div>

<!--====  Fin de ARTÍCULOS ADMINISTRABLE  ====-->



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<div id="agregarArtículo">
      	<!--
      	<form method="post" enctype="multipart/form-data">

	      	<input type="text" id="titulo" placeholder="Título del Artículo" class="form-control">
			<textarea id="intro" cols="30" rows="2" placeholder="Introducción del Articulo" class="form-control"></textarea>
			<input type="file" name="imagen" class="btn btn-default" id="subirFoto" required>
			<p>Tamaño recomendado: 800px * 400px, peso máximo 2MB</p>
			<div id="arrastreImagenArticulo">
				<div id="imagenArticulo">
					<img src="" class="img-thumbnail">
				</div>
			</div>
			<textarea id="contenido" cols="30" rows="5" placeholder="Contenido del Articulo" class="form-control"></textarea>
			<button id="guardarArticulo" class="btn btn-primary">Guardar Artículo</button>

		</form>
		-->
     	</div>

    </div>
    </div>
  </div>
</div>


<div id="articulo1" class="modal fade">

	<div class="modal-dialog modal-content">

		<div class="modal-header" style="border:1px solid #eee">
	  		<h3 class="modal-title tituloArt">Lorem Ipsum</h3>
	  		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
		</div>

		<div id="leerMas" class="modal-body" style="border:1px solid #eee">
		</div>

		<div class="modal-footer" style="border:1px solid #eee">
			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		</div>

	</div>

</div>

