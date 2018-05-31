<?php
namespace Controller;
use Exception;
class BoardController{


  public function boardPrincipal()
  {
   
   if(isset($_SESSION['id']) && isset($_SESSION['pseudo'])){ 
    $session = new \App\MessageFlash();
    $view = new \Folio\View('backend/board/interface');
    $view->generer(['session' => $session]);  
    return;
  }
  throw new Exception('L\' accès à été refusé <br> Vous n êtes pas autorisé à consulter cette page <br> HTTP ERROR 403');      
  
}


public function boardFolio()
{

  if(isset($_SESSION['id']) && isset($_SESSION['pseudo'])){ 
    $folioManager = new \Model\FolioManager();
    $portfolio = $folioManager->getFolio2(); 
    $view = new \Folio\View('backend/board/boardFolio');
    $view->generer(['portfolio' => $portfolio]);
    return;
  }
  throw new Exception('L\' accès à été refusé <br> Vous n êtes pas autorisé à consulter cette page <br> HTTP ERROR 403');      
  
}

public function boardCv()
{
  
  if(isset($_SESSION['id']) && isset($_SESSION['pseudo'])){  
   $view = new \Folio\View('backend/board/boardCv');
   $view->generer([]); 
   return; 
 }
 throw new Exception('L\' accès à été refusé <br> Vous n êtes pas autorisé à consulter cette page <br> HTTP ERROR 403');       
}

}