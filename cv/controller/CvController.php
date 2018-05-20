<?php
namespace Controller;

//require "vendor/autoload.php"; 

class CvController{
public function boardCv()
  {
 $view = new \Folio\View('boardCv');
 $view->generer([]);    
}

public function profilPersonnel()
  {
    $adminManager = new \Model\AdminManager();
   $cvManager = new \Model\CvManager();
$session = new \App\MessageFlash();
 $result = $adminManager->identity();

   $proCv = $cvManager->getProCv();
   
   $view = new \Folio\View('profilPersonnel');
   $view->generer(['proCv' => $proCv,'result' => $result,'session' => $session]);
    
}
public function updateProfilPersonnel($profil)
  {
    if (!empty(htmlspecialchars(ltrim($_POST['profil'])))) {
   $cvManager = new \Model\CvManager();
   $affected = $cvManager->updateProCv($profil);
      $session = new \App\MessageFlash();
        $session->setFlash('Le profil Personnel à été modifié','');
        header('location:index.php?action=profilPersonnel');
        
    }else{
        $session = new \App\MessageFlash();
        $session->setFlash('Tous les champs ne sont pas remplis','');
        header('location:index.php?action=profilPersonnel');
        exit;
    }

    
}
public function experienceProfessionnel()
  {
    $adminManager = new \Model\AdminManager();
   $cvManager = new \Model\CvManager();
   $expCv = $cvManager->getExpCv();
 $result = $adminManager->identity();
 $session = new \App\MessageFlash();
   $view = new \Folio\View('experienceProfessionnel');
   $view->generer(['expCv' => $expCv,'result' => $result,'session' => $session]);
    
}
public function ajoutExPro()
  {
   $adminManager = new \Model\AdminManager();
   $result = $adminManager->identity();
   $session = new \App\MessageFlash();
   $view = new \Folio\View('ajoutExProView');
   $view->generer(['result' => $result,'session' => $session]);
    
}
public function updateExperienceProfessionnel($expId,$title,$period,$description)
  {
    if (!empty(htmlspecialchars(ltrim($_POST['title']))) && !empty(htmlspecialchars(ltrim($_POST['period']))) && !empty(htmlspecialchars(ltrim($_POST['description'])))) {
    
   $cvManager = new \Model\CvManager();
   $cvManager->updateExpCv($expId,$title,$period,$description);
   $session = new \App\MessageFlash();
        $session->setFlash('Votre expérience professionnelle à été modifiée','');
       header('location:index.php?action=experienceProfessionnel');
        exit;
    }else{
      $session = new \App\MessageFlash();
        $session->setFlash('Tous les champs ne sont pas remplis','');
        header('location:index.php?action=experienceProfessionnel');
        exit;
    }
    
}
public function insertExPro($title,$period,$description)
  {
     if (!empty(htmlspecialchars(ltrim($_POST['title']))) && !empty(htmlspecialchars(ltrim($_POST['period']))) && !empty(htmlspecialchars(ltrim($_POST['description'])))){
   $cvManager = new \Model\CvManager();
   $cvManager->insertExpCv($title,$period,$description);
   $session = new \App\MessageFlash();
   $session->setFlash('Votre expérience professionnelle a bien été ajoutée','');
   header('location:index.php?action=experienceProfessionnel');}else{
          $Session = new \App\MessageFlash();
          $Session->setFlash('Vous n\'avez pas rempli tous les champs',''); 
          header('location:index.php?action=experienceProfessionnel');
          exit;
      }
    
}
public function deleteExp()
  {
    $adminManager = new \Model\AdminManager();
  $cvManager = new \Model\CvManager();
   $expCv = $cvManager->getExpCv();
   $result = $adminManager->identity();
   $view = new \Folio\View('deleteExpView');
   $view->generer(['expCv' => $expCv,'result' => $result]);
    
}
public function deleteExPro($id)
  {
   $cvManager = new \Model\CvManager();
   $affected = $cvManager->deleteExpCv($_GET['id']);
 
   header('location:index.php?action=experienceProfessionnel');
    
}

public function competences()
  {
    $adminManager = new \Model\AdminManager();
   $cvManager = new \Model\CvManager();
   $avCv = $cvManager->getAvCv();
   $view = new \Folio\View('competences');
   $result = $adminManager->identity();
   $session = new \App\MessageFlash();
   $view->generer(['avCv' => $avCv,'result' => $result, 'session' => $session]);
   
}
public function ajoutComp()
  {

  $adminManager = new \Model\AdminManager();
 $result = $adminManager->identity();
   $view = new \Folio\View('ajoutCompView');
    $session = new \App\MessageFlash();
   $view->generer(['result' => $result,'session' => $session]);
    
}
public function updateCompetence($avId,$avantage)
  {
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
public function insertCompetence($avantage)
  {
     if (!empty(htmlspecialchars(ltrim($_POST['avantage'])))){
   $cvManager = new \Model\CvManager();
   $affected = $cvManager->insertAvCv($avantage);
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
    $adminManager = new \Model\AdminManager();
   $cvManager = new \Model\CvManager();
   $avCv = $cvManager->getAvCv();
   $result = $adminManager->identity();
   $view = new \Folio\View('deleteCompView');
   $view->generer(['avCv' => $avCv,'result'=> $result]);
   
}
public function deleteCompet($id)
  {
   $cvManager = new \Model\CvManager();
   $cvManager->deleteAvCv($_GET['id']);
 
   header('location:index.php?action=competences');
    
}

public function education()
  {
   $adminManager = new \Model\AdminManager();
   $cvManager = new \Model\CvManager();
   $edCv = $cvManager->getEdCv();
   $result = $adminManager->identity();
   $view = new \Folio\View('education');
   $session = new \App\MessageFlash();
   $view->generer(['edCv' => $edCv,'result' => $result,'session' => $session]);
    
}
public function ajoutEduc()
  {

  $adminManager = new \Model\AdminManager();
 $result = $adminManager->identity();
   $view = new \Folio\View('ajoutEducView');
   $session = new \App\MessageFlash();
   $view->generer(['result' => $result,'session' =>$session]);
    
}
public function updateEducation($edId,$title,$year,$description)
  {
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
    $adminManager = new \Model\AdminManager();
   $cvManager = new \Model\CvManager();
   $edCv = $cvManager->getEdCv();
   $view = new \Folio\View('deleteEducView');
   $result = $adminManager->identity();
      $session = new \App\MessageFlash();
 $view->generer(['edCv' => $edCv,'result' => $result, 'session' =>$session]);
    
}

public function deleteEduca($id)
  {
   $cvManager = new \Model\CvManager();
   $cvManager->deleteEdCv($_GET['id']);
   $session = new \App\MessageFlash();
   $session->setFlash('Votre formation à bien été suprimée','');
   header('location:index.php?action=deleteEduc');

    
}
}