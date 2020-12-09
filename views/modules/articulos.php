<style type="text/css">
	.boxImg img{
	  width: 130px;
	  max-height: 200px;
	}
	@supports(object-fit: cover){
	    .boxImg img{
	      height: 100%;
	      object-fit: cover;
	      object-position: center center;
	    }
	}
	.imagenModal img {
		width: inherit;
		height: auto;
		max-width: 70%;

  	}
  	.leerMas{
		border: 2px solid red;
		border-radius: 20px 5px;
	    padding: 2px 15px 2px 15px;
	    background-color: #CD5C5C;
	    color: white;
	}
	.leerMas:hover{
		border: 2px solid red;
		box-shadow: 3px 5px #888888;
		color: white;
	}
	.leerMas:focus{
	    background-color: #CD5C5C;
	}
	.leerMas:active {
	    background-color: red;
	    box-shadow: 3px 5px black;
	}
	.articuloCard{
		display: none;
	}
	.cardAnimationArticuloRight{
		display: block;
	  	animation: fadeInRight; /* referring directly to the animation's @keyframe declaration */
	  	animation-duration: 2s; /* don't forget to set a duration! */
	}
	.cardAnimationArticuloLeft{
		display: block;
	  	animation: fadeInLeft; /* referring directly to the animation's @keyframe declaration */
	  	animation-duration: 1s; /* don't forget to set a duration! */
	}
	#divArticulos{
		min-height: 500px;
		margin-bottom: -30px;
	}
	#topArticulos{

		height: 30px;
	}
	.card{
		min-height: 200px;
	}
	.card-body{
		min-height: 200px;
	}
	#botArticulos{
		height: 100px;
	}
</style>
<div class="container">
	<div id="topArticulos">

	</div>
	<div class="row text-center">
		<div class="col-12 pb-5 text-center">
			<h1 style="color: #26264B;">More Content</h1>
		</div>
	</div>
	<div class="row ml-5 mr-5 justify-content-center" id="divArticulos">
		<?php
			$mostrarArticulos = new articulosController();
			$mostrarArticulos->selectArticulosController();
		?>
		<!--
		<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
			<div class="card cardL1 articuloCard">
			  <div class="row no-gutters">
			    <div class="col-md-4 boxImg">
			      <img src="backend/views/images/articulos/articulo997.jpg" class="card-img" alt="...">
			    </div>
			    <div class="col-md-8">
			      <div class="card-body">
			        <h5 class="card-title">'.$value['titulo'].'</h5>
			        <p>This is a wider card with supporting text below as a natural lead-in to additional content.</p>
			        <div class="row justify-content-end">
			        	<div class="col-6">
			        		<p class="card-text"><button class="btn btn-sm leerMas" data-target="#articuloModal" data-toggle="modal">Leer Mas</button></p>
			        	</div>
			        </div>
			      </div>
			    </div>
			  </div>
			</div>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
			<div class="card cardR1 articuloCard">
			  <div class="row no-gutters">
			    <div class="col-md-4 boxImg">
			      <img src="backend/views/images/articulos/articulo329.jpg" class="card-img" alt="...">
			    </div>
			    <div class="col-md-8">
			      <div class="card-body">
			        <h5 class="card-title">'.$value['titulo'].'</h5>
			        <p>'.$value['introduccion'].'</p>
			        <div class="row justify-content-end">
			        	<div class="col-6">
			        		<p class="card-text"><button class="btn btn-sm leerMas" data-target="#articuloModal" data-toggle="modal">Leer Mas</button></p>
			        	</div>
			        </div>
			      </div>
			    </div>
			  </div>
			</div>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
			<div class="card cardL2 articuloCard">
			  <div class="row no-gutters">
			    <div class="col-md-4 boxImg">
			      <img src="backend/views/images/articulos/articulo207.jpg" class="card-img" alt="...">
			    </div>
			    <div class="col-md-8">
			      <div class="card-body">
			        <h5 class="card-title">'.$value['titulo'].'</h5>
			        <p>'.$value['introduccion'].'</p>
			        <div class="row justify-content-end">
			        	<div class="col-6">
			        		<p class="card-text"><button class="btn btn-sm leerMas" data-target="#articuloModal" data-toggle="modal">Leer Mas</button></p>
			        	</div>
			        </div>
			      </div>
			    </div>
			  </div>
			</div>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
			<div class="card cardR2 articuloCard">
			  <div class="row no-gutters">
			    <div class="col-md-4 boxImg">
			      <img src="backend/views/images/articulos/articulo715.jpg" class="card-img" alt="...">
			    </div>
			    <div class="col-md-8">
			      <div class="card-body">
			        <h5 class="card-title">'.$value['titulo'].'</h5>
			        <p>'.$value['introduccion'].'</p>
			        <div class="row justify-content-end">
			        	<div class="col-6">
			        		<p class="card-text"><button class="btn btn-sm leerMas" data-target="#articuloModal" data-toggle="modal">Leer Mas</button></p>
			        	</div>
			        </div>
			      </div>
			    </div>
			  </div>
			</div>
		</div>
	-->

	</div>
	<div id="botArticulos"></div>
</div>

<!-- Modal -->
<div class="modal fade" id="articuloModal" >
  <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title articuloTitulo">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="imagenModal" id="articuloImg">
        	
        </div>
        <div class="container">
	        <div class="row mt-3 pl-5 pr-5">
	        	<div class="col" id="articuloContent">
	        		
	        	</div>
	        </div>
	       </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
	$(document).ready(function(){

		var animationEnd = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';
		var waypoint4 = new Waypoint({
	  		element: document.getElementById('botGaleria'),
	  		handler: function() {
	  			$('.cardL1').addClass('cardAnimationArticuloLeft');
	  			$('.cardR1').addClass('cardAnimationArticuloRight');
		  	}
		});
		var waypoint3 = new Waypoint({
	  		element: document.getElementById('topArticulos'),
	  		handler: function() {
	  			$('.cardR2').addClass('cardAnimationArticuloRight');
	    		$('.cardL2').addClass('cardAnimationArticuloLeft');
		  	}
		});

	});
</script>