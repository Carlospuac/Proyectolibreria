<?php
ob_start();
session_start();

$_SESSION['token'] = md5(uniqid(mt_rand(), true));

require_once('autoload.php');
require_once('Helpers/Helpers.php');

use Controller\PaginaController;

$pagina = new PaginaController();

$pagina->PaginaInicio();

?>