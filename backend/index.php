<?php

require_once("controllers/TemplateController.php");
require_once("controllers/ingresosController.php");
require_once("controllers/gestorSlideController.php");
require_once("controllers/galeriaController.php");
require_once("controllers/articulosController.php");
require_once("controllers/videosController.php");
require_once("controllers/suscriptoresController.php");
require_once("controllers/mensajesController.php");
require_once("controllers/usersController.php");

require_once("models/enlacesModel.php");
require_once("models/ingresosModel.php");
require_once("models/gestorSlideModel.php");
require_once("models/gestorGaleriaModel.php");
require_once("models/articulosModel.php");
require_once("models/videosModel.php");
require_once("models/suscriptoresModel.php");
require_once("models/mensajesModel.php");
require_once("models/usersModel.php");

$templateController = new TemplateController();

$templateController->templateBackend();