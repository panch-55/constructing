<?php
require_once("controllers/templateController.php");

require_once("controllers/slideController.php");
require_once("controllers/galeriaController.php");
require_once("controllers/articulosController.php");
require_once("controllers/videosController.php");
require_once("controllers/mensajesController.php");

require_once("models/slideModel.php");
require_once("models/galeriaModel.php");
require_once("models/articulosModel.php");
require_once("models/videosModel.php");
require_once("models/mensajesModel.php");

$templateController = new TemplateController();
$templateController->template();