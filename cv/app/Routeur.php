<?php
namespace  Stephan;
require "controller/PdfController.php";
require "vendor/autoload.php";
use Exception;

class Routeur {


  public function checkUrl(){
    $ctrlfrontend = new \Controller\FrontendController();
    $ctrlBackend = new \Controller\BackendController();
    $ctrlAdmin = new \Controller\AdminController();
    $ctrlContact = new \Controller\ContactController();
    $ctrlInstagram = new \Controller\InstagramController();
    $ctrlPdf = new  \Controller\PdfController();
    $ctrlCv = new  \Controller\CvController();
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
        session_start();  
            $ctrlfrontend->portfolio();       
      }
      
       /*********connexion**********/ 
       elseif ($_GET['action'] == 'connect'){
        $ctrlBackend->connect(); 
            
      }
      /*********Affiche la vue du contact**********/ 
       elseif ($_GET['action'] == 'contact'){
        session_start();
        $ctrlContact->contact(); 
       
      }
       /*********envoie le message**********/ 
      elseif ($_GET['action'] == 'contactForm'){
        session_start(); 
         $ctrlContact->contactForm();
         //header('location:index.php?action=contact');
      }
      /*********page vue du instagram**********/ 
        elseif ($_GET['action'] == 'instagram') { 
        session_start();
            $ctrlInstagram->instagramView();      
      }
       /*********Affichage de la page CV**********/ 
     elseif ($_GET['action'] == 'cv'){
      session_start();
         $ctrlfrontend->cv();
      }
      /*********Affichage de la page CV en pdf**********/ 
     elseif ($_GET['action'] == 'pdf'){
      session_start();

         $ctrlPdf->pdf();
      }
 /**********************************************/
 /*****************************************************/
      /**************Pages à droit restreint***************/
      /***************************************************/

      /*********affichage de l'interface Principale**********/ 
elseif ($_GET['action'] == 'boardPrincipal'){
          session_start();
        if(isset($_SESSION['id']) && isset($_SESSION['pseudo'])){ 

         $ctrlBackend->boardPrincipal();
         return;}
         throw new Exception('L\' accès à été refusé <br> Vous n êtes pas autorisé à consulter cette page <br> HTTP ERROR 403');      
    
         
      }
/*********affichage du boarFolio**********/ 
elseif ($_GET['action'] == 'boardFolio'){
 session_start();
        if(isset($_SESSION['id']) && isset($_SESSION['pseudo'])){  
         $ctrlBackend->boardFolio();}else{
         throw new Exception('L\' accès à été refusé <br> Vous n êtes pas autorisé à consulter cette page <br> HTTP ERROR 403');      
    } 
         
      }
/*********page vue des projets**********/ 
        elseif ($_GET['action'] == 'projectView') { 
           session_start();
        if(isset($_SESSION['id']) && isset($_SESSION['pseudo'])){
            $ctrlBackend->projectView(); }else{
         throw new Exception('L\' accès à été refusé <br> Vous n êtes pas autorisé à consulter cette page <br> HTTP ERROR 403');
         
         
    }      
      }
  /*********page vue de modification des projets**********/     
      elseif ($_GET['action'] == 'portfolioModif'){
   session_start();
        if(isset($_SESSION['id']) && isset($_SESSION['pseudo'])){ 
         $ctrlBackend->portfolioModif($_GET['id']);
        return;
      }
         throw new Exception('L\' accès à été refusé <br> Vous n êtes pas autorisé à consulter cette page <br> HTTP ERROR 403');      
        
      }

/*********Affichage de la page de modif de l'image du portfolio**********/ 
     elseif ($_GET['action'] == 'imageFolio'){
      session_start();
        if(isset($_SESSION['id']) && isset($_SESSION['pseudo'])){
         $ctrlBackend->imageFolio();
       }else{
         throw new Exception('L\' accès à été refusé <br> Vous n êtes pas autorisé à consulter cette page <br> HTTP ERROR 403');
         
         
    }
      }
         /********Page de validation de supression d'un projet***************/
    elseif ($_GET['action'] == 'cleanProject'){
     if (isset($_GET['id']) && $_GET['id'] > 0) {
      session_start();
     if(isset($_SESSION['id']) && isset($_SESSION['pseudo'])){
        $ctrlBackend->cleanProject($_GET['id']);
      } else{
        throw new Exception('L\' accès à été refusé <br> Vous n êtes pas autorisé à consulter cette page <br> HTTP ERROR 403');
      }
    }else{
      throw new Exception('Désolé une erreur est survenue,votre demande n\'a pas pu aboutir');
    }
  }
        /*********affiche la page d'insertion de nouveau projet**********/  
elseif ($_GET['action'] == 'portfolioInsert'){
  session_start();
        if(isset($_SESSION['id']) && isset($_SESSION['pseudo'])){
         $ctrlBackend->portfolioInsert(); 
        return;
       }
         throw new Exception('L\' accès à été refusé <br> Vous n êtes pas autorisé à consulter cette page <br> HTTP ERROR 403');
          
      }
/*********affichage du boarCv**********/ 
elseif ($_GET['action'] == 'boardCv'){
   session_start();
        if(isset($_SESSION['id']) && isset($_SESSION['pseudo'])){  
         $ctrlCv->boardCv();}else{
         throw new Exception('L\' accès à été refusé <br> Vous n êtes pas autorisé à consulter cette page <br> HTTP ERROR 403');      
    } 
         
      }

/*********Affichage de la page de modif du profil professionnel**********/ 
     elseif ($_GET['action'] == 'profilPersonnel'){
      session_start();
        if(isset($_SESSION['id']) && isset($_SESSION['pseudo'])){
         $ctrlCv->profilPersonnel();
       }else{
         throw new Exception('L\' accès à été refusé <br> Vous n êtes pas autorisé à consulter cette page <br> HTTP ERROR 403');
         
         
    }
      }

/*********Affichage de la page de modif de l'experience professionnel**********/ 
     elseif ($_GET['action'] == 'experienceProfessionnel'){
       session_start();
        if(isset($_SESSION['id']) && isset($_SESSION['pseudo'])){
         $ctrlCv->experienceProfessionnel();}else{
         throw new Exception('L\' accès à été refusé <br> Vous n êtes pas autorisé à consulter cette page <br> HTTP ERROR 403');
         
         
    }
      }

/*********affichage de l'ajout de l'experience professionnelle**********/ 
elseif ($_GET['action'] == 'ajoutExPro'){
   session_start();
        if(isset($_SESSION['id']) && isset($_SESSION['pseudo'])){  
         $ctrlCv->ajoutExPro();
         return;
       }
         throw new Exception('L\' accès à été refusé <br> Vous n êtes pas autorisé à consulter cette page <br> HTTP ERROR 403');          
      }

      /*********affichage de la supression de l'experience**********/ 
elseif ($_GET['action'] == 'deleteExp'){
    session_start();
        if(isset($_SESSION['id']) && isset($_SESSION['pseudo'])){  
         $ctrlCv->deleteExp();
          return;
       }
         throw new Exception('L\' accès à été refusé <br> Vous n êtes pas autorisé à consulter cette page <br> HTTP ERROR 403');         
      }

       /*********Affichage de la page de modif des compétences**********/ 
     elseif ($_GET['action'] == 'competences'){
      session_start();
        if(isset($_SESSION['id']) && isset($_SESSION['pseudo'])){
         $ctrlCv->competences();}else{
         throw new Exception('L\' accès à été refusé <br> Vous n êtes pas autorisé à consulter cette page <br> HTTP ERROR 403');
         
         
    }
      }
   
/*********affichage de l'ajout de competence**********/ 
elseif ($_GET['action'] == 'ajoutComp'){
   session_start();
        if(isset($_SESSION['id']) && isset($_SESSION['pseudo'])){  
         $ctrlCv->ajoutComp();}else{
         throw new Exception('L\' accès à été refusé <br> Vous n êtes pas autorisé à consulter cette page <br> HTTP ERROR 403');      
    } 
         
      }

 /*********affichage de la supression des competences**********/ 
elseif ($_GET['action'] == 'deleteComp'){
   session_start();
        if(isset($_SESSION['id']) && isset($_SESSION['pseudo'])){  
         $ctrlCv->deleteCompetences();
         }else{
         throw new Exception('L\' accès à été refusé <br> Vous n êtes pas autorisé à consulter cette page <br> HTTP ERROR 403');      
    } 
      }

/*********Affichage de la page de modif d'education**********/ 
     elseif ($_GET['action'] == 'education'){
     session_start();
        if(isset($_SESSION['id']) && isset($_SESSION['pseudo'])){  
         $ctrlCv->education();}else{
         throw new Exception('L\' accès à été refusé <br> Vous n êtes pas autorisé à consulter cette page <br> HTTP ERROR 403');
         
         
    }
      }

  /*********affichage de l'ajout d'ecole'**********/ 
elseif ($_GET['action'] == 'ajoutEduc'){
   session_start();
        if(isset($_SESSION['id']) && isset($_SESSION['pseudo'])){  
         $ctrlCv->ajoutEduc();}else{
         throw new Exception('L\' accès à été refusé <br> Vous n êtes pas autorisé à consulter cette page <br> HTTP ERROR 403');      
    } 
         
      }     
     


elseif ($_GET['action'] == 'eraseProject'){
  if (isset($_GET['id']) && $_GET['id'] > 0) {
$ctrlBackend->eraseProject($_GET['id']);
}else{
     throw new Exception('Désolé une erreur est survenue,votre demande n\'a pas pu aboutir');
    }

}

/*********affichage de la supression de l'education**********/ 
elseif ($_GET['action'] == 'deleteEduc'){
   session_start();
        if($_SESSION){  
         $ctrlCv->deleteEducation();
         return;
       }
         throw new Exception('L\' accès à été refusé <br> Vous n êtes pas autorisé à consulter cette page <br> HTTP ERROR 403');      
     
         
      }
/*********affichage du profil**********/ 
   elseif ($_GET['action'] == 'profil'){
   session_start();
        if($_SESSION['id'] && $_SESSION['pseudo']){ 
         $ctrlAdmin->profil();
    
      }else{
         throw new Exception('L\' accès à été refusé <br> Vous n êtes pas autorisé à consulter cette page <br> HTTP ERROR 403');      
    }    
      } 
      
/***************************************************/

/****************Update******************/     
       /*********Update du profil professionnel**********/ 
     elseif ($_GET['action'] == 'updateProfilPersonnel'){
         $ctrlCv->updateProfilPersonnel(ltrim($_POST['profil']));
      }
      
      /*********Update de l'experience professionnelle**********/ 
     elseif ($_GET['action'] == 'updateExperienceProfessionnel'){
      if (isset($_GET['id']) && $_GET['id'] > 0) {
         $ctrlCv->updateExperienceProfessionnel($_GET['id'],(htmlspecialchars(ltrim($_POST['title']))),(htmlspecialchars(ltrim($_POST['period']))),(htmlspecialchars(ltrim($_POST['description']))));}
         else{
      throw new Exception('Désolé une erreur est survenue,votre demande n\'a pas pu aboutir');
    }

      }
      /*********Update des competences**********/ 
     elseif ($_GET['action'] == 'updateCompetence'){
      if (isset($_GET['id']) && $_GET['id'] > 0) {
         $ctrlCv->updateCompetence($_GET['id'],(htmlspecialchars(ltrim($_POST['avantage']))));
         }
         else{
      throw new Exception('Désolé une erreur est survenue,votre demande n\'a pas pu aboutir');
    }
      }
      /*********Update education**********/ 
     elseif ($_GET['action'] == 'updateEducation'){
      if (isset($_GET['id']) && $_GET['id'] > 0) {
         $ctrlCv->updateEducation($_GET['id'],(htmlspecialchars(ltrim($_POST['title']))),(htmlspecialchars(ltrim($_POST['year']))),(htmlspecialchars(ltrim($_POST['description']))));}
         else{
      throw new Exception('Désolé une erreur est survenue,votre demande n\'a pas pu aboutir');
    }
      }
      /*********Modification de l'image du projet**********/ 
            elseif ($_GET['action'] == 'imageModif'){
         if (isset($_GET['id']) && $_GET['id'] > 0) {
    $ctrlBackend->changeImage($_GET['id'],htmlspecialchars(ltrim($_FILES['image']['name']))); 
    }else{
     throw new Exception('Désolé une erreur est survenue,votre demande n\'a pas pu aboutir!');
    }
      } 

   /*********Modification du profil**********/    
elseif ($_GET['action'] == 'updateProfil'){
 
   session_start();
        if($_SESSION['id'] && $_SESSION['pseudo']){ 
         $ctrlAdmin->updateProfil((htmlspecialchars(ltrim($_POST['pseudo']))),(htmlspecialchars(ltrim($_POST['nom']))),(htmlspecialchars(ltrim($_POST['prenom']))),(htmlspecialchars(ltrim($_POST['mail']))),(htmlspecialchars(ltrim($_POST['web']))),(htmlspecialchars(ltrim($_POST['mobile']))),(htmlspecialchars(ltrim($_POST['works']))));
   
     }else{
         throw new Exception('L\' accès à été refusé <br> Vous n êtes pas autorisé à consulter cette page <br> HTTP ERROR 403');      
    }   
    }  
    /*********Modification de l'image du profil**********/  
    elseif ($_GET['action'] == 'updateProImg'){
 
   session_start();
        if($_SESSION['id'] && $_SESSION['pseudo']){ 
         $ctrlAdmin->updateProImg(htmlspecialchars(ltrim($_FILES['profil_image']['name'])));
   
     } 
    } 

/************** modification d'un projet *****************/   
 
  
elseif ($_GET['action'] == 'portfolioModifAction') {
  if (isset($_GET['id']) && $_GET['id'] > 0) {
   
     $ctrlBackend->portfolioModifAction($_GET['id'],htmlspecialchars(ltrim($_POST['description'])),(ltrim($_POST['techno'])),htmlspecialchars(ltrim($_POST['comment'])),htmlspecialchars(ltrim($_POST['titre'])),htmlspecialchars(ltrim( $_POST['liens'])));
}else{
     throw new Exception('Désolé une erreur est survenue,votre demande n\'a pas pu aboutir!');
    }

}
    /***************Ajout*************************/

      /*********insertion d'un nouveau projet**********/ 
elseif ($_GET['action'] == 'portfolioInsertAction'){
  
         $ctrlBackend->portfolioInsertAction(htmlspecialchars(ltrim(($_FILES['image']['name']))),htmlspecialchars(ltrim($_POST['description'])),(ltrim($_POST['techno'])),htmlspecialchars(ltrim($_POST['comment'])),htmlspecialchars(ltrim($_POST['titre'])), htmlspecialchars(ltrim($_POST['liens'])));
        
      }
     
      /*********insertion d'une nouvelle experience professionnelle**********/ 
elseif ($_GET['action'] == 'cvInsertExpro'){

         $ctrlBackend->insertExPro(htmlspecialchars(ltrim($_POST['title'])),htmlspecialchars(ltrim($_POST['period'])),htmlspecialchars(ltrim($_POST['description'])));
         
      }
      /*********insertion d'une nouvelle competence**********/ 
elseif ($_GET['action'] == 'InsertComp'){
 
         $ctrlCv->insertCompetence(htmlspecialchars(ltrim($_POST['avantage'])));
         
      }

      /*********insertion d'une nouvelle ecole**********/ 
elseif ($_GET['action'] == 'cvInsertEduc'){
 
         $ctrlCv->inserEduc($_POST['title'],$_POST['year'],$_POST['description']);

      }
    /*************Supression***************************/

       /*********Supression de l'experience**********/ 
      elseif ($_GET['action'] == 'deleteExPro'){
        if (isset($_GET['id']) && $_GET['id'] > 0) {
        $ctrlCv->deleteExPro($_GET['id']);}
         else{
      throw new Exception('Désolé une erreur est survenue,votre demande n\'a pas pu aboutir');
    }

      }
      
       /*********Supression des competences**********/ 
      elseif ($_GET['action'] == 'deleteCompet'){
        if (isset($_GET['id']) && $_GET['id'] > 0) {
        $ctrlCv->deleteCompet($_GET['id']);}
         else{
      throw new Exception('Désolé une erreur est survenue,votre demande n\'a pas pu aboutir');
    }

      }
      
        /*********Supression de l'education**********/ 
      elseif ($_GET['action'] == 'deleteEduca'){
        if (isset($_GET['id']) && $_GET['id'] > 0) {
         $ctrlCv->deleteEduca($_GET['id']);}
         else{
      throw new Exception('Désolé une erreur est survenue,votre demande n\'a pas pu aboutir');
    }

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

