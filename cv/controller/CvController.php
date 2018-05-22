<?php
namespace Controller;
use Exception;
class CvController{


public function profilPersonnel()
  {
    session_start();
        if(isset($_SESSION['id']) && isset($_SESSION['pseudo'])){
    $adminManager = new \Model\AdminManager();
    $cvManager = new \Model\CvManager();
    $session = new \App\MessageFlash();
    $result = $adminManager->identity();
    $proCv = $cvManager->getProCv();
    $view = new \Folio\View('backend/cv/profilPersonnel');
    $view->generer(['proCv' => $proCv,'result' => $result,'session' => $session]);
    return;
  }
         throw new Exception('L\' accès à été refusé <br> Vous n êtes pas autorisé à consulter cette page <br> HTTP ERROR 403');   
}
public function updateProfilPersonnel($profil)
  {
    if (!empty(htmlspecialchars(ltrim($_POST['profil'])))) {
   $cvManager = new \Model\CvManager();
   $cvManager->updateProCv($profil);
      $session = new \App\MessageFlash();
        $session->setFlash('Le profil Personnel à été modifié','');
        header('location:index.php?action=profilPersonnel');
        return;
    }
        $session = new \App\MessageFlash();
        $session->setFlash('Tous les champs ne sont pas remplis','');
        header('location:index.php?action=profilPersonnel');
        exit;
       
}
public function experienceProfessionnel()
  {
session_start();
        if(isset($_SESSION['id']) && isset($_SESSION['pseudo'])){
    $adminManager = new \Model\AdminManager();
    $cvManager = new \Model\CvManager();
    $expCv = $cvManager->getExpCv();
    $result = $adminManager->identity();
    $session = new \App\MessageFlash();
    $view = new \Folio\View('backend/cv/experienceProfessionnel');
    $view->generer(['expCv' => $expCv,'result' => $result,'session' => $session]);
return;
  }
         throw new Exception('L\' accès à été refusé <br> Vous n êtes pas autorisé à consulter cette page <br> HTTP ERROR 403');
            
}
public function ajoutExPro()
  {
   session_start();
        if(isset($_SESSION['id']) && isset($_SESSION['pseudo'])){ 
   $adminManager = new \Model\AdminManager();
   $result = $adminManager->identity();
   $session = new \App\MessageFlash();
   $view = new \Folio\View('backend/cv/ajoutExProView');
   $view->generer(['result' => $result,'session' => $session]);
return;
 }
         throw new Exception('L\' accès à été refusé <br> Vous n êtes pas autorisé à consulter cette page <br> HTTP ERROR 403');         
}
public function updateExperienceProfessionnel($expId,$title,$period,$description)
  {
     if (isset($_GET['id']) && $_GET['id'] > 0) {
    if (!empty(htmlspecialchars(ltrim($_POST['title']))) && !empty(htmlspecialchars(ltrim($_POST['period']))) && !empty(htmlspecialchars(ltrim($_POST['description'])))) {
    
   $cvManager = new \Model\CvManager();
   $cvManager->updateExpCv($expId,$title,$period,$description);
   $session = new \App\MessageFlash();
        $session->setFlash('Votre expérience professionnelle à été modifiée','');
       header('location:index.php?action=experienceProfessionnel');
        exit;
        return;
    }
      $session = new \App\MessageFlash();
        $session->setFlash('Tous les champs ne sont pas remplis','');
        header('location:index.php?action=experienceProfessionnel');
        exit;  

        }
         else{
      throw new Exception('Désolé une erreur est survenue,votre demande n\'a pas pu aboutir');
    }  
}
public function insertExPro($title,$period,$description)
  {
     if (!empty(htmlspecialchars(ltrim($_POST['title']))) && !empty(htmlspecialchars(ltrim($_POST['period']))) && !empty(htmlspecialchars(ltrim($_POST['description'])))){
   $cvManager = new \Model\CvManager();
   $cvManager->insertExpCv($title,$period,$description);
   $session = new \App\MessageFlash();
   $session->setFlash('Votre expérience professionnelle a bien été ajoutée','');
   header('location:index.php?action=experienceProfessionnel');
return;
 }       $Session = new \App\MessageFlash();
          $Session->setFlash('Vous n\'avez pas rempli tous les champs',''); 
          header('location:index.php?action=experienceProfessionnel');
          exit;
      
    
}
public function deleteExp()
  {
   session_start();
        if(isset($_SESSION['id']) && isset($_SESSION['pseudo'])){
    $adminManager = new \Model\AdminManager();
  $cvManager = new \Model\CvManager();
   $expCv = $cvManager->getExpCv();
   $result = $adminManager->identity();
   $view = new \Folio\View('backend/cv/deleteExpView');
   $view->generer(['expCv' => $expCv,'result' => $result]);
return;
 }
         throw new Exception('L\' accès à été refusé <br> Vous n êtes pas autorisé à consulter cette page <br> HTTP ERROR 403');         
}
public function deleteExPro()
  {
    if (isset($_GET['id']) && $_GET['id'] > 0) {
   $cvManager = new \Model\CvManager();
   $cvManager->deleteExpCv($_GET['id']);
   header('location:index.php?action=experienceProfessionnel');
return;
 }    throw new Exception('Désolé une erreur est survenue,votre demande n\'a pas pu aboutir');
   
}

public function competences()
  {
  session_start();
        if(isset($_SESSION['id']) && isset($_SESSION['pseudo'])){
    $adminManager = new \Model\AdminManager();
   $cvManager = new \Model\CvManager();
   $avCv = $cvManager->getAvCv();
   $view = new \Folio\View('backend/cv/competences');
   $result = $adminManager->identity();
   $session = new \App\MessageFlash();
   $view->generer(['avCv' => $avCv,'result' => $result, 'session' => $session]);
return;
 }
         throw new Exception('L\' accès à été refusé <br> Vous n êtes pas autorisé à consulter cette page <br> HTTP ERROR 403');
   
}
public function ajoutComp()
  {
session_start();
        if(isset($_SESSION['id']) && isset($_SESSION['pseudo'])){  
  $adminManager = new \Model\AdminManager();
 $result = $adminManager->identity();
   $view = new \Folio\View('backend/cv/ajoutCompView');
    $session = new \App\MessageFlash();
   $view->generer(['result' => $result,'session' => $session]);
return;
 }
         throw new Exception('L\' accès à été refusé <br> Vous n êtes pas autorisé à consulter cette page <br> HTTP ERROR 403');      
    
}
public function updateCompetence($avId,$avantage)
  {
    if (isset($_GET['id']) && $_GET['id'] > 0) {
    if (!empty(htmlspecialchars(ltrim($_POST['avantage'])))) {
   $cvManager = new \Model\CvManager();
   $cvManager->updateAvCv($avId,$avantage);
   
$session = new \App\MessageFlash();
        $session->setFlash('Vos compétences ont été modifiées','');
      header('location:index.php?action=competences');
        exit;
    }else{
      $session = new \App\MessageFlash();
        $session->setFlash('Tous les champs ne sont pas remplis','');
        header('location:index.php?action=competences');
        exit;
    }
    }
         else{
      throw new Exception('Désolé une erreur est survenue,votre demande n\'a pas pu aboutir');
    }
      
}
public function insertCompetence($avantage)
  {
     if (!empty(htmlspecialchars(ltrim($_POST['avantage'])))){
   $cvManager = new \Model\CvManager();
   $cvManager->insertAvCv($avantage);
   $session = new \App\MessageFlash();
   $session->setFlash('Votre competence a bien été ajouté','');
   header('location:index.php?action=competences');}else{
          $Session = new \App\MessageFlash();
          $Session->setFlash('Vous n\'avez pas rempli tous les champs',''); 
          header('location:index.php?action=ajoutComp');
          exit;
      }

}
public function deleteCompetences()
  {
 session_start();
        if(isset($_SESSION['id']) && isset($_SESSION['pseudo'])){
    $adminManager = new \Model\AdminManager();
   $cvManager = new \Model\CvManager();
   $avCv = $cvManager->getAvCv();
   $result = $adminManager->identity();
   $view = new \Folio\View('backend/cv/deleteCompView');
   $view->generer(['avCv' => $avCv,'result'=> $result]);
   return;
   }
         throw new Exception('L\' accès à été refusé <br> Vous n êtes pas autorisé à consulter cette page <br> HTTP ERROR 403');      
}
public function deleteCompet()
  {
    if (isset($_GET['id']) && $_GET['id'] > 0) {
   $cvManager = new \Model\CvManager();
   $cvManager->deleteAvCv($_GET['id']);
   header('location:index.php?action=competences');
return;
 }
      throw new Exception('Désolé une erreur est survenue,votre demande n\'a pas pu aboutir'); 
}

public function education()
  {
 session_start();
        if(isset($_SESSION['id']) && isset($_SESSION['pseudo'])){  
   $adminManager = new \Model\AdminManager();
   $cvManager = new \Model\CvManager();
   $edCv = $cvManager->getEdCv();
   $result = $adminManager->identity();
   $view = new \Folio\View('backend/cv/education');
   $session = new \App\MessageFlash();
   $view->generer(['edCv' => $edCv,'result' => $result,'session' => $session]);
return;
 } throw new Exception('L\' accès à été refusé <br> Vous n êtes pas autorisé à consulter cette page <br> HTTP ERROR 403');
             
}
public function ajoutEduc()
  {
session_start();
        if(isset($_SESSION['id']) && isset($_SESSION['pseudo'])){  
  $adminManager = new \Model\AdminManager();
 $result = $adminManager->identity();
   $view = new \Folio\View('backend/cv/ajoutEducView');
   $session = new \App\MessageFlash();
   $view->generer(['result' => $result,'session' =>$session]);
return;
 } throw new Exception('L\' accès à été refusé <br> Vous n êtes pas autorisé à consulter cette page <br> HTTP ERROR 403');      
    
}
public function updateEducation($edId,$title,$year,$description)
  {
     if (isset($_GET['id']) && $_GET['id'] > 0) {
   if (!empty(htmlspecialchars(ltrim($_POST['title']))) && !empty(htmlspecialchars(ltrim($_POST['year']))) && !empty(htmlspecialchars(ltrim($_POST['description'])))) {
   $cvManager = new \Model\CvManager();
   $cvManager->updateEdCv($edId,$title,$year,$description);
  
  $session = new \App\MessageFlash();
        $session->setFlash('Votre parcours scolaire à été modifiée','');
        header('location:index.php?action=education');
        exit;
    }else{
      $session = new \App\MessageFlash();
        $session->setFlash('Tous les champs ne sont pas remplis','');
         header('location:index.php?action=education');
        exit;
    } 
    }
         else{
      throw new Exception('Désolé une erreur est survenue,votre demande n\'a pas pu aboutir');
    }
       
}

public function inserEduc($title,$year,$description)
  {
     if (!empty(htmlspecialchars(ltrim($_POST['title']))) && !empty(htmlspecialchars(ltrim($_POST['year']))) && !empty(htmlspecialchars(ltrim($_POST['description'])))){
   $cvManager = new \Model\CvManager();
  $cvManager->insertEdCv($title,$year,$description);
   $session = new \App\MessageFlash();
   $session->setFlash('Votre formation à bien été ajoutée','');
   header('location:index.php?action=education');}else{
          $Session = new \App\MessageFlash();
          $Session->setFlash('Vous n\'avez pas rempli tous les champs',''); 
          header('location:index.php?action=ajoutEduc');
          exit;
      }
    }
public function deleteEducation()
  {
   session_start();
        if(isset($_SESSION['id']) && isset($_SESSION['pseudo'])){  
    $adminManager = new \Model\AdminManager();
   $cvManager = new \Model\CvManager();
   $edCv = $cvManager->getEdCv();
   $view = new \Folio\View('backend/cv/deleteEducView');
   $result = $adminManager->identity();
      $session = new \App\MessageFlash();
 $view->generer(['edCv' => $edCv,'result' => $result, 'session' =>$session]);
return;
}throw new Exception('L\' accès à été refusé <br> Vous n êtes pas autorisé à consulter cette page <br> HTTP ERROR 403');      
 }

public function deleteEduca()
  {
    if (isset($_GET['id']) && $_GET['id'] > 0) {
   $cvManager = new \Model\CvManager();
   $cvManager->deleteEdCv($_GET['id']);
   $session = new \App\MessageFlash();
   $session->setFlash('Votre formation à bien été suprimée','');
   header('location:index.php?action=deleteEduc');
return;
 }
      throw new Exception('Désolé une erreur est survenue,votre demande n\'a pas pu aboutir');    
}

}