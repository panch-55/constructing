$(document).on("click", '#leerMensaje', function() {
	var mensajeId = $(this).parent().parent().attr("id");
	$("#mensajes").hide();
	var param = {
		"funcion": "cargaMensaje",
		"mensajeId": mensajeId,
	};
	$.ajax({
			url:"views/ajax/mensajesAjax.php",
			data: param,
            type:  'post',
			success: function(respuesta){
				//$("#exampleModal").modal('show');//ocultamos el modal
				$("#lecturaMensajes").html(respuesta);
			}

		});
});
$(document).on("click", '.closeMsj', function(){
//$(".closeMsj").click(function(){
	window.location = "mensajes";
	//$(this).parent().remove();
	//$("#mensajes").show();
});
$(document).on("click", '#responderMsj', function(){
//$("#responderMsj").click(function(){
	var enviarEmail = $(this).parent().children("h5").html();
	var enviarNombre = $(this).parent().children("h3").html();
	$("#content").html('<div class=""><hr><button id="sendEmailToAll" class="btn btn-success">Enviar mensaje a todos los usuarios</button><hr></div><form action=""><p id="para">Para: <input type="email" name="email" id="email" readonly="" value="'+enviarEmail.substring(7)+'" style="border:0px;" class="form-control">Nombre: <input type="text" id="nombre" value="'+enviarNombre.substring(4)+'" style="border: 0px" readonly=""></p><input type="text" id="tituloMsj" placeholder="Título del Mensaje" class="form-control mb-3"><textarea name="" id="mensaje" cols="30" rows="5" placeholder="Escribe tu mensaje..." class="form-control"></textarea><input type="button" class="form-control btn btn-primary mt-3" id="enviarCorreo" value="Enviar"></form></div>');
});
$(document).on("click", '#enviarCorreo', function(){

	var email = $("#email").val();
	var titulo = $("#tituloMsj").val();
	var mensaje = $("#mensaje").val();
	var nombre = $("#nombre").val();
	if (titulo != "" && mensaje != "") {
		data = {
			"funcion": "enviarCorreo",
			"email": email,
			"titulo": titulo,
			"mensaje": mensaje,
			"nombre": nombre
		};
		$.ajax({
				url:"views/ajax/mensajesAjax.php",
				data: data,
	            type:  'post',
				success: function(result){
					//console.log(result);
					if (result) {
						swal({
			                title: "Good job!",
			                text: "El correo a sido enviado.",
			                icon: "success",
			                timer: 1400,
			                buttons: false
						}).then(function () {

						});
					} else {

					}
				}

			});
		} else {
			swal({
                title: "Ups!",
                text: "El titulo y el mensaje no puden ir vacios.",
                icon: "warning",
                timer: 1400,
                buttons: false
			}).then(function () {
				if (titulo == "") {
				$("#tituloMsj").focus();
				}else{
					if(mensaje == "") {
						$("#mensaje").focus();
					}
				}
			});
			//alert("titulo y mensaje son cmapos obligatorios");

		}

});
$(document).on("click", '#sendEmailToAll', function(){
	var titulo = $("#tituloMsj").val();
	var mensaje = $("#mensaje").val();
	if (titulo != "" && mensaje != "") {
		data = {
			"funcion": "sendToAll",
			"titulo": titulo,
			"mensaje": mensaje,
		};
		$.ajax({
				url:"views/ajax/mensajesAjax.php",
				data: data,
	            type:  'post',
				success: function(result){
					//console.log(result);
					if (result) {
						swal({
			                title: "Good job!",
			                text: "El correo a sido enviado a todos.",
			                icon: "success",
			                timer: 1400,
			                buttons: false
						}).then(function () {

						});
					} else {

					}
				}

			});
		} else {
			swal({
                title: "Ups!",
                text: "El titulo y el mensaje no puden ir vacios.",
                icon: "warning",
                timer: 1400,
                buttons: false
			}).then(function () {
				if (titulo == "") {
				$("#tituloMsj").focus();
				}else{
					if(mensaje == "") {
						$("#mensaje").focus();
					}
				}
			});
			//alert("titulo y mensaje son cmapos obligatorios");

		}
});
