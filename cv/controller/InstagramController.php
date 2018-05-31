<?php
namespace Controller;
use Exception;


class InstagramController{
	
	public function instagramView()
	{ 
		$view = new \Folio\View('frontend/instagram');
		$view->generer([]);
		
	}
}