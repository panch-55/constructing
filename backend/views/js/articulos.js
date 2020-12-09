$("#btnArticulo").click(function(){
		$("#exampleModalLabel").html("Nuevo Articulo");
	$.ajax({
			url:"views/modules/articuloNuevoModal.php",
			//data: param,
            type:  'post',
			success: function(respuesta){
				$("#agregarArtículo").html(respuesta);
			}

		});
});

/*=============================================
Área de arrastre de imágenes
=============================================*/

if($("#arrastreImagenArticulo").html() == 0){
	$("#arrastreImagenArticulo").css({"height":"100px"});
}
else{
	$("#arrastreImagenArticulo").css({"height":"auto"});
}

/*=====  Área de arrastre de imágenes  ======*/

/*=============================================
Subir Imagen
=============================================*/
$(document).on("change", '#subirFoto', function() {
//$("#subirFoto").change(function(){
	var imagen = "";
	imagen = this.files[0];
	var imagenSize = imagen.size;
	//console.log(imagen);
	if(Number(imagenSize) > 600000){

		$("#arrastreImagenArticulo").before('<div class="alert alert-warning alerta text-center">El archivo excede el peso permitido, 600kb</div>')

	}else{
		$(".alerta").remove();
		var articulo = new FormData();
		articulo.append("imagen",imagen);
		$.ajax({
			url:"views/ajax/articulosAjax.php",
			method: "POST",
			data: articulo,
			//cache: false,
			contentType: false,
			processData: false,
			//dataType:"json",
			beforeSend: function(){
				$("#arrastreImagenArticulo").before('<img src="views/images/status.gif" id="status">');
			},
			success: function(respuesta){
				//console.log("respuesta",respuesta);
				if (respuesta == 0) {
					$("#arrastreImagenArticulo").before('<div class="alert alert-warning alerta text-center">La imagen es inferior a 800px * 600px</div>');
					$('#status').remove();
				}else{
					$('#status').remove();
					$("#arrastreImagenArticulo").html('<div id="imagenArticulo"><img src="'+respuesta.substring(6)+'" class="img-thumbnail"></div>');

				}
			}

		});
	}
});

$("#arrastreImagenArticulo").on("dragover", function(e){

	e.preventDefault();
	e.stopPropagation();

	$("#arrastreImagenArticulo").css({"background":"url(views/images/pattern.jpg)"})

});
$("#arrastreImagenArticulo").on("drop", function(e){

	e.preventDefault();
	e.stopPropagation();

	$("#arrastreImagenArticulo").css({"background":"white"});

	var archivo = e.originalEvent.dataTransfer.files;
	var imagen = archivo[0];

	// Validar tamaño de la imagen
	var imagenSize = imagen.size;
	console.log("size image:",imagenSize);
	if(Number(imagenSize) > 400000){

		$("#arrastreImagenArticulo").before('<div class="alert alert-warning alerta text-center">El archivo excede el peso permitido, 400kb</div>')

	}
});

/*=====  Subir Imagen  ======*/

function CierraPopup() {
    $("#exampleModal").modal('hide');//ocultamos el modal
    $('body').removeClass('modal-open');//eliminamos la clase del body para poder hacer scroll
    $('.modal-backdrop').remove();//eliminamos el backdrop del modal
}
$(document).on("click", '#guardarArticulo', function(e) {
//$("#guardarArticulo").click(function(){
	e.preventDefault();
	e.stopPropagation();

	var titulo = $("#titulo").val();
	var intro = $("#intro").val();
	var contenido = $("#contenido").val();

	var archivo = $("#subirFoto").val();

	if ($("#intro").val() != "" && $("#intro").val() != "" && $("#subirFoto").val() != "") {
		//alert(archivo);
		var file = $('#subirFoto')[0].files[0];
		var articulo = new FormData();
		articulo.append("titulo",titulo);
		articulo.append("intro",intro);
		articulo.append("contenido",contenido);
		articulo.append("file",file);
		//console.log(file);

		$.ajax({
			url:"views/ajax/articulosAjax.php",
			method: "POST",
			data: articulo,
			//cache: false,
			contentType: false,
			processData: false,
			//dataType:"json",
			beforeSend: function(){
				//$("#columnasSlide").before('<img src="views/images/status.gif" id="status">');
				$('#guardarArticulo').attr("disabled", true);
			},
			success: function(respuesta){
				//console.log("respuesta",respuesta);
				//var info = $.parseJSON(respuesta);
				//console.log(info);
				//alert(respuesta['lastId']);
				swal({
		                title: "Ok!",
		                text: "datos guardados exitosamente.",
		                icon: "success",
		                timer: 1400,
		                buttons: false
					}).then(function () {
						CierraPopup();
						$("#editarArticulo").append(respuesta);
					});
			}

		});
	}
});
$(document).on("click", '.editar', function() {

	articuloId = $(this).parent().parent().attr("id");
	$("#exampleModalLabel").html("Editor de articulos");
	//rutaSlide = $(this).attr("ruta");
	//alert("articulo con el id:"+articuloId);
	var param = {
		"funcion": "selectUpdateArticulo",
		"articuloId": articuloId,
	};
	$.ajax({
			url:"views/ajax/articulosAjax.php",
			data: param,
            type:  'post',
			success: function(respuesta){
				 $("#exampleModal").modal('show');//ocultamos el modal
				$("#agregarArtículo").html(respuesta);
			}

		});
});

$(document).on("click", '.eliminar', function() {
	swal({
	  title: "Quieres eliminar esta imagen?",
	  text: "Una vez borrada, no podras recuperar tu archivo!",
	  icon: "warning",
	  buttons: true,
	  dangerMode: true,
	})
	.then((willDelete) => {
	  if (willDelete) {

		articuloId = $(this).parent().parent().attr("id");
		rutaImg = $(this).parent().attr('ruta');
		$(this).parent().parent().remove();
		//alert(articuloId+" ... "+rutaImg);

		borrarItem = {
			"funcion": "eliminarArticulo",
			"articuloId": articuloId,
			"rutaImg": rutaImg
		};

		$.ajax({
			url:"views/ajax/articulosAjax.php",
			method: "POST",
			data: borrarItem,
			success: function(respuesta){
				//console.log('respuesta', respuesta);
				if (respuesta == "ok") {
					swal("Poof! el articulo fue eliminado!", {
					    icon: "success",
					    timer: 1400,
					    buttons: false
				    });
				}
			}

		});

	  }
	});
});
$(document).on("change", '#editarFoto', function() {
//$("#subirFoto").change(function(){
	var imagen = "";
	imagen = this.files[0];
	var imagenSize = imagen.size;
	//console.log(imagen);
	if(Number(imagenSize) > 400000){

		$("#arrastreImagenArticulo").before('<div class="alert alert-warning alerta text-center">El archivo excede el peso permitido, 400kb</div>')

	}else{
		$(".alerta").remove();
		var articulo = new FormData();
		articulo.append("imagen",imagen);
		$.ajax({
			url:"views/ajax/articulosAjax.php",
			method: "POST",
			data: articulo,
			//cache: false,
			contentType: false,
			processData: false,
			//dataType:"json",
			beforeSend: function(){
				$("#arrastreImagenArticulo").before('<img src="views/images/status.gif" id="status">');
			},
			success: function(respuesta){
				//console.log("respuesta",respuesta);
				if (respuesta == 0) {
					$("#arrastreImagenArticulo").before('<div class="alert alert-warning alerta text-center">La imagen es inferior a 800px * 600px</div>');
					$('#status').remove();
				}else{
					$('#status').remove();
					$("#arrastreImagenArticulo").html('<div id="imagenArticulo"><img src="'+respuesta.substring(6)+'" class="img-thumbnail"></div>');

				}
			}

		});
	}
});

$(document).on("click", '#guardarEdicion', function() {

	var articuloId = $("#articuloId").val();
	var titulo = $("#editarTitulo").val();
	var intro = $("#editarIntro").val();
	var contenido = $("#editarContenido").val();
	//idSlide = $(this).parent().parent().children('img').attr("src");
	var oldRuta = $("#span"+articuloId).attr('ruta');
	alert(oldRuta);
	if ($("#editarTitulo").val() != "") {
		//alert(archivo);
		if ($('#editarFoto').val() == "") {
			var file = 0;
		}else{
			var file = $('#editarFoto')[0].files[0];
		}

		var articulo = new FormData();
		articulo.append("articuloId",articuloId);
		articulo.append("tituloEdit",titulo);
		articulo.append("introEdit",intro);
		articulo.append("contenidoEdit",contenido);
		articulo.append("file",file);
		articulo.append("oldRuta",oldRuta);
		articulo.append("funcion","saveUpdateArticulo")
		//console.log(file);

		$.ajax({
			url:"views/ajax/articulosAjax.php",
			method: "POST",
			data: articulo,
			//cache: false,
			contentType: false,
			processData: false,
			//dataType:"json",
			beforeSend: function(){
				//$("#columnasSlide").before('<img src="views/images/status.gif" id="status">');
			},
			success: function(respuesta){
				//console.log("respuesta",respuesta);

				var info = $.parseJSON(respuesta);
				//console.log(info);
				//alert(respuesta['lastId']);
				swal({
	                title: "Ok!",
	                text: "datos guardados exitosamente.",
	                icon: "success",
	                timer: 1400,
	                buttons: false
				}).then(function () {
					CierraPopup();
					var id = info['id'];
					$("#"+id).html(info['li']);
				});
			}

		});
	}else{
		alert("Ni el titulo ni la imagen pueden ir vacios, revisa tu contenido por fabor!");
	}
});

$(document).on("click", '#mas', function() {

	//var idArticulo = $("#articuloId").val();
	var idArticulo = $(this).parent().parent().attr("id");
	//alert(articuloId);

	data = {
			"funcion": "leerMas",
			"idArticulo": idArticulo,
		};

	$(".mas").html("Nuevo Articulo");

	$.ajax({
			url:"views/ajax/articulosAjax.php",
			method: "POST",
			data: data,
			success: function(respuesta){
				var info = $.parseJSON(respuesta);
				$("#leerMas").html(info['div']);
				$(".tituloArt").html(info['titulo']);
			}

		});

});

var almacenarOrdenId = new Array();
var ordenItem = new Array();
$("#ordenarArticulos").click(function(){
	//alert("hola");
	$("#ordenarArticulos").hide();
	$("#guardarOrdenArticulos").show();


	data = {
			"funcion": "selectOrdenarArticulos",
		};

	$.ajax({
			url:"views/ajax/articulosAjax.php",
			method: "POST",
			data: data,
			success: function(respuesta){
				//console.log(respuesta);
				//var info = $.parseJSON(respuesta);
				$("#divArticulos").html(respuesta);
				$("#storable").css({"cursor":"move"});

				$("#storable").sortable({
					stop: function(event) {
						for(var i= 0; i < $("#storable li").length; i++){

						almacenarOrdenId[i] = event.target.children[i].id;

						ordenItem[i]  =  i+1;

						}
					}
				});
			}

		});


	/*
	$("#editarArticulo span i").hide();
	$("#editarArticulo button").hide();
	$("#editarArticulo img").hide();
	$("#editarArticulo p").hide();
	$("#editarArticulo").remove();
	$(".bloqueArticulo h1").css({"font-size":"14px","position":"absolute","padding":"28px","top":"-1px"});
	//$(".bloqueArticulo h1").css({"padding":"2px"});
	$("#editarArticulo span").html('<i class="glyphicon glyphicon-move" style="padding:8px"></i>');
	*/
	$("body,html").animate({
		scrollTop:$("body").offset().top
	}, 500);

});


$("#guardarOrdenArticulos").click(function(){
	//alert("hola");
	$("#guardarOrdenArticulos").hide();
	$("#ordenarArticulos").show();

	for(var i= 0; i < $("#storable li").length; i++){
		//console.log("almacenarOrdenId[i]", almacenarOrdenId[i]);

		var actualizarOrden = new FormData();
		actualizarOrden.append("funcion", "actualizarOrden");
		actualizarOrden.append("actualizarOrdenId", almacenarOrdenId[i]);
		actualizarOrden.append("actualizarOrdenItem", ordenItem[i]);
		//console.log(almacenarOrdenId[i]+"---"+ordenItem[i]);

		$.ajax({

			url:"views/ajax/articulosAjax.php",
			method: "POST",
			data: actualizarOrden,
			//cache: false,
			contentType: false,
			processData: false,
			success: function(respuesta){
			//console.log(respuesta);
			//$("#textoSlide ul").html(respuesta);
				swal({
					title: "¡Ok!",
		            text: "¡El orden se ha actualizado correctamente!",
	                icon: "success",
	                timer: 1300,
	                buttons:false,
				}).then(function () {
					window.location = "articulos";
					//$("#lightbox span").show();
				});
			}
		});

	}
});
