$(document).on("click", '#quitarSuscriptor', function() {
	swal({
	  title: "Quieres eliminar este registro?",
	  text: "Una vez borrado, no podras recuperar sus datos!",
	  icon: "warning",
	  buttons: true,
	  dangerMode: true,
	})
	.then((willDelete) => {
	 	if (willDelete) {
			var id = $(this).parent().attr('id');
			var data = {
				"funcion": "deleteSuscriptor",
				"id": id,
			};
			$.ajax({
				url:"views/ajax/suscriptoresAjax.php",
				method: "POST",
				data: data,
				success: function(respuesta){
					if (respuesta == "ok") {
						swal({
		                title: "Ok!",
		                text: "datos borrados exitosamente.",
		                icon: "success",
		                timer: 1400,
		                buttons: false
					}).then(function () {
						window.location = "suscriptores";
					});
					}
				}
			});
	}
});
});