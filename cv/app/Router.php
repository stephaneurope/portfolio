<?php
namespace  Stephan;
require "vendor/autoload.php";
use Exception;
class Router {
  public function checkUrl(){
    $ctrlfrontend = new \Controller\FrontendController();
    $ctrlBackend = new \Controller\BackendController();
    $ctrlAdmin = new \Controller\AdminController();
    $ctrlContact = new \Controller\ContactController();
    $ctrlInstagram = new \Controller\InstagramController();
    $ctrlPdf = new  \Controller\PdfController();
    $ctrlCv = new  \Controller\CvController();
    $ctrlBoard = new  \Controller\BoardController();
    $tab_action = array("accueil","contact","portfolio","contactForm","cv",'profilPersonnel','experienceProfessionnel','competences','education','boardCv',"portfolioInsert","portfolioInsertAction","connect",'boardFolio','boardPrincipal','projectView','cleanProject','eraseProject','connexion','deconnexion','portfolioModifAction','portfolioModif','updateProfilPersonnel','updateExperienceProfessionnel','updateCompetence','updateEducation','ajoutExPro','cvInsertExpro','InsertComp','ajoutComp','ajoutEduc','cvInsertEduc','deleteExPro','deleteExp','deleteComp','deleteCompet','deleteEduc','deleteEduca','profil','updateProfil','updateProImg','instagram','imageFolio','imageModif','pdf','rgpd');
    
    
    try{
      if (isset($_GET['action']) && in_array($_GET['action'], $tab_action)){
        session_start();
   
       if ($_GET['action'] == 'accueil') {
        $ctrlfrontend->accueil();
        
      }
      
      elseif ($_GET['action'] == 'portfolio') {  
        $ctrlfrontend->portfolio();       
      }
      
     
      elseif ($_GET['action'] == 'connect'){
        $ctrlfrontend->connect(); 
        
      }

      elseif ($_GET['action'] == 'contact'){

        $ctrlContact->contact(); 
        
      }
      
      elseif ($_GET['action'] == 'contactForm'){ 
       $ctrlContact->contactForm();
     }
    
     elseif ($_GET['action'] == 'instagram') { 
      $ctrlInstagram->instagramView();      
    }
    
    elseif ($_GET['action'] == 'cv'){
     $ctrlfrontend->cv();
   }
   
   elseif ($_GET['action'] == 'pdf'){
     $ctrlPdf->pdf();
   }

   elseif ($_GET['action'] == 'rgpd'){
     $ctrlfrontend->rgpd();
   }
   
   elseif ($_GET['action'] == 'boardPrincipal'){   
     $ctrlBoard->boardPrincipal();    
   }
    
   elseif ($_GET['action'] == 'boardFolio'){
     $ctrlBoard->boardFolio();     
   }

   elseif ($_GET['action'] == 'projectView') {       
    $ctrlBackend->projectView(); 
   }
      
   elseif ($_GET['action'] == 'portfolioModif'){
     $ctrlBackend->portfolioModif($_GET['id']);
   }
   
   elseif ($_GET['action'] == 'imageFolio'){
     $ctrlBackend->imageFolio();
   }
   
   elseif ($_GET['action'] == 'cleanProject'){
    $ctrlBackend->cleanProject($_GET['id']);
  }
 
  elseif ($_GET['action'] == 'portfolioInsert'){
   $ctrlBackend->portfolioInsert();
 }

 elseif ($_GET['action'] == 'boardCv'){
   $ctrlBoard->boardCv();   
 }

 elseif ($_GET['action'] == 'profilPersonnel'){
   $ctrlCv->profilPersonnel();
 }

 elseif ($_GET['action'] == 'experienceProfessionnel'){ 
   $ctrlCv->experienceProfessionnel();
 }
 
 elseif ($_GET['action'] == 'ajoutExPro'){   
   $ctrlCv->ajoutExPro();      
 }
 
 elseif ($_GET['action'] == 'deleteExp'){
   $ctrlCv->deleteExp();  
 }

 elseif ($_GET['action'] == 'competences'){
   $ctrlCv->competences();
 }
 

 elseif ($_GET['action'] == 'ajoutComp'){
   $ctrlCv->ajoutComp();
 }

 elseif ($_GET['action'] == 'deleteComp'){
   $ctrlCv->deleteCompetences();
 }

 elseif ($_GET['action'] == 'education'){
   $ctrlCv->education();
 }

 elseif ($_GET['action'] == 'ajoutEduc'){
   $ctrlCv->ajoutEduc();
 }     
 
 elseif ($_GET['action'] == 'eraseProject'){
  
  $ctrlBackend->eraseProject($_GET['id']);

}
elseif ($_GET['action'] == 'deleteEduc'){
 $ctrlCv->deleteEducation();
}

elseif ($_GET['action'] == 'profil'){
 $ctrlAdmin->profil();
} 

elseif ($_GET['action'] == 'updateProfilPersonnel'){
 $ctrlCv->updateProfilPersonnel($_POST['profil']);
}

elseif ($_GET['action'] == 'updateExperienceProfessionnel'){
 
 $ctrlCv->updateExperienceProfessionnel($_GET['id'],($_POST['title']),ltrim($_POST['period']),($_POST['description']));
}

elseif ($_GET['action'] == 'updateCompetence'){
 $ctrlCv->updateCompetence($_GET['id'],($_POST['avantage']));
}

elseif ($_GET['action'] == 'updateEducation'){
 
 $ctrlCv->updateEducation($_GET['id'],($_POST['title']),($_POST['year']),($_POST['description']));
}

elseif ($_GET['action'] == 'imageModif'){    
  $ctrlBackend->changeImage($_GET['id'],($_FILES['image']['name'])); 
} 

elseif ($_GET['action'] == 'updateProfil'){   
 $ctrlAdmin->updateProfil(($_POST['pseudo']),($_POST['nom']),($_POST['prenom']),($_POST['mail']),($_POST['web']),($_POST['mobile']),($_POST['works']));
}  

elseif ($_GET['action'] == 'updateProImg'){
 $ctrlAdmin->updateProImg($_FILES['profil_image']['name']);
} 

elseif ($_GET['action'] == 'portfolioModifAction') {
  $ctrlBackend->portfolioModifAction($_GET['id'],($_POST['description']),($_POST['techno']),($_POST['comment']),($_POST['titre']),($_POST['liens']));
}

elseif ($_GET['action'] == 'portfolioInsertAction'){
 $ctrlBackend->portfolioInsertAction(($_FILES['image']['name']),($_POST['description']),($_POST['techno']),($_POST['comment']),($_POST['titre']), ($_POST['liens']));      
}


elseif ($_GET['action'] == 'cvInsertExpro'){
 $ctrlCv->insertExPro(($_POST['title']),($_POST['period']),($_POST['description']));
 
}

elseif ($_GET['action'] == 'InsertComp'){
 $ctrlCv->insertCompetence($_POST['avantage']);   
}

elseif ($_GET['action'] == 'cvInsertEduc'){
 
 $ctrlCv->inserEduc($_POST['title'],$_POST['year'],$_POST['description']);
}

elseif ($_GET['action'] == 'deleteExPro'){
  $ctrlCv->deleteExPro($_GET['id']);
}

 
elseif ($_GET['action'] == 'deleteCompet'){
  $ctrlCv->deleteCompet($_GET['id']);
}

elseif ($_GET['action'] == 'deleteEduca'){
 $ctrlCv->deleteEduca($_GET['id']);
}

elseif ($_GET['action'] == 'connexion'){
 if (!empty($_POST['pseudo']) && !empty($_POST['pass'])){
  $ctrlAdmin->connexion($_POST['pseudo'],$_POST['pass']);} 
  else {
   $Session = new \App\MessageFlash();
   $Session->setFlash('Tous les champs ne sont pas remplis','');
   header('Location: index.php?action=connect');
 }
}
elseif ($_GET['action'] == 'deconnexion'){
  $ctrlAdmin->deleteSession();    
}
}else{throw new Exception('Désolé une erreur est survenue,votre demande n\'a pas pu aboutir!');}
   } catch(Exception $e){ 
   ?>
   <div class="exception"> <?php echo( $e->getMessage() ."\n"); ?> </div> <?php
   $ctrlfrontend->error();
   
 }
} 
}
?>