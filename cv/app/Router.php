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
    $tab_action = array("accueil","contact","portfolio","contactForm","cv",'profilPersonnel','experienceProfessionnel','competences','education','boardCv',"portfolioInsert","portfolioInsertAction","connect",'boardFolio','boardPrincipal','projectView','cleanProject','eraseProject','connexion','deconnexion','portfolioModifAction','portfolioModif','updateProfilPersonnel','updateExperienceProfessionnel','updateCompetence','updateEducation','ajoutExPro','cvInsertExpro','InsertComp','ajoutComp','ajoutEduc','cvInsertEduc','deleteExPro','deleteExp','deleteComp','deleteCompet','deleteEduc','deleteEduca','profil','updateProfil','updateProImg','instagram','imageFolio','imageModif','pdf');
   
 
    /*********page de vue utilisateur**********/  
    try{
      if (isset($_GET['action']) && in_array($_GET['action'], $tab_action)){
     /*********Affichage de la page d'accueil**********/ 
        if ($_GET['action'] == 'accueil') {
          $ctrlfrontend->accueil();
          
        }
        /*********page portfolio**********/ 
        elseif ($_GET['action'] == 'portfolio') {  
            $ctrlfrontend->portfolio();       
      }
      
       /*********connexion**********/ 
       elseif ($_GET['action'] == 'connect'){
        $ctrlfrontend->connect(); 
            
      }
      /*********Affiche la vue du contact**********/ 
       elseif ($_GET['action'] == 'contact'){

        $ctrlContact->contact(); 
       
      }
       /*********envoie le message**********/ 
      elseif ($_GET['action'] == 'contactForm'){ 
         $ctrlContact->contactForm();
      }
      /*********page vue du instagram**********/ 
        elseif ($_GET['action'] == 'instagram') { 
            $ctrlInstagram->instagramView();      
      }
       /*********Affichage de la page CV**********/ 
     elseif ($_GET['action'] == 'cv'){
         $ctrlfrontend->cv();
      }
      /*********Affichage de la page CV en pdf**********/ 
     elseif ($_GET['action'] == 'pdf'){
         $ctrlPdf->pdf();
      }
 
 /*****************************************************/
      /**************Pages à droit restreint***************/
      
      /*********affichage de l'interface Principale**********/ 
elseif ($_GET['action'] == 'boardPrincipal'){   
         $ctrlBoard->boardPrincipal();    
      }
/*********affichage du boarFolio**********/ 
elseif ($_GET['action'] == 'boardFolio'){
         $ctrlBoard->boardFolio();     
      }
/*********page vue des projets**********/ 
        elseif ($_GET['action'] == 'projectView') {       $ctrlBackend->projectView(); 
      }
  /*********page vue de modification des projets**********/     
      elseif ($_GET['action'] == 'portfolioModif'){
         $ctrlBackend->portfolioModif($_GET['id']);
      }
/*********Affichage de la page de modif de l'image du portfolio**********/ 
     elseif ($_GET['action'] == 'imageFolio'){
         $ctrlBackend->imageFolio();
      }
         /********Page de validation de supression d'un projet***************/
    elseif ($_GET['action'] == 'cleanProject'){
        $ctrlBackend->cleanProject($_GET['id']);
  }
        /*********affiche la page d'insertion de nouveau projet**********/  
elseif ($_GET['action'] == 'portfolioInsert'){
         $ctrlBackend->portfolioInsert();
      }
/*********affichage du boarCv**********/ 
elseif ($_GET['action'] == 'boardCv'){
         $ctrlBoard->boardCv();   
      }
/*********Affichage de la page de modif du profil professionnel**********/ 
     elseif ($_GET['action'] == 'profilPersonnel'){
         $ctrlCv->profilPersonnel();
      }
/*********Affichage de la page de modif de l'experience professionnel**********/ 
     elseif ($_GET['action'] == 'experienceProfessionnel'){ 
         $ctrlCv->experienceProfessionnel();
      }
/*********affichage de l'ajout de l'experience professionnelle**********/ 
elseif ($_GET['action'] == 'ajoutExPro'){   
         $ctrlCv->ajoutExPro();      
      }
      /*********affichage de la supression de l'experience**********/ 
elseif ($_GET['action'] == 'deleteExp'){
         $ctrlCv->deleteExp();  
      }
       /*********Affichage de la page de modif des compétences**********/ 
     elseif ($_GET['action'] == 'competences'){
         $ctrlCv->competences();
      }
   
/*********affichage de l'ajout de competence**********/ 
elseif ($_GET['action'] == 'ajoutComp'){
   
         $ctrlCv->ajoutComp();
         
      }
 /*********affichage de la supression des competences**********/ 
elseif ($_GET['action'] == 'deleteComp'){
         $ctrlCv->deleteCompetences();
      }
/*********Affichage de la page de modif d'education**********/ 
     elseif ($_GET['action'] == 'education'){
         $ctrlCv->education();
      }
  /*********affichage de l'ajout d'ecole'**********/ 
elseif ($_GET['action'] == 'ajoutEduc'){
         $ctrlCv->ajoutEduc();
      }     
     
elseif ($_GET['action'] == 'eraseProject'){
  
$ctrlBackend->eraseProject($_GET['id']);

}
/*********affichage de la supression de l'education**********/ 
elseif ($_GET['action'] == 'deleteEduc'){
         $ctrlCv->deleteEducation();
      }
/*********affichage du profil**********/ 
   elseif ($_GET['action'] == 'profil'){
         $ctrlAdmin->profil();
     } 
      
/***************************************************/
/****************Update******************/     
       /*********Update du profil professionnel**********/ 
     elseif ($_GET['action'] == 'updateProfilPersonnel'){
         $ctrlCv->updateProfilPersonnel($_POST['profil']);
      }
      
      /*********Update de l'experience professionnelle**********/ 
     elseif ($_GET['action'] == 'updateExperienceProfessionnel'){
     
         $ctrlCv->updateExperienceProfessionnel($_GET['id'],($_POST['title']),ltrim($_POST['period']),($_POST['description']));
      }
      /*********Update des competences**********/ 
     elseif ($_GET['action'] == 'updateCompetence'){
         $ctrlCv->updateCompetence($_GET['id'],($_POST['avantage']));
         }
      /*********Update education**********/ 
     elseif ($_GET['action'] == 'updateEducation'){
     
         $ctrlCv->updateEducation($_GET['id'],($_POST['title']),($_POST['year']),($_POST['description']));
       }
      /*********Modification de l'image du projet**********/ 
            elseif ($_GET['action'] == 'imageModif'){    
    $ctrlBackend->changeImage($_GET['id'],($_FILES['image']['name'])); 
     } 
   /*********Modification du profil**********/    
elseif ($_GET['action'] == 'updateProfil'){   
         $ctrlAdmin->updateProfil(($_POST['pseudo']),($_POST['nom']),($_POST['prenom']),($_POST['mail']),($_POST['web']),($_POST['mobile']),($_POST['works']));
    }  
    /*********Modification de l'image du profil**********/  
    elseif ($_GET['action'] == 'updateProImg'){
         $ctrlAdmin->updateProImg($_FILES['profil_image']['name']);
    } 
/************** modification d'un projet *****************/    
elseif ($_GET['action'] == 'portfolioModifAction') {
  $ctrlBackend->portfolioModifAction($_GET['id'],($_POST['description']),($_POST['techno']),($_POST['comment']),($_POST['titre']),($_POST['liens']));
}
    /***************Ajout*************************/
      /*********insertion d'un nouveau projet**********/ 
elseif ($_GET['action'] == 'portfolioInsertAction'){
         $ctrlBackend->portfolioInsertAction(($_FILES['image']['name']),($_POST['description']),($_POST['techno']),($_POST['comment']),($_POST['titre']), ($_POST['liens']));      
      }
     
      /*********insertion d'une nouvelle experience professionnelle**********/ 
elseif ($_GET['action'] == 'cvInsertExpro'){
         $ctrlBackend->insertExPro(($_POST['title']),($_POST['period']),($_POST['description']));
         
      }
      /*********insertion d'une nouvelle competence**********/ 
elseif ($_GET['action'] == 'InsertComp'){
         $ctrlCv->insertCompetence($_POST['avantage']);   
      }
      /*********insertion d'une nouvelle ecole**********/ 
elseif ($_GET['action'] == 'cvInsertEduc'){
 
         $ctrlCv->inserEduc($_POST['title'],$_POST['year'],$_POST['description']);
      }
    /*************Supression***************************/
       /*********Supression de l'experience**********/ 
      elseif ($_GET['action'] == 'deleteExPro'){
        $ctrlCv->deleteExPro($_GET['id']);
      }
      
       /*********Supression des competences**********/ 
      elseif ($_GET['action'] == 'deleteCompet'){
        $ctrlCv->deleteCompet($_GET['id']);
      }
      
        /*********Supression de l'education**********/ 
      elseif ($_GET['action'] == 'deleteEduca'){
         $ctrlCv->deleteEduca($_GET['id']);
       }
/************** connexion et déconnexion *****************/
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
   } catch(Exception $e){ // S'il y a eu une erreur, alors...
   ?>
 <div class="exception"> <?php echo( $e->getMessage() ."\n"); ?> </div> <?php
   $ctrlfrontend->error();
   
  }
} 
}
 ?>