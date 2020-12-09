
if($("#galeriaVideo").html() == 0){
	$("#galeriaVideo").css({"height":"100px"});
}
else{
	$("#galeriaVideo").css({"height":"auto"});
}

$("#subirVideo").click(function(){
	var video = fileVideo.files[0];
	var videoSize = video.size;
	//104857600
	if (Number(videoSize) > 104857600) {
		var msj = '<div class="alert alert-warning">El vieo no puede pesar mas de 100MB</div>';
		$("#mensaje").html(msj);
	}else{
		var subirVideo = new FormData();
		subirVideo.append("funcion", "subirVideo");
		subirVideo.append("video", video);

		$.ajax({
			url:"views/ajax/videosAjax.php",
			method: "POST",
			data: subirVideo,
			contentType: false,
			processData: false,
			success: function(respuesta){
				//console.log('respuesta', respuesta);
				//var info = $.parseJSON(respuesta);
				//console.log(info);
				swal({
		                title: "Ok!",
		                text: "datos guardados exitosamente.",
		                icon: "success",
		                timer: 1400,
		                buttons: false
					}).then(function () {
						$("#galeriaVideo").append(respuesta);
						$("#galeriaVideo").css({"height":"auto"});
					});
			}

		});
	}
});

$(document).on("click",".eliminarVideo", function(){
	var videoId = $(this).parent().attr('id');
	var ruta = $(this).attr('ruta');
	//alert(videoId+"---"+ruta);
	data = {
		"funcion": "eliminarVideo",
		"videoId": videoId,
		"ruta": ruta,
	};
	swal({
	  title: "Quieres eliminar este video?",
	  text: "Una vez borrada, no podras recuperar lo!",
	  icon: "warning",
	  buttons: true,
	  dangerMode: true,
	})
	.then((willDelete) => {
	  if (willDelete) {

		$.ajax({
			url:"views/ajax/videosAjax.php",
			method: "POST",
			data: data,
			success: function(respuesta){
				console.log('respuesta', respuesta);
				//var info = $.parseJSON(respuesta);
				//console.log(info);
				if (respuesta == "ok") {
					swal({
			                title: "Ok!",
			                text: "datos guardados exitosamente.",
			                icon: "success",
			                timer: 1400,
			                buttons: false
						}).then(function () {
							$("#"+videoId).remove();
							//$("#galeriaVideo").css({"height":"auto"});
						});
				}
			}

		});

	  }
	});


});
var ordenVideosId = new Array();
var ordenItem = [];
$("#editarOrdenVideos").click(function(){
	$("#guardarOrdenVideos").show();
	$("#editarOrdenVideos").hide();

	$("#galeriaVideo").css({"cursor":"move"})
	$("#galeriaVideo span").hide();

	$("#galeriaVideo").sortable({
		revert: true,
		connectWith: ".bloqueVideo",
		handle: ".handleVideo",
		stop: function(event){

			for(var i= 0; i < $("#galeriaVideo li").length; i++){

				ordenVideosId[i] = event.target.children[i].id;
				ordenItem[i]  =  i+1;

			}

		}

	});

});
$("#guardarOrdenVideos").click(function(){
	$("#guardarOrdenVideos").hide();
	$("#editarOrdenVideos").show();

	for(var i= 0; i < $("#galeriaVideo li").length; i++){

		var actualizarOrden = {
			"funcion": "actualizarOrden",
			"ordenVideoId": ordenVideosId[i],
			"ordenItemId": ordenItem[i]
			};

		$.ajax({
			url:"views/ajax/videosAjax.php",
			method: "POST",
			data: actualizarOrden,
			success: function(respuesta){
				swal({
	                title: "Ok!",
	                text: "datos guardados exitosamente.",
	                icon: "success",
	                timer: 1400,
	                buttons: false
				}).then(function () {
					//$("#"+videoId).remove();
					//$("#galeriaVideo").css({"height":"auto"});
					$("#galeriaVideo span").show();
				});
			}
		});
	}

});