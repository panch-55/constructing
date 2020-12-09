<!--=====================================
			 CABEZOTE
			======================================-->

<div class="container">
<div class="row">
<div id="cabezote" style="width: 100%!important" class="row">

	<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">

		<ul>
			<li  style="background: #333">
				<a href="mensajes" style="color: #fff">
      			<i class="fa fa-envelope"></i>
      			<span><?php
      				$mensajes = new mensajesController();
      				$mensajes->mensajesNoVistosController();
      			 ?></span>
    			</a>
			</li>

			<li  style="background: #333">
				<a href="suscriptores" style="color: #fff">
      			<i class="fa fa-bell"></i>
    			</a>
			</li>

		</ul>

	</div>

	<div id="time" class="col-lg-4 col-md-4 col-sm-4 col-xs-4">

	</div>

	<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 text-right">

		<img src="views/images/userPhoto.jpg" class="img-circle">

		<p id="member"><?php echo $_SESSION['usuario']; ?>  <span class="fa fa-chevron-down"></span>
			<br>
			<ol id="admin">
				<li><a href="perfil"><span class="fa fa-user"></span>Editar Perfil</a></li>
				<li><a href="salir"><span class="fa fa-times"></span>Salir</a></li>
			</ol>

		</p>

	</div>

	</div>
</div>
</div>
<!--====  Fin de CABEZOTE  ====-->