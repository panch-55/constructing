/*=============================================
Área de arrastre de imágenes
=============================================*/

if($("#columnasSlide").html() == 0){

	$("#columnasSlide").css({"height":"100px"});

}

else{

	$("#columnasSlide").css({"height":"auto"});

}

/*=====  Área de arrastre de imágenes  ======*/

/*=============================================
Subir Imagen
=============================================*/
$("#addNewSlide").fileinput({
	uploadExtraData: {
			'funcionAjax': 'guardaImagenSlide',
        },
	uploadUrl: "views/ajax/gestorSlideAjax.php",
}).on('fileuploaded', function(respuesta) {
        console.log('respuesta',respuesta);
});

$("#addNewSlide").fileinput({
        uploadUrl: "views/ajax/gestorSlideAjax.php",
        enableResumableUpload: true,
        resumableUploadOptions: {
           // uncomment below if you wish to test the file for previous partial uploaded chunks
           // to the server and resume uploads from that point afterwards
           // testUrl: "http://localhost/test-upload.php"
        },
        uploadExtraData: {
			'funcionAjax': 'guardaImagensSlide',
        },
        maxFileCount: 5,
        allowedFileTypes: ['image'],    // allow only images
        showCancel: true,
        initialPreviewAsData: true,
        overwriteInitial: false,
        // initialPreview: [],          // if you have previously uploaded preview files
        // initialPreviewConfig: [],    // if you have previously uploaded preview files
        theme: 'fas',
        deleteUrl: "views/ajax/file-delete.php"
    }).on('fileuploaded', function(event, previewId, index, fileId) {
        console.log('File Uploaded', 'ID: ' + fileId + ', Thumb ID: ' + previewId);
    }).on('fileuploaderror', function(event, data, msg) {
        console.log('File Upload Error', 'ID: ' + data.fileId + ', Thumb ID: ' + data.previewId);
    }).on('filebatchuploadcomplete', function(event, preview, config, tags, extraData) {
        console.log('File Batch Uploaded', preview, config, tags, extraData);
    });

$("#columnasSlide").on("dragover", function(e){

	e.preventDefault();
	e.stopPropagation();

	$("#columnasSlide").css({"background":"url(views/images/pattern.jpg)"})

})

/*=====  Subir Imagen  ======*/
/*=============================================
Soltar Imagen
=============================================*/

$("#columnasSlide").on("drop", function(e){

	e.preventDefault();
	e.stopPropagation();

	$("#columnasSlide").css({"background":"white"})

	var archivo = e.originalEvent.dataTransfer.files;
	var imagen = archivo[0];

	// Validar tamaño de la imagen
	var imagenSize = imagen.size;
	//console.log(imagenSize);

	if(Number(imagenSize) > 4000000){
		$("#columnasSlide").before('<div class="alert alert-warning alerta text-center">El archivo excede el peso permitido, 200kb</div>')
	}else{
		$(".alerta").remove();
	}

	// Validar tipo de la imagen
	var imagenType = imagen.type;

	if(imagenType == "image/jpeg" || imagenType == "image/png" ){
		$(".alerta").remove();
	}else{
		$("#columnasSlide").before('<div class="alert alert-warning alerta text-center">El archivo debe ser formato JPG o PNG</div>')
	}

	//Subir imagen al servidor
	if(imagenType == "image/jpeg" || imagenType == "image/png" || imagenType == "image/jpg"){

		var datos = new FormData();

		datos.append("imagen", imagen);

		$.ajax({
			url:"views/ajax/gestorSlideAjax.php",
			method: "POST",
			data: datos,
			//cache: false,
			contentType: false,
			processData: false,
			//dataType:"json",
			beforeSend: function(){

				$("#columnasSlide").before('<img src="views/images/status.gif" id="status">');

			},
			success: function(respuesta){
				//console.log('respuesta',respuesta);
				var info = $.parseJSON(respuesta);
				console.log(info);
				$("#status").remove();

				if(respuesta == 0){
					$("#columnasSlide").before('<div class="alert alert-warning alerta text-center">La imagen es inferior a 1600px * 600px</div>')
				}
				else{

					$("#columnasSlide").css({"height":"auto"});
					$("#columnasSlide").append('<li class="bloqueSlide"><span class="fa fa-times eliminarSlide"></span><img src="'+info['ruta'].substring(6)+'" class="handleImg"></li>');

					//console.log(respuesta[0]["ruta"]);
					$("#ordenarTextSlide").append('<li><span class="fa fa-pencil" style="background:blue"></span><img src="'+info["ruta"].substring(6)+'" style="float:left; margin-bottom:10px" width="80%"><h1>'+info["titulo"]+'</h1><p>'+info["descripcion"]+'</p></li>');

					swal({
		                title: "Ok!",
		                text: "Ìmagen guardada.",
		                icon: "success",
		                type: "success",
		                timer: 1400,
		                buttons: false
					}).then(function () {
						//window.location = "slide";
					});
				}
			}
		});
	}
});
/*=====  Soltar Imagen  ======*/

/*=============================================
Eliminar Item Slide
=============================================*/
$(document).on("click", '.eliminarSlide', function() {
//$(".eliminarSlide").click(function(){
	swal({
	  title: "Quieres eliminar esta imagen?",
	  text: "Una vez borrada, no podras recuperar tu archivo!",
	  icon: "warning",
	  buttons: true,
	  dangerMode: true,
	})
	.then((willDelete) => {
	  if (willDelete) {

	  	if($(".eliminarSlide").length == 1){

		$("#columnasSlide").css({"height":"100px"});

		}

		idSlide = $(this).parent().attr("id");
		rutaSlide = $(this).attr("ruta");

		$(this).parent().remove();
		$("#item"+idSlide).remove();

		borrarItem = {
			"slideid": idSlide,
			"rutaSlide": rutaSlide
		};

		$.ajax({
			url:"views/ajax/gestorSlideAjax.php",
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


/*=====  Eliminar Item Slide  ======*/

/*=============================================
Editar Item Slide
=============================================*/

$(".editarSlide").click(function(){

	idSlide = $(this).parent().attr("id");
	rutaImagen = $(this).parent().children("img").attr("src");
	rutaTitulo = $(this).parent().children("h1").html();
	rutaDescripcion = $(this).parent().children("p").html();

	$(this).parent().html('<img src="'+rutaImagen+'" class="img-thumbnail"><input type="text" class="form-control" id="enviarTitulo" placeholder="Título" value="'+rutaTitulo+'"><textarea row="5" id="enviarDescripcion" class="form-control" placeholder="Descripción">'+rutaDescripcion+'</textarea><button class="btn btn-info pull-right" id="guardar'+idSlide+'" style="margin:10px">Guardar</button>');

	$("#guardar"+idSlide).click(function(){

		actualizarId = idSlide.substring(4);
		//alert(actualizarId);
		enviarTitulo = $("#enviarTitulo").val();
		enviarDescripcion = $("#enviarDescripcion").val();

		/*var actualizarSlide = new FormData();

		actualizarSlide.append("actualizarId",actualizarId);
		actualizarSlide.append("enviarTitulo",enviarTitulo);
		actualizarSlide.append("enviarDescripcion",enviarDescripcion);
		*/
		actualizarSlide = {
			"actualizarId":actualizarId,
			"enviarTitulo":enviarTitulo,
			"enviarDescripcion":enviarDescripcion,
		};
		$.ajax({
			url:"views/ajax/gestorSlideAjax.php",
			method: "POST",
			data: actualizarSlide,
			success: function(respuesta){

				$("#guardar"+idSlide).parent().html('<span class="fa fa-pencil editarSlide" style="background:blue"></span><img src="'+rutaImagen+'" style="float:left; margin-bottom:10px" width="80%"><h1>'+respuesta["titulo"]+'</h1><p>'+respuesta["descripcion"]+'</p>');

				swal({
					title: "¡Ok!",
		            text: "Detalle actualizado con exito!",
	                icon: "success",
	                timer: 1300,
	                buttons:false,
				}).then(function () {
					window.location = "slide";
				});
				//window.location = "slide";

			}

		});

	});

});

/*=====  Editar  Item Slide  ======*/

/*=============================================
Ordenar Item Slide
=============================================*/

var almacenarOrdenId = new Array();
var ordenItem = new Array();

$("#ordenarSlide").click(function(){

	$("#ordenarSlide").hide();
	$("#guardarSlide").show();

	$("#columnasSlide").css({"cursor":"move"})
	$("#columnasSlide span").hide()

	$("#columnasSlide").sortable({
		revert: true,
		connectWith: ".bloqueSlide",
		handle: ".handleImg",
		stop: function(event){

			for(var i= 0; i < $("#columnasSlide li").length; i++){

				almacenarOrdenId[i] = event.target.children[i].id;
				ordenItem[i]  =  i+1;

			}

		}

	});

});

$("#guardarSlide").click(function(){

	$("#ordenarSlide").show();
	$("#guardarSlide").hide();

	for(var i= 0; i < $("#columnasSlide li").length; i++){

		var actualizarOrden = new FormData();
		actualizarOrden.append("actualizarOrdenId", almacenarOrdenId[i]);
		actualizarOrden.append("actualizarOrdenItem", ordenItem[i]);
		//console.log(actualizarOrden);

		$.ajax({

			url:"views/ajax/gestorSlideAjax.php",
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
					window.location = "slide";
				});


			}

		});

	}

})

/*=====  Ordenar Item Slide  ======*/





