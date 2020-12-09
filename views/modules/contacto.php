<style type="text/css">

/*=============================================
CONTÁCTENOS
=============================================*/

footer#contactenos iframe{
  height:320px;
}

footer#contactenos h4{
  line-height:30px;
}

footer#contactenos ol{
  position: relative;
  list-style:none;
  margin:auto;
  width:100%;
  background: silver;
}

footer#contactenos ol li a{
  float:left;
  width:50px;
  height:50px;
  border-radius:100%;
  margin:20px 20px;
  text-align:center;
  line-height:52px;
  color:rgba(0,50,100,1);
  background:white;
}

footer#contactenos #formulario{
  background:rgba(0,50,100,1);
}

footer #formulario{
  max-height: 558px;
}
.titContact{
  color: #CD5C5C!important;
}

</style>
<footer id="contactenos">
  <div class="container-fluid pt-5">
    <div class="row justify-content-center">
    	 <h1 class="text-info titContact"><b>CONTÁCTENOS</b></h1>
    </div>
    <hr>
  <div class="row">
	 <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">

		<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.0610775555!2d-75.60278588568637!3d6.255684295471969!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e4429739f2122e9%3A0x7097411dc6e57e48!2sCl.+45f+%2382-31%2C+Medell%C3%ADn%2C+Antioquia%2C+Colombia!5e0!3m2!1ses!2sus!4v1470838764806" width="100%"  frameborder="0" style="border:0" allowfullscreen></iframe>

		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 jumbotron">

  		<h4 class="blockquote-reverse text-primary">
  			<ul>
          <li><span class="glyphicon glyphicon-phone"></span>  (57)(4) 234 56 43</li>
          <li><span class="glyphicon glyphicon-map-marker"></span>  Calle 45F 32 - 45</li>
          <li><span class="glyphicon glyphicon-envelope"></span>  logotipo@correo.com</li>
      	</ul>
  		</h4>

		</div>

	</div>

	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" id="formulario" >

		<ol>
    		<li>
        	<a href="http://www.facebook.com" target="_blank">
            <i class="fab fa-facebook" style="font-size:24px;"></i>
       		 </a>
   			</li>
    		<li>
      		<a href="http://www.youtube.com" target="_blank">
        		<i class="fab fa-youtube" style="font-size:24px;"></i>
     			</a>
    		</li>
    		<li>
      		<a href="http://www.vimeo.com" target="_blank">
        		<i class="fab fa-vimeo" style="font-size:24px;"></i>
      		</a>
    		</li>
		</ol>


	    <input type="text" name="nombre" id="nombre" class="form-control" required placeholder="Nombre" autocomplete="off">
      <p id="errorNombre"></p>
	    <input type="email" name="email" id="email" class="form-control" required placeholder="Email" autocomplete="off">
      <p id="errorEmail"></p>
	    <textarea name="mensaje" id="mensaje" cols="15" rows="10" required placeholder="Contenido del Mensaje" class="form-control"></textarea>
      <p id="errorMsj"></p>
      <br>
      <div class="row">
        <div class="col-md-12 col-sm-12">
          <button id="enviar" class="btn btn-primary btn-block">Enviar</button>
        </div>
      </div>
	</div>
  </div>
  <div id="respuestaAjax"></div>
  </div>
</footer>
