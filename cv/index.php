<?php

$loader = require 'vendor/autoload.php';
$loader->addPsr4('Serri\App\\',__DIR__);

$ctrlfrontend = new \Controller\FrontendController();
 $router = new \Stephan\Routeur();


 

if (isset($_GET['action'])){
$router->checkUrl($_GET['action']);}
else {

    $ctrlfrontend->accueil();

}