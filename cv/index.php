<?php
define('APPLICATION_PATH', realpath(dirname(__FILE__) . '/'));
$loader = require 'vendor/autoload.php';
$loader->addPsr4('Serri\App\\',__DIR__);

$ctrlfrontend = new \Controller\FrontendController();
$router = new \Stephan\Router();

if (isset($_GET['action'])){
	$router->checkUrl($_GET['action']);}
	else {

		$ctrlfrontend->accueil();

	}