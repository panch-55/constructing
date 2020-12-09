<!--=====================================
COLUMNA BOTONERA
======================================-->


	<!--=====================================
	BOTONERA MOVIL
	======================================-->

	<div id="botoneraMovil" class="navbar-header navbar-inverse">

		<button type="button" class="navbar-toggle pull-left" data-toggle="collapse" data-target="#botonera">

			<span class="icon-bar"></span>
	    	<span class="icon-bar"></span>
	    	<span class="icon-bar"></span>

		</button>

	</div>

<!--====  Fin de BOTONERA MOVIL

	<nav id="botonera" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 collapse navbar-collapse text-center">

		<ul class="nav navbar">
			<li><a href="inicio">Inicio <span class="glyphicon glyphicon-new-window"></span></a>
			</li>
			<li><a href="slide">Slide <span class="glyphicon glyphicon-new-window"></span></a>
			</li>
			<li><a href="articulos">Artículos <span class="glyphicon glyphicon-new-window"></span></a>
			</li>
			<li><a href="galeria">Imágenes <span class="glyphicon glyphicon-new-window"></span></a>
			</li>
			<li><a href="videos">Videos <span class="glyphicon glyphicon-new-window"></span></a>
			</li>
			<li><a href="suscriptores">Suscriptores <span class="glyphicon glyphicon-new-window"></span></a>
			</li>

		</ul>

	</nav>

</div>

 FIn de COLUMNA BOTONERA  ====-->

<?php

    $user = new usersModel();
    $id = $_SESSION['usuarioId'];
    $thisUser = $user->getUserByIdModel($id,"users");
    $img = substr($thisUser['photo'], 6);
 ?>

 <div class="page-wrapper chiller-theme sidebar-bg bg1 toggled">
        <a id="show-sidebar" class="btn btn-sm btn-dark" href="#">
            <i class="fad fa-angle-double-right"></i>
        </a>
        <nav id="sidebar" class="sidebar-wrapper">
            <div class="sidebar-content">
                <div class="sidebar-brand text-center">
                    <a href="#">Hospital General De loreto</a>
                    <div id="close-sidebar">
                       <i class="fa fa-bars" aria-hidden="true"></i>
                    </div>
                </div>
                <div class="sidebar-header">
                    <div class="user-pic">
                    	<img src="<?php echo $img; ?>" class="img-circle img-responsive">

                    </div>
                    <div class="user-info">
                        <span class="user-name">
                            <strong></strong>
                        </span>
                        <span class="user-role">Administrator</span>

                    </div>
                </div>

                <!-- sidebar-search  -->
                <div class="sidebar-menu">
                    <ul>
                        <li>
                            <a href="inicio" id="home">
                                 <i class="fa fa-home" aria-hidden="true"></i>
                                <span>Home</span>
                            </a>
                        </li>
                        <li class="header-menu">
                            <span>General</span>
                        </li>
                        <li class="sidebar-dropdown">
                            <a href="slide">
                                <i class="fa fa-desktop" aria-hidden="true"></i>
                                <span>Slide</span>
                                <span class="badge badge-pill badge-danger"></span>
                            </a>
                        </li>
                        <li class="sidebar-dropdown">
                            <a href="articulos">
                                <i class="fa fa-suitcase" aria-hidden="true"></i>
                                <span>Articulos</span>
                                <span class="badge badge-pill badge-danger"></span>
                            </a>

                        </li>
                        <li class="sidebar-dropdown">
                            <a href="galeria">
                                <i class="fa fa-picture-o" aria-hidden="true"></i>
                                <span>Galeria</span>
                                <span class="badge badge-pill badge-danger"></span>
                            </a>

                        </li>

                        <li class="sidebar-dropdown">
                            <a href="videos">
                                <i class="fa fa-file-video-o" aria-hidden="true"></i>
                                <span>Videos</span>
                                <span class="badge badge-pill badge-primary"></span>
                            </a>
                        </li>
                        <li class="sidebar-dropdown">
                            <a href="suscriptores">
                                <i class="fa fa-users" aria-hidden="true"></i>
                                <span>Suscriptores</span>
                            </a>

                        </li>

                        <li class="header-menu">
                            <span>Extra</span>
                        </li>
                        <li class="sidebar-dropdown">
                            <a href="#">
                                <i class="fa fa-cog"></i>
                                <span>Settings</span>
                            </a>
                            <div class="sidebar-submenu">
                                <ul>
                                    <li>
                                        <a id="nuevoUsuario" href="nuevoLogin">Nuevo Login</a>
                                    </li>
                                    <li>
                                        <a id="setting" href="#">Temas</a>
                                    </li>
                                   <li>
                                        <a id="help" href="#">Help</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-book"></i>
                                <span>Documentation</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- sidebar-menu  -->
            </div>
            <!-- sidebar-content  -->
            <div class="sidebar-footer">
                <div>
                    <a href="#" id="cerrarSesion">
                        <i class="fa fa-power-off"></i>
                    </a>
                </div>
            </div>
        </nav>
        <!-- sidebar-wrapper  -->

		<main class="page-content">
            <div id="contenedorEntradas" class="container container-fluid">
