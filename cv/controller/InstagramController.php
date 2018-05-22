<?php
namespace Controller;
use Exception;

 
class InstagramController{
  
public function instagramView()
  {
    $start = session_start();  
    $view = new \Folio\View('frontend/instagram');
    $view->generer([]);
    
}
  }