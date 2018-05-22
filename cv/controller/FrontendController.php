<?php
namespace Controller;
use Exception;
  use Spipu\Html2Pdf\Html2Pdf;
use Spipu\Html2Pdf\Exception\Html2PdfException;
use Spipu\Html2Pdf\Exception\ExceptionFormatter;  

class FrontendController{

  
  public function accueil()
  {
    $adminManager = new \Model\AdminManager();
    $result = $adminManager->identity();  
    $folioManager = new \Model\FolioManager();
    $portfolio = $folioManager->getFolio2(); 
    $view = new \Folio\View('frontend/accueilView');
    $view->generer(['portfolio' => $portfolio,'result'=> $result]);
    
}
public function portfolio()
  {
   session_start();  
    $folioManager = new \Model\FolioManager();
    $portfolio = $folioManager->getFolio($_GET['id']); 
    $portfol = $folioManager->getFolio2(); 
    $view = new \Folio\View('frontend/portfolioView');
    $view->generer(['portfolio'=>$portfolio,'portfol'=>$portfol]);
    
}


  

public function cv()
  {
    session_start();  
    $adminManager = new \Model\AdminManager();
    $cvManager = new \Model\CvManager();
    $result = $adminManager->identity();  
    $proCv = $cvManager->getProCv();
    $expCv = $cvManager->getExpCv();
    $avCv = $cvManager->getAvCv();
    $edCv = $cvManager->getEdCv();
    $view = new \Folio\View('frontend/cvView');

    $view->generer(['proCv' => $proCv,'expCv' => $expCv,'avCv' => $avCv,'edCv' => $edCv, 'result' => $result]);
    
}


public function error()
{
     
    $view = new \Folio\View('frontend/errorView');
    $view->generer([]);
    
 
}
 public function connect(){ 
 $session = new \App\MessageFlash();
 $view = new \Folio\View('frontend/connectView'); 
 $view->generer(['session' => $session]);
}




}