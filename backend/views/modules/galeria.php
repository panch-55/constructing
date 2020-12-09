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
GALERIA ADMINISTRABLE
======================================-->
	<div id="imgSlide" class="col-lg-12 col-md-10 col-sm-9 col-xs-12">
	<hr>

		<p><span class="fa fa-arrow-down"></span>  Arrastra aquí tu imagen, tamaño recomendado: 1600px * 600px</p>

		<ul id="lightbox">
			<?php
			$galeriaController = new galeriaController();
			$galeriaController->selectGaleriaImagenesController();
			?>

		</ul>
		<div class="row">
			<div class="col">
			<button class="btn btn-primary" data-toggle="modal" data-target="#addNewImgGaleria">Agregar imagen</button>
			</div>
			<div class="col">
				<button id="ordenarImagenes" class="btn btn-warning pull-right" style="margin:10px 30px">Ordenar Imágenes</button>
				<button id="guardarOrden" class="btn btn-primary pull-right" style="display:none; margin:10px 30px">Guardar Orden</button>
			</div>
		</div>
		

	</div>

<!-- Modal -->
<div class="modal fade" id="addNewImgGaleria" tabindex="-1" role="dialog" aria-labelledby="agregaNuevaImgaenGaleria" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="agregaNuevaImgaenGaleria">Nuevo Slide</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<input type="file" id="addNewImg" name="galeriaImg">
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
<!--====  Fin de GALERIA ADMINISTRABLE  ====-->
<?php include "views/modules/endNav.php";
 ?>


 <!-- #######################################

			<li>
				<span class="fa fa-times"></span>
				<a rel="grupo" href="views/images/galeria/photo01.jpg">
					<img src="views/images/galeria/photo01.jpg">
				</a>
			</li>

			<li>
				<span class="fa fa-times"></span>
				<a rel="grupo" href="views/images/galeria/photo02.jpg">
					<img src="views/images/galeria/photo02.jpg">
				</a>
			</li>

			<li>
				<span class="fa fa-times"></span>
				<a rel="grupo" href="views/images/galeria/photo03.jpg">
					<img src="views/images/galeria/photo03.jpg">
				</a>
			</li>

			<li>
				<span class="fa fa-times"></span>
				<a rel="grupo" href="views/images/galeria/photo04.jpg">
					<img src="views/images/galeria/photo04.jpg">
				</a>
			</li>

			<li>
				<span class="fa fa-times"></span>
				<a rel="grupo" href="views/images/galeria/photo01.jpg">
					<img src="views/images/galeria/photo01.jpg">
				</a>
			</li>

			<li>
				<span class="fa fa-times"></span>
				<a rel="grupo" href="views/images/galeria/photo02.jpg">
					<img src="views/images/galeria/photo02.jpg">
				</a>
			</li>

			<li>
				<span class="fa fa-times"></span>
				<a rel="grupo" href="views/images/galeria/photo03.jpg">
					<img src="views/images/galeria/photo03.jpg">
				</a>
			</li>

			<li>
				<span class="fa fa-times"></span>
				<a rel="grupo" href="views/images/galeria/photo04.jpg">
					<img src="views/images/galeria/photo04.jpg">
				</a>
			</li>
 ########################################### -->