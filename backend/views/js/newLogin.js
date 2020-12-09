
$("#userName").blur(function(){
    var userName = $("#userName").val();
    if (validaNombre(userName) == false) {
    	$("#errorName").show();
    	//$("#userName").focus();
    }else{
    	$("#errorName").hide();
    }
});

$("#pass").blur(function(){
	var pass = $("#pass").val();
    if (validaNombre(pass) == false) {
    	$("#errorPass").show();
    	//$("#userName").focus();
    }else{
    	$("#errorPass").hide();
    }
});
$("#repeatPass").blur(function(){
	var repeatPass = $("#repeatPass").val();
    if (repeatPass != "") {
    	var pass = $("#pass").val();
    	if (pass != repeatPass) {
    		$("#errorPassDiferentes").show();
    	}else{
    		$("#errorPassDiferentes").hide();
    	}
    	$("#errorPassRepeat").hide();
    }else{
    	$("#errorPassRepeat").show();
    }
});
$("#guardarNuevoLogin").click(function(){
	var userName = $("#userName").val();
	var email = $("#email").val();
	var pass = $("#pass").val();
	var repeatPass = $("#repeatPass").val();
	if (userName == "" ) {
		$("#errorName").show();
    	$("#userName").focus();
	}
	else if (pass == "" ) {
		$("#errorPass").show();
    	$("#pass").focus();
	}
	else if (repeatPass == "" ) {
		$("#errorPassRepeat").show();
    	$("#repeatPass").focus();
	}
	if (userName != "" && pass != "" && repeatPass != "" && pass == repeatPass) {
		var newLogin = new FormData();
		newLogin.append("funcionAjax","guardaUsuario");
		newLogin.append("userName",userName);
		newLogin.append("email",email);
		newLogin.append("pass",pass);
		if ($("#imagenPerfil").val() != "") {
			var file = $('#imagenPerfil')[0].files[0];
			newLogin.append("image",file);
		}else{
			newLogin.append("image","sin imagen");
		}

		$.ajax({
			url:"views/ajax/ingresosAjax.php",
			method: "POST",
			data: newLogin,
			contentType: false,
			processData: false,
			beforeSend: function(){
				//$("#columnasSlide").before('<img src="views/images/status.gif" id="status">');
			},
			success: function(respuesta){
				console.log("respuesta",respuesta);
			}

		});
	}
});

function validaNombre(name){
	 var expresion = /^[a-zA-Z0-9]*$/;
    var validar = true;
    if (name == "") {
		validar = false
	}
	if (!expresion.test(name)) {
		validar = false;
	}
   	return validar;
};

$(document).on("click",".editarPefil",function(){
	var userId =$(this).parent().parent().find("td:eq(1)").text();
	param = {
		"funcionAjax":"actulizaUsuario",
		"userId": userId,
	};

	$.ajax({
		url:"views/ajax/ingresosAjax.php",
		method: "POST",
		data:param,
		beforeSend: function(){
			$hasClass = $("#editaPerfilBody").hasClass("modal-lg");
			if ($hasClass) {
				$("#editarPerfilModal").modal("show");
			} else {
				$("#editaPerfilBody").addClass("modal-lg");
				$("#editarPerfilModal").modal("show");
			}
			$("#bodyModalActualizaUsuario").before('<img src="views/images/status.gif" id="status">');
		},
		success: function(respuesta){
			//console.log("respuesta",respuesta);
			$("#status").remove();
			$("#botones").html('<button id="btnUpdatePerfil" type="button" class="btn btn-primary">Guardar</button>');
			$("#bodyModalActualizaUsuario").html(respuesta);
		}
	});

});
$(document).on("click","#btnUpdatePerfil",function(){
	var userName = $("#userNameUpdate").val();
    if (validaNombre(userName) == false) {
    	$("#errorName").show();
    	//$("#userName").focus();
    }else{
    	$("#errorName").hide();
    	var userId = $("#userId").val();
    	var email =  $("#emailUpdate").val();
    	var perfilId =  $("#perfilIdUpdate").val();
    	param = {
    		"funcionAjax":"updatePerfilAjax",
    		"userId":userId,
    		"userName":userName,
    		"email":email,
    		"perfilId":perfilId,
    	};
    	$.ajax({
		url:"views/ajax/usersAjax.php",
		method: "POST",
		data:param,
		beforeSend: function(){
			//$("#editarPerfilModal").modal("show");
			$("#bodyModalActualizaUsuario").before('<img src="views/images/status.gif" id="status">');
		},
		success: function(respuesta){
			//console.log("respuesta",respuesta);
			$("#status").remove();
			$("#editarPerfilModal").modal("hide");
			swal({
                title: "Ok!",
                text: "datos guardados exitosamente.",
                icon: "success",
                timer: 1400,
                buttons: false
			}).then(function () {
				window.location = "perfil";
			});
		}
	});
    }
});
/*********************************************/
/************* Edita nombre ******************/
/*********************************************/
$(document).on("click",".editaUserName",function(){
	var user = $(".spanUserName").html();
	$("#editarPerfilModal").modal("show");
	$("#editaPerfilBody").removeClass("modal-lg");
	$("#bodyModalActualizaUsuario").html('<lable for="userNameEdit">Nombre de usuario</lable><input type="text" id="userNameEdit" required="" class="form-control">');
	$("#userNameEdit").val(user);
	$("#botones").html('<button id="btnUpdateUserName" type="button" class="btn btn-primary">Guardar Nombre</button>');
});

$(document).on("click","#btnUpdateUserName",function(){
    var userName = $("#userNameEdit").val();
	if (validaNombre(userName)) {
		var userId = $("#userIdlog").val();
    	param = {
    		"funcionAjax":"updateUserNameAjax",
    		"userId":userId,
    		"userName":userName,
    	};
    	$.ajax({
		url:"views/ajax/usersAjax.php",
		method: "POST",
		data:param,
		beforeSend: function(){
			$("#bodyModalActualizaUsuario").before('<img src="views/images/status.gif" id="status">');
		},
		success: function(respuesta){
			//console.log("respuesta",respuesta);
			$("#status").remove();
			$("#editarPerfilModal").modal("hide");
			if (respuesta == "ok") {
				swal({
	                title: "Ok!",
	                text: "datos guardados exitosamente.",
	                icon: "success",
	                timer: 1400,
	                buttons: false
				}).then(function () {
					$(".spanUserName").html(userName);
				});
			} else {
				swal({
	                title: "Ups!",
	                text: "Algo ha salido mal, intenta lo de nuevo por favor.",
	                icon: "warning",
	                timer: 1400,
	                buttons: false
				});
			}
		}
	});
	}else{
		swal({
            	title: "Error!",
                text: "Este campo no puede ir vacio, ni contener espacios y caracteres especialesa.",
                icon: "warning",
                timer: 1400,
                buttons: false
			}).then(function () {
				$("#userNameEdit").focus();
			});
	}
});
/*********************************************/
/************ Fin Edita nombre ***************/
/*********************************************/

/*********************************************/
/************* Edita foto ********************/
/*********************************************/

$(document).on("click",".editaPhoto",function(){

	$("#editarPerfilModal").modal("show");
	$("#editaPerfilBody").removeClass("modal-lg");
	$("#bodyModalActualizaUsuario").html('<input id="userImg" type="file" name="userImgFile" class="file" data-browse-on-zone-click="true">');
	var userId = $("#userIdlog").val();

	$("#userImg").fileinput({
		uploadExtraData:{userId: userId},
		uploadUrl: "views/ajax/subirImagen.php",
	}).on('fileuploaded', function(respuesta) {
        console.log('respuesta',respuesta);
        window.location = "perfil";
	});

});

/*********************************************/
/************ fin editar foto ****************/
/*********************************************/

/*********************************************/
/************* Edita Email *******************/
/*********************************************/

$(document).on("click",".editaEmail",function(){
	var userId = $("#userIdlog").val();
    param = {
    		"funcionAjax":"cargaUpdateEmail",
    		"userId":userId,
    	};
 $.ajax({
		url:"views/ajax/usersAjax.php",
		method: "POST",
		data:param,
		beforeSend: function(){
			$("#editarPerfilModal").modal("show");
			$("#bodyModalActualizaUsuario").before('<img src="views/images/status.gif" id="status">');
		},
		success: function(respuesta){
			//console.log("respuesta",respuesta);
			$("#status").remove();
			$("#editaPerfilBody").removeClass("modal-lg");
			$("#botones").html('<button id="btnUpdateEmail" type="button" class="btn btn-primary">Guardar Email</button>');
			$("#bodyModalActualizaUsuario").html(respuesta);
			//$("#editarPerfilModal").modal("hide");

		}
	});
});
$(document).on("click","#btnUpdateEmail",function(){
	var email = $("#emailUpdate").val();
    if (email == "") {
    	swal({
                title: "Error!",
                text: "No hay ningun correo para guardar.",
                icon: "warning",
                timer: 1400,
                buttons: false,
			});
    }else{
    	$("#errorName").hide();
    	var userId = $("#userIdlog").val();
    	var email =  $("#emailUpdate").val();
    	param = {
    		"funcionAjax":"updateEmailAjax",
    		"userId":userId,
    		"email":email,
    	};
    	$.ajax({
		url:"views/ajax/usersAjax.php",
		method: "POST",
		data:param,
		beforeSend: function(){
			$("#bodyModalActualizaUsuario").before('<img src="views/images/status.gif" id="status">');
		},
		success: function(respuesta){
			console.log("respuesta",respuesta);
			$("#status").remove();
			$("#editarPerfilModal").modal("hide");
			swal({
                title: "Ok!",
                text: "datos guardados exitosamente.",
                icon: "success",
                timer: 1400,
                buttons: false
			}).then(function () {
				$(".email").html(email);
			});
		}
	});
    }
});

/*********************************************/
/************* Fin Edita Email ***************/
/*********************************************/

$(document).on("click",".editaPefil",function(){
	alert("hola");
});

$(document).on("click",".editaPassword",function(){

	$("#editarPerfilModal").modal("show");
	$("#editaPerfilBody").removeClass("modal-lg");
	$("#bodyModalActualizaUsuario").html('<lable for="actualPass">Escribe la contraseña actual</lable><input type="password" id="actualPass" required="" class="form-control mb-4" autocomplete="off"><div id="errorValidPass" class="invalid-feedback">La contraseña no es correcta</div><lable for="newPass">Escribe la nueva contraseña</lable><input type="password" id="newPass" required="" class="form-control" disabled=""><div id="errorNewPass" class="invalid-feedback">Este campo no puede ir vacio</div><lable for="newPassReapet">Repite la nueva contraseña</lable><input type="password" id="newPassReapet" required="" class="form-control" disabled=""><div id="errorPassRep" class="invalid-feedback">Este campo no puede ir vacio</div>');

	$("#actualPass").keypress(function(e) {
        //no recuerdo la fuente pero lo recomiendan para
        //mayor compatibilidad entre navegadores.
        var code = (e.keyCode ? e.keyCode : e.which);
        if(code==13){

		var userId = $("#userIdlog").val();
		var actualPass = $("#actualPass").val();
		params = {
			"funcionAjax": "validaPassAjax",
			"userId":userId,
			"password": actualPass,
		};
		$.ajax({
			url: "views/ajax/usersAjax.php",
			data: params,
			method: "POST",
			success: function(respuesta){
				//console.log("respuesta:",respuesta);
				if (respuesta == "ok") {
					$("#newPass").removeAttr("disabled").focus();
					$("#newPassReapet").removeAttr("disabled");
					$("#errorValidPass").hide();
					$("#botones").html('<button id="btnSaveNewPass" type="button" class="btn btn-primary">Guardar</button>');
				} else {
					$("#errorValidPass").show();
					$("#newPass").attr("disabled","true").val("");
					$("#newPassReapet").attr("disabled","true").val("");
				}
			}
		});
		}
	});
});

$(document).on("click","#btnSaveNewPass",function(){
	var newPass = $("#newPass").val();
	var newPassReapet = $("#newPassReapet").val();
	var erorrs="";
	if (newPass == "") {
		$("#errorNewPass").show();
    	$("#newPass").focus();
	}
	else if (newPassReapet == "" ) {
		$("#errorPassRep").show();
    	$("#newPassReapet").focus();
	}
	if (newPass == newPassReapet) {
		var userId = $("#userIdlog").val();
		params = {
			"funcionAjax": "updatePassAjax",
			"userId":userId,
			"password": newPass,
		};
		$.ajax({
			url: "views/ajax/usersAjax.php",
			data: params,
			method: "POST",
			success: function(respuesta){
				//console.log("respuesta:",respuesta);
				if (respuesta == "ok") {
					swal({
			            title: "Ok!",
			            text: "contraseña actualizada",
			            icon: "success",
			            timer: 1400,
			            buttons: false,
					}).then(function () {
						$("#editarPerfilModal").modal("hide");
					});
				} else {
					swal({
			            title: "Ups!",
			            text: "Algo salio mal, intenta lo de nuevo porfavor.",
			            icon: "warning",
			            timer: 1400,
			            buttons: false,
					}).then(function () {
						$("#editarPerfilModal").modal("hide");
					});
				}
			}
		});
	} else {
		swal({
            title: "Ups!",
            text: "Las contraseñas no son iguales, verificalas porfavor.",
            icon: "warning",
            timer: 1400,
            buttons: false,
		}).then(function () {
				$(".email").html(email);
		});
	}

});