<style type="text/css">
ul{
	/*
	height: 100px;*/
}
a{
	color: white;
	opacity: 1;
}
.a{
	color:white;
}
.a:hover{
	color: white;
	text-decoration: none;
}
.box{
	position:relative;
    min-height:100px;
    width:100%;
    background-color:rgba(239, 127, 26,0.5);
    margin-top: -100px;
    font-size: 25px;
}
.nav-link{
	color:white;
}
.nav-link:hover{
	color:white;
}
.top{
	position: relative;
}
.barra{
  	visibility: hidden;
}
.nav-link:hover + .barra{
 	visibility: visible;
}
.barra{
	position:relative;
	height:3px;
	background-color:orange;
}
.topMenu{
	color: white;
	font-size: 13px;
}
@media all and (min-width: 500px) and (max-width: 800px)
{

  	.topMenu{
    	display: none;
  	}
  	.menu{
  		position: relative;
  		font-size: 18px;
  	}
  	.box{
  		padding-top: 15px;
  		 background-image:linear-gradient(rgba(239, 127, 26,0.5),rgba(239, 127, 26,0.5)),url(../views/images/anamul.jpg);
	   	-webkit-background-size: cover;
	   	-moz-background-size: cover;
	   	-o-background-size: cover;
	   	background-size: cover;
	   	height: 100%;
	   	width: 100% ;
	   	text-align: center;
  }

}
.navbar{

}
</style>

<div class="box">
	<div class="container-fluid topMenu">
		<div class="row">
			<div class="col">
		    	<a href="" class="a">dEveleCreations@gmail.com</a>
		    </div>
		    <div class="col-md-auto">
		    	Variable width content this is more content
		    </div>
		    <div class="col col-lg-2 col-md-2">
		    	3 of 3
		    </div>
	    </div>
	</div>

	<nav class="navbar navbar-expand-sm menu" id="botonera">
	  <a class="navbar-brand" href="#">Logo</a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon">open</span>
	  </button>

	<div class="collapse navbar-collapse nav justify-content-end" id="navbarSupportedContent">
		<div class="col">
			<ul class="navbar-nav nav justify-content-end">
				<li class="nav-item">
			       <a class="nav-link" href="#home">Home <span class="sr-only">(current)</span></a>
			       <div class="barra"></div>
			    </li>
				<li class="nav-item">
			    	<a class="nav-link" href="#noticias">Noticias</a>
			    	<div class="barra"></div>
			  	</li>
				<li class="nav-item">
				    <a class="nav-link" href="#galeriaContent">Galeria</a>
				    <div class="barra"></div>
				</li>
				<li class="nav-item">
				    <a class="nav-link" href="#articulos">Articulos</a>
				    <div class="barra"></div>
				</li>
				<li class="nav-item">
				    <a class="nav-link" href="#videos">Videos</a>
				    <div class="barra"></div>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#contactenos">Contactenos</a>
					<div class="barra"></div>
				</li>
			</ul>
		</div>
    </div>
</nav>
</div>
