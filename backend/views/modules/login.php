
<div class="row" id="">

	<form method="post" id="formIngreso" onsubmit="return validarIngreso()">

		<h1 id="tituloFormIngreso">INGRESO AL PANEL DE CONTROL</h1>

		<input class="form-control formIngreso" type="text" placeholder="Ingrese su Usuario" name="usuarioIngreso">
		<input class="form-control formIngreso" type="password" placeholder="Ingrese su Contraseña" name="passwordIngreso">
		<?php
			$ingreso = new ingresosController();
			$ingreso->ingreso();
		?>
		<input class="form-control formIngreso btn btn-primary" type="submit" value="Enviar">

	</form>

</div>
