$(".leerMas").click(function() {
    var id = $(this).attr("id"); 
    data = {
        "funcionAjax": "getArticulo",
        "articuloId": id,
    }
    $.ajax({
        url: "views/ajax/articulosAjax.php",
        method: "POST",
        data: data,
        success: function(respuesta){
            
            var info = $.parseJSON(respuesta);
            
            var rutaImg = "backend/" + info['ruta'];
            $(".articuloTitulo").html(info["titulo"]);
            $("#articuloImg").html('<img src="'+rutaImg+'" class="img-thumbnail mx-auto d-block">');
            $("#articuloContent").html('<p>'+info["contenido"]+'</p>');

        }
    });
});