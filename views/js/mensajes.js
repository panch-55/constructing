function validarMensaje() {
	var nombre = $("#nombre").val();
	var email = $("#email").val();
	var mensaje = $("#mensaje").val();
	var validar = false;
	var errorMsj;
	if (nombre != "") {
		//var longitud = nombre.length;+ç
		var expresionPrueba = /^[a-zA-ZÀ-ÿ\u00f1\u00d1\.\,]+(\s*[a-zA-ZÀ-ÿ\u00f1\u00d1]*)*[a-zA-ZÀ-ÿ\u00f1\u00d1]+$/;
		var expresion = /^[a-zA-Z0-9\u00f1\u00d1\.\,]*$/;
		if (!expresionPrueba.test(nombre)) {
			$("#errorNombre").html('<div class="alert alert-warning">El nombre no permite numeros ni caracteres especiales</div>');
			validar = false;
		}else{
			$("#errorNombre").html('');
			validar = true
		}
	}else{
		$("#errorNombre").html('<br><div class="alert alert-danger">Este campo no puede ir vacio</div>');
		validar = false
	}
	if (email != "") {
		var expresionEmail = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9])+\.)+([a-zA-Z]{2,4})+$/;
		if (!expresionEmail.test(email)) {
			$("#errorEmail").html('<br><div class="alert alert-warning">El formato del corroe no es correcto, introduce un correo valido por favor</div>');
			validar = false;
		} else {
			$("#errorEmail").html('');
			validar = true;
		}
	} else {
		$("#errorEmail").html('<br><div class="alert alert-danger">Este campo no puede ir vacio</div>');
		validar = false;
	}
	if($("#mensaje").val() != "") {
		var expresionMsj = /^[a-zA-Z0-9\s\u00f1\u00d1\.\,]*$/;
		if (!expresionMsj.test(mensaje)) {
			$("#errorMsj").html('<br><div class="alert alert-warning">No se permiten caracteres especiales</div>');
			validar = false;
		}else{
			$("#errorMsj").html('');
			validar = true;
		}
	}else{
		$("#errorMsj").html('<br><div class="alert alert-danger">Este campo no puede ir vacio</div>');
		validar = false;
	}
	return validar;
}

$("#enviar").click(function(){
	if (validarMensaje()) {
		var nombre = $("#nombre").val();
		var email = $("#email").val();
		var mensaje = $("#mensaje").val();
		data = {
			"funcion": "saveMensaje",
			"nombre": nombre,
			"email": email,
			"mensaje":mensaje,
		};

		$.ajax({
			url:"views/ajax/mensajesAjax.php",
			method: "POST",
			data: data,
			success: function(respuesta){
				console.log('respuesta', respuesta);
				if (respuesta == "ok") {
					swal({
			                title: "Ok!",
			                text: "Mensaje enviodo con exito.",
			                icon: "success",
			                timer: 1400,
			                buttons: false
						}).then(function () {
							window.location = "index.php";
						});
				} else {
					swal({
			                title: "Ups!",
			                text: "Algo a salido mal, intenta lo de nuevo por favor.",
			                icon: "warning",
			                timer: 1400,
			                buttons: false
						}).then(function () {
							window.location = "index.php";
						});
				}
			}

		});
	} else {
		validarMensaje();
	}
});
