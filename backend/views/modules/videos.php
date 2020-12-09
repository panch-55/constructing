<?php

session_start();
if (!$_SESSION['validar']) {
    header("location:ingreso");
    exit();
}

include "views/modules/nav.php";
//include "views/modules/cabezote.php";

?>
<!--=====================================
VIDEOS ADMINISTRABLE
======================================-->
<div id="" class="col-lg-12 col-md-12 col-sm-10 col-xs-12" style="width: 100%;">
	<form method="post" enctype="multipart/form-data">
        <div class="row">
            <div class="col-md-8">
             <input type="file" name="video" id="fileVideo" required accept="video/*">
            </div>
            <div class="col col-md-4">
               <button class="btn btn-primary" id="subirVideo" type="button" >Subir Video</button>
            </div>
        </div>
    </form>
    <p>Subir solo videos con formato MP4 y que no excedan el peso de 50MB</p>
    <div id="mensaje"></div>
    <ul id="galeriaVideo">

        <?php
        $cargaVideos = new videosController();
        $cargaVideos->selectVideosController();
         ?>

    </ul>

    <button id="editarOrdenVideos" class="btn btn-warning " style="margin:10px 30px;">Ordenar Videos</button>
    <button id="guardarOrdenVideos" style="display: none; margin:10px 30px" class="btn btn-primary ">Guardar Orden</button>

</div>

<!--====  Fin de VIDEOS ADMINISTRABLE  ====-->

<!--
    <li>
        <span class="fa fa-times"></span>
            <video controls>
               <source src="views/videos/video01.mp4" type="video/mp4">
            </video>
    </li>
-->