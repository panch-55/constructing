/*=============================================
Área de arrastre de imágenes
=============================================*/

if($("#lightbox").html() == 0){
	$("#lightbox").css({"height":"100px"});
}
else{
	$("#lightbox").css({"height":"auto"});
}

/*=====  Área de arrastre de imágenes  ======*/

/*=============================================
Subir Imagen
=============================================*/
$("#addNewImg").fileinput({
	uploadExtraData: {
			'funcion': 'guardaImagenGaleria',
        },
	uploadUrl: "views/ajax/galeriaAjax.php",
}).on('fileuploaded', function(respuesta) {
		//console.log('respuesta',respuesta);
		window.location = "galeria";
});

$("#lightbox").on("dragover", function(e){

	e.preventDefault();
	e.stopPropagation();

	$("#lightbox").css({"background":"url(views/images/pattern.jpg)"})

});

/*=====  end Subir Imagen  ======*/
/*=============================================
Soltar Imagen
=============================================*/

$("#lightbox").on("drop", function(e){

	e.preventDefault();
	e.stopPropagation();

	$("#lightbox").css({"background":"white"});

	var archivo = e.originalEvent.dataTransfer.files;
	var imagen = archivo[0];

	// Validar tamaño de la imagen
	var imagenSize = imagen.size;
	//console.log(imagenSize);

	if(Number(imagenSize) > 4000000){

		$("#galeria").before('<div class="alert alert-warning alerta text-center">El archivo excede el peso permitido, 400kb</div>')

	}

	else{

		$(".alerta").remove();

	}

	// Validar tipo de la imagen
	var imagenType = imagen.type;

	if(imagenType == "image/jpeg" || imagenType == "image/png" ){

		$(".alerta").remove();

	}

	else{

		$("#galeria").before('<div class="alert alert-warning alerta text-center">El archivo debe ser formato JPG o PNG</div>')

	}

	//Subir imagen al servidor
	if(imagenType == "image/jpeg" || imagenType == "image/png" || imagenType == "image/jpg"){

		var datos = new FormData();

		datos.append("imagen", imagen);

		$.ajax({
			url:"views/ajax/galeriaAjax.php",
			method: "POST",
			data: datos,
			//cache: false,
			contentType: false,
			processData: false,
			dataType:"json",
			beforeSend: function(){

				$("#galeria").before('<img src="views/images/status.gif" id="status">');

			},
			success: function(respuesta){
				console.log('respuesta',respuesta);
				$("#status").remove();

				if(respuesta == 0){
					$("#imgSlide").before('<div class="alert alert-warning alerta text-center">La imagen es inferior a 1600px * 600px</div>')
				}
				else if(respuesta == 1){
					$("#imgSlide").before('<div class="alert alert-warning alerta text-center">Ups! no se a subido tu imagen, intenta lo de nuevo, por favor!</div>')
				}
				else{

					$("#lightbox").css({"height":"auto"});
					$("#lightbox").append('<li class="bloqueSlide"><span class="fa fa-times eliminarSlide"></span><img src="'+respuesta["ruta"].substring(6)+'" class="handleImg"></li>');


					swal({
		                title: "Ok!",
		                text: "Ìmagen guardada.",
		                icon: "success",
		                type: "success",
		                timer: 1400,
		                buttons: false
					}).then(function () {
						window.location = "galeria";
					});
				}
			}
		});
	}
});

$(".eliminarImagen").click(function(){
	swal({
	  title: "Quieres eliminar esta imagen?",
	  text: "Una vez borrada, no podras recuperar tu archivo!",
	  icon: "warning",
	  buttons: true,
	  dangerMode: true,
	})
	.then((willDelete) => {
	  if (willDelete) {

	  	if($(".eliminarImagen").length == 1){

			$("#lightbox").css({"height":"100px"});

		}

		var imagenId = $(this).parent().attr("id");
		var ruta = $(this).attr("ruta");

		$(this).parent().remove();
		$("#"+imagenId).remove();

		borrarItem = {
			"imagenId": imagenId,
			"ruta": ruta
		};

		$.ajax({
			url:"views/ajax/galeriaAjax.php",
			method: "POST",
			data: borrarItem,
			success: function(respuesta){
				//console.log('respuesta', respuesta);
				if (respuesta == "ok") {
					swal("Poof! tu imagen ha sido elminada!", {
					    icon: "success",
					    timer: 1400,
					    buttons: false,
				    });
				}
			}

		});

	  }
	});


});


/*=============================================
Ordenar Item Slide
=============================================*/

var almacenarOrdenId = new Array();
var ordenItem = new Array();


$("#ordenarImagenes").click(function(){
	//e.preventDefault();
	//e.stopPropagation();
	$("#ordenarImagenes").hide();
	$("#guardarOrden").show();
	//$("a").hide();

	data = {
			"funcion": "muestraArticulosOrdenar",
		};
	$.ajax({
		url:"views/ajax/galeriaAjax.php",
		method: "POST",
		data: data,
		success: function(respuesta){
			//console.log(respuesta);
			//var info = $.parseJSON(respuesta);
			$("#lightbox").html(respuesta);

			$("#lightbox").css({"cursor":"move"});
			$("#lightbox span").hide();

			$("#lightbox").sortable({
			revert: true,
			connectWith: ".bloqueSlide",
			handle: ".handleImg",
			stop: function(event){

				for(var i= 0; i < $("#lightbox li").length; i++){

					almacenarOrdenId[i] = event.target.children[i].id;
					ordenItem[i]  =  i+1;

				}

			}

		});
		}

	});

});

$("#guardarOrden").click(function(){

	$("#ordenarImagenes").show();
	$("#guardarOrden").hide();

	for(var i= 0; i < $("#lightbox li").length; i++){

		var actualizarOrden = new FormData();
		actualizarOrden.append("actualizarOrdenId", almacenarOrdenId[i]);
		actualizarOrden.append("actualizarOrdenItem", ordenItem[i]);
		//console.log(actualizarOrden);

		$.ajax({

			url:"views/ajax/galeriaAjax.php",
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
					//window.location = "galeria";
					$("#lightbox span").show();
				});


			}

		})

	}

})

/*=====  Ordenar Item Slide  ======*/