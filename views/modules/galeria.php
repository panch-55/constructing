<?php
 ?>
<style type="text/css">
	.galeriaImg img {
		width: inherit;
		height: auto;
		max-width: 100%;
  	}
	.colorGaleria{
	  	background-color: white;
	}
	  #galeria{
	  	margin: 1rem auto;
	    width:100%;
	    max-width:960px;
	    column-count: 3;
	    -webkit-column-span:all;
		column-span:all;
		break-inside: avoid;
		page-break-inside: avoid;
	  }

	#seeMore{
		border: 2px solid red;
		border-radius: 30px 5px;
	    padding: 10px;
	    background-color: #FF8A33;
	    color: white;
	    padding-left: 50px;
	    padding-right: 50px;
	}
	#seeMore:hover{
		border: 2px solid red;
		box-shadow: 3px 5px #888888;
	}
	#seeMore:focus{
		border: 2px solid red;
	    background-color: #FF8A33;
	}
	#seeMore:active {
	    background-color: #FF5E33;
	    box-shadow: 3px 5px black;
	}


 @media (max-width: 767px) {
    #galeria {
        columns:2;
    }

}

/* Móviles en vertical */

@media (max-width: 480px) {
    #galeria {
        columns: 1;
    }
}
	.focusMe:focus{
		background-color: #CD5C5C;
	}
h2{
	color: white;
	font-size: 4em!important;
	font-family: OCR A Std, monospace;
	font-weight: bold;
}
#galeriaContent{
	padding-top: 15px;
  		 background-image:linear-gradient(rgba(0, 0, 0,0.8),rgba(0, 0, 0,0.8)),url(../views/images/starkov.jpg);
	   	-webkit-background-size: cover;
	   	-moz-background-size: cover;
	   	-o-background-size: cover;
	   	background-size: cover;
	   	height: 100%;
	   	width: 100% ;
	   	text-align: center;
}
</style>
<div class="container-fluid colorGaleria" id="galeriaContent">
	<div class="container">
		<div class="row pt-2 justify-content-center" >
			<h2>OUR WORK</h2>
		</div>
	</div>
	<article class="pt-1 pb-4 justify-content-center" id="galeria">
	<?php
		$mostrarArticulos = new galeriaController();
      	$mostrarArticulos->cargaGaleriaController();
	 ?>

	 <!--
	<figure>
       <a class="galeriaImg" data-fancybox="gallery" href="../views/images/galeria/bidvine-1.jpg"><img class="img-thumbnail" src="../views/images/galeria/bidvine-1.jpg"></a>
    </figure>
	<figure>
		<a class="galeriaImg" data-fancybox="gallery" href="../views/images/galeria/pixabay-1.jpg"><img src="../views/images/galeria/pixabay-1.jpg" class="img-thumbnail"></a>
	</figure>
	<figure>
		<a class="galeriaImg" data-fancybox="gallery" href="../views/images/galeria/pixabay-2.jpg"><img src="../views/images/galeria/pixabay-2.jpg" class="img-thumbnail"></a>
	</figure>
	<figure>
		<a class="galeriaImg" data-fancybox="gallery" href="../views/images/galeria/pixabay-3.jpg"><img src="../views/images/galeria/pixabay-3.jpg" class="img-thumbnail"></a>
	</figure>
	<figure>
		<a class="galeriaImg" data-fancybox="gallery" href="../views/images/galeria/pixabay-1.jpg"><img src="../views/images/galeria/pixabay-1.jpg" class="img-thumbnail"></a>
	</figure>
	<figure>
		<a class="galeriaImg" data-fancybox="gallery" href="../views/images/galeria/pixabay-2.jpg"><img src="../views/images/galeria/pixabay-2.jpg" class="img-thumbnail"></a>
	</figure>
	<figure>
		<a class="galeriaImg" data-fancybox="gallery" href="../views/images/galeria/pixabay-3.jpg"><img src="../views/images/galeria/pixabay-3.jpg" class="img-thumbnail"></a>
	</figure>
	<figure>
		<a class="galeriaImg" data-fancybox="gallery" href="../views/images/galeria/rodolfo-2.jpg"><img src="../views/images/galeria/rodolfo-2.jpg" class="img-thumbnail"></a>
	</figure>
	<figure>
		<a class="galeriaImg" data-fancybox="gallery" href="../views/images/galeria/skitterphoto-5.jpg"><img src="../views/images/galeria/skitterphoto-5.jpg" class="img-thumbnail"></a>
	</figure>
	-->
	</article>
</div>
<div class="container mb-3" id="botGaleria">
	<div class="row justify-content-center mb-3">
		<button class="btn" id="seeMore">SEE MORE</button>
	</div>
	<hr>
</div>