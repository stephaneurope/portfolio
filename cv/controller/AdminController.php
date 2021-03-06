<?php
namespace Controller;
use Exception;
class AdminController{
  
 public function connexion($pseudo,$pass) {
  $adminManager = new \Model\AdminManager();
  $resultat = $adminManager->connected($pseudo,$pass);
  
  
  $isPasswordCorrect = password_verify($_POST['pass'],$resultat['pass']);
  
  if (!$resultat)
  {
   $Session = new \App\MessageFlash();
   $Session->setFlash('Mauvais identifiant ou mot de Passe','');
   header('Location: index.php?action=connect');

 }
 else
 {
  if ($isPasswordCorrect) {
    
   if (!empty($_POST['pseudo']) && !empty($_POST['pass'])){

    $Session = new \App\MessageFlash();
    $_SESSION['id'] = $resultat['id'];
    $_SESSION['pseudo'] = $pseudo;
    
    $Session->setFlash('Vous etes connecté','');
    
    header('Location: index.php?action=boardPrincipal'); 

  }   
  
}
else {
  $Session = new \App\MessageFlash();
  $Session->setFlash('Mauvais identifiant ou mot de Passe','');
  header('Location: index.php?action=connect');
  exit;
}
}
}

public function deleteSession() {
 

  // Suppression des variables de session et de la session
  $_SESSION = array();
  session_destroy();

  // Suppression des cookies de connexion automatique
  setcookie('login', '');
  setcookie('pass', '');
  header('Location: index.php?action=accueil');
  exit;
}
public function profil(){

  if($_SESSION['id'] && $_SESSION['pseudo']){ 
    $adminManager = new \Model\AdminManager();
    $result = $adminManager->identity();  
    $view = new \Folio\View('backend/profil');
    $session = new \App\MessageFlash();
    $imageError = '';
    $view->generer(['result' => $result,'session' => $session,'imageError'=>$imageError]);
    return;
  }
  throw new Exception('L\' accès à été refusé <br> Vous n êtes pas autorisé à consulter cette page <br> HTTP ERROR 403');      
  
}

public function updateProfil($pseudo, $nom, $prenom,$mail, $web, $mobile, $works) {


  if($_SESSION['id'] && $_SESSION['pseudo']){ 

   if(!empty($_POST))
   {      
    $pseudo = htmlspecialchars(ltrim(($_POST['pseudo'])));
    $nom = htmlspecialchars(ltrim(($_POST['nom'])));
    $prenom = htmlspecialchars(ltrim(($_POST['prenom'])));
    $mail = htmlspecialchars(ltrim(($_POST['mail'])));
    $web = htmlspecialchars(ltrim(($_POST['web'])));
    $mobile = htmlspecialchars(ltrim(($_POST['mobile'])));
    $works = htmlspecialchars(ltrim(($_POST['works'])));
    
    $adminManager = new \Model\AdminManager();
    $adminManager->updateIdentity($pseudo, $nom, $prenom,$mail, $web, $mobile,$works); 
    $session = new \App\MessageFlash();
    $session->setFlash('Votre profil a été modifié','');
    header('location:index.php?action=profil');
    return;
  }   $Session = new \App\MessageFlash();
  $Session->setFlash('Vous n\'avez pas rempli tous les champs',''); 
  header('location:index.php?action=profil');
  exit;
  
}else{
 throw new Exception('L\' accès à été refusé <br> Vous n êtes pas autorisé à consulter cette page <br> HTTP ERROR 403');      
}

}
public function updateProImg($profil_img){
  $image           = (htmlspecialchars(ltrim(($_FILES['profil_image']['name']))));
  $imagePath       = '../cv/public/images/' . basename($image);
  $imageExtension  = pathinfo($imagePath, PATHINFO_EXTENSION);
  $isSuccess       = true;
  $isUploadSuccess = true;
  $isImageUpdated = true;
  $imageError = '';


  if($_SESSION['id'] && $_SESSION['pseudo']){
   if(empty($image)){
    $isImageUpdated = false;
    $imageError = "Vous n'avez sélectionné aucun fichiers!"; 
  }
  else
  {
   $isImageUpdated = true;
   $isUploadSucces = true;
   if($imageExtension != "jpg" && $imageExtension != "png" && $imageExtension != "jpeg" && $imageExtension != "gif")
   {
    $imageError = "Les fichiers autorisés sont: .jpg, .jpeg, .png, .gif";
    $isUploadSuccess = false;
  }
  if($_FILES["profil_image"]["size"] > 500000)
  {
    $imageError = "Le fichier ne doit pas dépasser les 500KB";
    $isUploadSuccess = false;
  }
  if($isUploadSuccess)
  {
    if(!move_uploaded_file($_FILES["profil_image"]["tmp_name"], $imagePath))
    {
      $imageError = "Il y a eu une erreur lors de l'upload";
      $isUploadSuccess = false;
    }

  }  
} 
if(($isSuccess && $isImageUpdated && $isUploadSuccess)) {
  $adminManager = new \Model\AdminManager();
  $result = $adminManager->updateProfilImg($profil_img);
  header('location:index.php?action=profil');
  return;
} 
$adminManager = new \Model\AdminManager();
$result = $adminManager->identity();  
$view = new \Folio\View('backend/profil');
$session = new \App\MessageFlash();
$view->generer(
  [
    'result' => $result,
    'session' => $session,
    'imageError'=>$imageError,
    'image'=>$image,
    'isSuccess'=>$isSuccess
  ]
);

}
}

}