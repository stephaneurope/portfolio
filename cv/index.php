<?php

//require "vendor/autoload.php";
$loader = require 'vendor/autoload.php';
$loader->addPsr4('Serri\App\\',__DIR__);

 $routeur = new \Stephan\Routeur();


 $ctrlfrontend = new \Controller\FrontendController();

if (isset($_GET['action'])){
$routeur->checkUrl($_GET['action']);}
else {

    $ctrlfrontend->accueil();

}