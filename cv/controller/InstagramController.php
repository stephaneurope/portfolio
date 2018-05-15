<?php
namespace Controller;

//require "vendor/autoload.php";
 
class InstagramController{
  
public function instagramView()
  {

    $view = new \Folio\View('instagram');
    $view->generer([]);
    
}
  }