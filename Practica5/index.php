<?php
  
require_once "models/enlaces.php";//importa enlaces.php
require_once "models/crud.php";//importa el crud
require_once "controllers/controller.php";//importa el controlador


$mvc = new MvcController();//objeto creado
$mvc -> pagina();

?>