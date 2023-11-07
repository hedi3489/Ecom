<?php
$controller = (isset($_GET['controller'])) ? $_GET['controller'] : 'home';
$action = (isset($_GET['action'])) ? $_GET['action'] : 'index';
$id = (isset($_GET['id'])) ? intval($_GET['id']) : -1;

$controllerName = ucfirst($controller) . "Controller";
include_once "/Controller/$controllerName.php";
$cont = new $controllerName();
$cont->route();
?>