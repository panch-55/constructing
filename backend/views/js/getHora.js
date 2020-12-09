function getHora(){

	param = {
		"funcionAjax": "getHoraActual",
	};

	$.ajax({
			url:"views/ajax/fechaHoraAjax.php",
			data:param,
            type:  'post',
			success: function(respuesta){
				$("#time").html(respuesta);
			}

		});

}
setInterval(getHora, 1000);