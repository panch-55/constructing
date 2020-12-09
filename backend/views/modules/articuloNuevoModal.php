
<form method="post" enctype="multipart/form-data">
	<input type="text" id="titulo" placeholder="Título del Artículo" class="form-control">

	<textarea id="intro" cols="30" rows="2" placeholder="Introducción del Articulo" class="form-control"></textarea>

	<input type="file" name="imagen" class="btn btn-default" id="subirFoto" required>

	<p>Tamaño recomendado: 800px * 400px, peso máximo 2MB</p>

	<div id="arrastreImagenArticulo">
		<div id="imagenArticulo">

		</div>
	</div>

	<textarea id="contenido" cols="30" rows="5" placeholder="Contenido del Articulo" class="form-control"></textarea>

	<button id="guardarArticulo" class="btn btn-primary">Guardar Artículo</button>
</form>

