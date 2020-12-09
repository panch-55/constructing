<?php
/**
 *
 */
class articulosController
{
	private $model;
	function __construct()
	{
		$this->model = new articulosModel();
	}
	public function subirImagenTmpController($datos)
	{
		list($ancho,$alto) = getimagesize($datos);
		if ($ancho < 800 && $alto < 400) {
			echo 0;
		}else{
			$aleatorio = mt_rand(100,999);

			$ruta = "../../views/images/articulos/temp/articulo".$aleatorio.".jpg";
			$thumb = imagecreatetruecolor(800,600);
			$origen = imagecreatefromjpeg($datos);
			imagecopyresized($thumb, $origen, 0, 0, 0, 0, 800, 600, $ancho, $alto);
			//@move_uploaded_file($thumb,$ruta);
			imagejpeg($thumb,$ruta);
			imagedestroy($thumb);
			echo $ruta;
		}

	}
	public function guardaArticuloController($datos)
	{
		list($ancho,$alto) = getimagesize($datos['imagen']);
		if ($ancho < 800 && $alto < 400) {
			echo 0;
		}else{
			$aleatorio = mt_rand(100,999);

			$rutaImg = "../../views/images/articulos/articulo".$aleatorio.".jpg";
			$thumb = imagecreatetruecolor(800,600);
			$origen = imagecreatefromjpeg($datos['imagen']);
			imagecopyresized($thumb, $origen, 0, 0, 0, 0, 800, 600, $ancho, $alto);
			//@move_uploaded_file($thumb,$ruta);
			imagejpeg($thumb,$rutaImg);
			imagedestroy($thumb);
			$datos += [ "ruta" => $rutaImg ];
			$respuestaId = $this->model->guardaArticuloModel($datos,"articulos");
			$respuesta = $this->model->selectArticuloModel($respuestaId,"articulos");

			$datosSelect = '<li id="'.$respuesta['articuloId'].'">
				<span>
					<i class="fa fa-times btn btn-danger eliminar"></i>
					<i class="fa fa-pencil btn btn-primary editar"></i>
				</span>
				<img src="'.substr($respuesta['rutaImagen'], 6).'" class="img-thumbnail">
				<h1>'.$respuesta['titulo'].'</h1>
				<p>'.$respuesta['introduccion'].'</p>
				<a href="#articulo1" data-toggle="modal">
					<button class="btn btn-default">Leer Más</button>
				</a>
				<hr>
				</li>';
			echo $datosSelect;
		}
			/*$aleatorio = mt_rand(100,999);
			$rutaImg = "../../views/images/articulos/articulo".$aleatorio.".jpg";
			$origen =  $datos['imagen'];
			$datos += [ "ruta" => $rutaImg ];*/

			/*if (@move_uploaded_file($origen,$rutaImg)) {
				$respuestaId = $this->model->guardaArticuloModel($datos,"articulos");
				$respuesta = $this->model->selectArticuloModel($respuestaId,"articulos");

				$datosSelect = '<li id="'.$respuesta['articuloId'].'">
				<span>
					<i class="fa fa-times btn btn-danger eliminar"></i>
					<i class="fa fa-pencil btn btn-primary editar"></i>
				</span>
				<img src="'.substr($respuesta['rutaImagen'], 6).'" class="img-thumbnail">
				<h1>'.$respuesta['titulo'].'</h1>
				<p>'.$respuesta['introduccion'].'</p>
				<a href="#articulo1" data-toggle="modal">
					<button class="btn btn-default">Leer Más</button>
				</a>
				<hr>
				</li>';

				$files = glob('../../views/images/articulos/articulo/temp/*'); //obtenemos todos los nombres de los ficheros
				foreach($files as $file){
				    if(is_file($file))
				    unlink($file); //elimino el fichero
				}

				echo $datosSelect;
			}else{
				echo "no se subio la imagen";
			}*/
	}
	public function selectArticulosController()
	{
		$result = $this->model->selecionaArticulosModel("articulos");
		foreach ($result as $key => $value) {
			echo '<li id="'.$value['articuloId'].'" class="bloqueArticulo">
					<span ruta="'.$value['rutaImagen'].'" class="handleArticle">
						<i class="fa fa-times btn btn-danger eliminar"></i>
						<i class="fa fa-pencil btn btn-primary editar"></i>
					</span>
					<img src="'.substr($value['rutaImagen'],6).'" class="img-thumbnail">
					<h1>'.$value['titulo'].'</h1>
					<p>'.$value['introduccion'].'</p>
					<a href="#articulo1" data-toggle="modal">
						<button id="mas" class="btn btn-default">Leer Más</button>
					</a>
				<hr>
				</li>';
		}
	}
	public function selectArticuloLeerMasController($id)
	{
		$respuesta = $this->model->selectArticuloModel($id,"articulos");

		$datos = '<div class="container">
			<img src="'.substr($respuesta["rutaImagen"], 6).'" width="100%" style="margin-bottom:20px" class="img-thumbnail>
            <p class="parrafoContenido text-justify">'.$respuesta["contenido"].'</p>
            </div>';
       	$datosLeerMas = array('div' =>$datos ,'titulo'=>$respuesta['titulo']);
       	return json_encode($datosLeerMas);
	}
	public function selectArticuloEdicionController($id)
	{
		$respuesta = $this->model->selectArticuloModel($id,"articulos");

		$articuloEdit = '<div id="editarImagen " class="justify-content-end">
			<p>Tamaño recomendado: 800px * 400px, peso máximo 2MB</p>
			<div id="arrastreImagenArticulo">
				<div id="imagenArticulo">
					<span id="span'.$respuesta["articuloId"].'" ruta="'.$respuesta["rutaImagen"].'">
					<img src="'.substr($respuesta["rutaImagen"], 6).'" class="img-thumbnail img-'.$respuesta["articuloId"].'">
				</div>
			</div>

			<input type="file" name="imagen" class="btn btn-default" id="editarFoto" required>
			<input hidden="" type="text" id="articuloId" value="'.$respuesta["articuloId"].'">
			</div>
			<input id="editarTitulo" type="text" class="form-control" value="'.$respuesta["titulo"].'">
			<textarea id="editarIntro" cols="30" class="form-control" rows="3">'.$respuesta["introduccion"].'</textarea>
			<textarea id="editarContenido" cols="30" rows="4" class="form-control mt-2">'.$respuesta["contenido"].'</textarea>
			<span>
				<button id="guardarEdicion" class="btn btn-primary pull-right">Guardar</button>
			</span>';
		echo $articuloEdit;
	}
	public function updateArticuloController($datos)
	{
		$id = $datos['id'];
		if ($datos['imagen'] == "") {
			$this->model->updateArticuloSinImagenloModel($datos,"articulos");
		}else{
			$aleatorio = mt_rand(100,999);
			$rutaImg = "../../views/images/articulos/articulo".$aleatorio.".jpg";
			$origen =  $datos['imagen'];
			$datos += ["ruta" => $rutaImg];

		if (@move_uploaded_file($origen,$rutaImg)) {
				$this->model->updateArticuloConImagenModel($datos,"articulos");
				unlink($datos['oldRuta']);
			}
		}


		$respuesta = $this->model->selectArticuloModel($id,"articulos");
		$datosSelect = '<li id="'.$respuesta['articuloId'].'">
			<span>
				<i class="fa fa-times btn btn-danger eliminar"></i>
				<i class="fa fa-pencil btn btn-primary editar"></i>
			</span>
			<img src="'.substr($respuesta['rutaImagen'], 6).'" class="img-thumbnail">
			<h1>'.$respuesta['titulo'].'</h1>
			<p>'.$respuesta['introduccion'].'</p>
			<a href="#articulo1" data-toggle="modal">
				<button class="btn btn-default">Leer Más</button>
			</a>
			<hr>
			</li>';

			$datosUpdate = array('li' => $datosSelect, 'id'=> $id );
			echo json_encode($datosUpdate);

		/*$aleat/orio = mt_rand(100,999);
		$rutaImg = "../../views/images/articulos/articulo".$aleatorio.".jpg";
		$origen =  $datos['imagen'];
		$datos += [ "ruta" => $rutaImg ];

		if (@move_uploaded_file($origen,$rutaImg)) {
			$this->model->updateArticuloModel($datos,"articulos");
			$id = $datos['id'];
			$respuesta = $this->model->selectArticuloModel($id,"articulos");
			//$lastId = $respuesta['lastId'];
			//echo $lastId;
			/*$datosArray = array('articuloId' =>$respuesta['articuloId'],
						'titulo'=>$respuesta['titulo'],
						'introduccion'=>$respuesta['introduccion'],
						'contenido'=>$respuesta['contenido'],
						'ruta'=>$respuesta['rutaImagen']);

			$datosSelect = '<li id="'.$respuesta['articuloId'].'">
			<span>
				<i class="fa fa-times btn btn-danger eliminar"></i>
				<i class="fa fa-pencil btn btn-primary editar"></i>
			</span>
			<img src="'.substr($respuesta['rutaImagen'], 6).'" class="img-thumbnail">
			<h1>'.$respuesta['titulo'].'</h1>
			<p>'.$respuesta['introduccion'].'</p>
			<a href="#articulo1" data-toggle="modal">
				<button class="btn btn-default">Leer Más</button>
			</a>
			<hr>
			</li>';

			$datosUpdate = array('li' => $datosSelect, 'id'=> $id );
			return json_encode($datosUpdate);
		}else{
			echo "no se subio la imagen";
		}*/
	}
	public function deleteArticuloController($datos)
	{
		$respuesta = $this->model->deleteArticuloModel($datos,"articulos");
		if ($respuesta=="ok") {
			unlink($datos['oldRuta']);
		}

		echo $respuesta;
	}
	public function mostrarArticulosOrdenarController()
	{
		$respuesta = $this->model->selecionaArticulosModel("articulos");
		$articulos = '<ul id="storable" class="list-group">';
		foreach ($respuesta as $key => $value) {
			 $articulos = $articulos . '<li id="'.$value['articuloId'].'" value="" class="list-group-item border-0 mb-3 shadow d-flex justify-content-between aling-item-center color bloqueArticulo">
			 	"titulo : '.$value['titulo'].'"
	            <span class="fa fa-times ">
	            	<i class="glyphicon glyphicon-move handleImg" style="padding:8px"></i>
	            </span>
	            </li>';
		}
		$articulos = $articulos.'</ul>';
		return $articulos;

	}
	public function updateOrdenController($datos)
	{
		$result = $this->model->UpdateOrdenModel($datos,"articulos");
		echo $result;
	}
}