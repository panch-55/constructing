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
SLIDE ADMINISTRABLE
======================================-->

<div id="imgSlide" class="col-lg-12 col-md-12 col-sm-10 col-xs-12">
	<div class="row pt-3">
		<div class="col-6">
			<button data-toggle="modal" data-target="#agregaNuevoSlideModal" class="btn btn-primary">Agregar Imagen</button>
		</div>
		<div class="col-6">
			<button id="ordenarSlide" class="btn btn-warning pull-right" style="margin:10px 30px">Ordenar Slides</button>

			<button id="guardarSlide" class="btn btn-primary pull-right" style="display:none; margin:10px 30px">Guardar Orden Slides</button>
		</div>

	</div>
	<hr>


	<p><span class="fa fa-arrow-down"></span>Arrastra aquí tu imagen, tamaño recomendado: 1600px * 600px</p>

	<ul id="columnasSlide">
		<?php

		$gestorSlide = new gestorSlideController();
		$gestorSlide->mostrarImagensController();

		?>

	</ul>

</div>

<!--=============================================== -->

<div id="textoSlide" class="col-lg-12 col-md-12 col-sm-9 col-xs-12">

	<hr>

	<ul id="ordenarTextSlide" class="">


		<?php
		$gestorSlide->editorSlideController();
		?>

		<!--
		<li>
			<span class="fa fa-pencil" style="background:blue"></span>
			<img src="views/images/slide/slide01.jpg" style="float:left; margin-bottom:10px" width="80%">
			<h1>Lorem Ipsum</h1>
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
		</li>

		<li>
			<img src="views/images/slide/slide02.jpg" class="img-thumbnail">
			<input type="text" class="form-control" placeholder="Título">
			<textarea row="5" class="form-control" placeholder="Descripción"></textarea>
			<button class="btn btn-info pull-right" style="margin:10px">Guardar</button>
		</li>

		<li>
			<img src="views/images/slide/slide03.jpg" class="img-thumbnail">
			<input type="text" class="form-control" placeholder="Título">
			<textarea row="5" class="form-control" placeholder="Descripción"></textarea>
			<button class="btn btn-info pull-right" style="margin:10px">Guardar</button>
		</li>

		<li>
			<span class="fa fa-pencil" style="background:blue"></span>
			<img src="views/images/slide/slide04.jpg" style="float:left; margin-bottom:10px" width="80%">
			<h1>Lorem Ipsum</h1>
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
		</li>

		<li>
			<img src="views/images/slide/slide01.jpg" class="img-thumbnail">
			<input type="text" class="form-control" placeholder="Título">
			<textarea row="5" class="form-control" placeholder="Descripción"></textarea>
			<button class="btn btn-info pull-right" style="margin:10px">Guardar</button>
		</li>

		<li>
			<img src="views/images/slide/slide02.jpg" class="img-thumbnail">
			<input type="text" class="form-control" placeholder="Título">
			<textarea row="5" class="form-control" placeholder="Descripción"></textarea>
			<button class="btn btn-info pull-right" style="margin:10px">Guardar</button>
		</li>
		-->

	</ul>
</div>

<!-- Modal -->
<div class="modal fade" id="agregaNuevoSlideModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Nuevo Slide</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<input type="file" id="addNewSlide" name="slideImgs">
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>

<!--===============================================

<div id="slide" class="col-lg-10 col-md-10 col-sm-9 col-xs-12">

	<hr>

	<ul>
		<li>
		    <img src="views/images/slide/slide01.jpg">
		    <div class="slideCaption">
		     	<h3>Lorem Ipsum</h3>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
		    </div>
		</li>

		<li>
		    <img src="views/images/slide/slide02.jpg">
		    <div class="slideCaption">
		      	<h3>Lorem Ipsum</h3>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
		    </div>
		</li>

		<li>
		    <img src="views/images/slide/slide03.jpg">
		    <div class="slideCaption">
		        <h3>Lorem Ipsum</h3>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
		    </div>
		</li>

		<li>
		    <img src="views/images/slide/slide04.jpg">
		    <div class="slideCaption">
		       	<h3>Lorem Ipsum</h3>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
		    </div>
		</li>

	</ul>

	<ol id="indicadores">
		<li role-slide = "1"><span class="fa fa-circle"></span></li>
		<li role-slide = "2"><span class="fa fa-circle"></span></li>
		<li role-slide = "3"><span class="fa fa-circle"></span></li>
		<li role-slide = "4"><span class="fa fa-circle"></span></li>
	</ol>

		<div id="slideIzq"><span class="fa fa-chevron-left"></span></div>
		<div id="slideDer"><span class="fa fa-chevron-right"></span></div>

</div> -->

<!--====  Fin de SLIDE ADMINISTRABLE  ====-->


<!--<li class="bloqueSlide">
			<span class="fa fa-times"></span>
			<img src="views/images/slide/slide01.jpg" class="handleImg">
		</li>

		<li class="bloqueSlide">
			<span class="fa fa-times"></span>
			<img src="views/images/slide/slide02.jpg" class="handleImg">
		</li>

		<li class="bloqueSlide">
			<span class="fa fa-times"></span>
			<img src="views/images/slide/slide03.jpg" class="handleImg">
		</li>

		<li class="bloqueSlide">
			<span class="fa fa-times"></span>
			<img src="views/images/slide/slide04.jpg" class="handleImg">
		</li>

		<li class="bloqueSlide">
			<span class="fa fa-times"></span>
			<img src="views/images/slide/slide01.jpg" class="handleImg">
		</li>

		<li class="bloqueSlide">
			<span class="fa fa-times"></span>
			<img src="views/images/slide/slide02.jpg" class="handleImg">
		</li> -->