<?php
$controller = (isset($_GET['controller'])) ? $_GET['controller'] : 'user';
$action = (isset($_GET['action'])) ? $_GET['action'] : 'index';
$id = (isset($_GET['id'])) ? intval($_GET['id']) : -1;
//var_dump($_GET); var_dump($_POST);
$controllerName = ucfirst($controller) . "Controller";
include_once "Controllers/$controllerName.php";
$cont = new $controllerName();
$cont->route();
?>