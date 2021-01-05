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
    font-size: 18px;
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
	background-color: #FF8633;
}
.topMenu{
	color: white;
	font-size: 13px;
	padding-top: 10px;
}
.box{
  		padding-top: 15px;
  		 background-image:linear-gradient(rgba(239, 127, 26,0.4),rgba(239, 127, 26,0.4)),url(../views/images/anamul.jpg);
	   	-webkit-background-size: cover;
	   	-moz-background-size: cover;
	   	-o-background-size: cover;
	   	background-size: cover;
	   	height: 100%;
	   	width: 100% ;
	   	text-align: center;
  }
 @media all and (min-width: 800px) and (max-width: 1000px)
{
  	.menu{
  		font-size: 15px;
  	}
}
@media all and (min-width: 300px) and (max-width: 800px)
{

  	.topMenu{
    	display: none;
  	}
  	.menu{
  		position: relative;
  		font-size: 15px;
  	}
  	.box{
  		
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
.aSinEstilo:hover{
	text-decoration: none;
	color: white;
}
.contact{
	float: left;
	border: 1px solid #FF8633;
	width: 40px;
	height: 40px;
	text-align: center;
	border-radius: 5px;
	margin-right: 10px;
}
.contact:hover{
	background-color: #FF8633;
	border: 1px solid;
	box-shadow: 3px 5px #888888;
}
#navbarSupportedContent{
	margin-right: 50px;
}
</style>

<div class="box">
	<div class="container-fluid topMenu">
		<div class="row mr-5 align-items-center">
			<div class="col-4 ">
				<i class="fas fa-envelope"></i>
		    	<a href="" class="a">contracting@algo.com</a>
		    </div>
		    <div class="col">
		    	<i class="fas fa-phone-alt"></i>
		    	4568786453
		    </div>
		    <div class="col-md-auto mr-4">
		    	<div style="float: left; margin-right: 30px; font-size: 15px;">
		    		<i class="fas fa-user"></i>
		    		<a class="aSinEstilo" href=""><b>LOGIN</b></a></div>
		    	<a class="aSinEstilo" href=""><div class="contact"><i class="fab fa-facebook-f" style="font-size:16px; margin-top: 10px;"></i></div></a>
		    	<a class="aSinEstilo" href=""><div class="contact"><i class="fab fa-youtube" style="font-size:16px; margin-top: 10px;"></i></div></a>
		    	<a class="aSinEstilo" href=""><div class="contact"><i class="fab fa-instagram" style="font-size:16px; margin-top: 10px;"></i></div></a>
		    	
		    </div>
	    </div>
	</div>

	<nav class="navbar navbar-expand-sm menu mr-4 ml-5" id="botonera">
		<div class="row ml-5">
	  		<a class="navbar-brand" href="#">Logo</a>
	  	</div>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon">open</span>
	  </button>
	<div class="collapse navbar-collapse nav" id="navbarSupportedContent">
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
