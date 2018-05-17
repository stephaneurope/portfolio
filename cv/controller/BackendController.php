<?php
namespace Controller;

//require "vendor/autoload.php"; 

class BackendController{
  public $titreError = "" ;
  public $descriptionError = "";
  public $technoError = "";
  public $commentError = "";
  public $imageError = "";
  public $liensError = "";
  public $titre = "";
  public $description = "";
  public $techno = "";
  public $comment = "";
  public $image = "";
  public $liens = "";
  public $isSuccess = true;
  public $wrong = "";
  public $imagePath      = '';
  public $imageExtension = '';
  public $isUploadSuccess = false;
  public $isImageUpdated = false;


   public function portfolioInsert()
{
    $view = new \Folio\View('portfolioInsert');
    $view->generer(['titreError'=>$this->titreError, 'descriptionError'=>$this->descriptionError, 'technoError'=>$this->technoError, 'commentError'=>$this->commentError,'imageError'=>$this->imageError,'liensError'=>$this->liensError,'titre'=>$this->titre,'description'=>$this->description,'techno'=>$this->techno,'comment'=>$this->comment,'image'=>$this->image,'liens'=>$this->liens,'isSuccess'=>$this->isSuccess]);
  }
public function portfolioInsertAction($image, $description, $techno, $comment, $titre,$liens)
{
 session_start();
    

  if(!empty($_POST))
{
    $this->titre           = htmlspecialchars(ltrim(($_POST['titre'])));
    $this->description     = htmlspecialchars(ltrim(($_POST['description'])));
    $this->techno          = htmlspecialchars(ltrim(($_POST['techno'])));
    $this->comment         = htmlspecialchars(ltrim(($_POST['comment'])));
    $this->liens           = htmlspecialchars(ltrim(($_POST['liens'])));
    $this->image           = htmlspecialchars(ltrim(($_FILES['image']['name'])));
    $this->imagePath       = '../cv/public/images/' . basename($this->image);
    $this->imageExtension  = pathinfo($this->imagePath, PATHINFO_EXTENSION);
    $this->isSuccess       = true;
    $this->isUploadSuccess = true;


if(empty($this->titre)){
        $this->titreError = 'Ce champ ne peut pas etre vide';
        $this->isSuccess     = false;
        
      }

 if(empty($this->description)){
        $this->descriptionError = 'Ce champ ne peut pas etre vide';
        $this->isSuccess     = false;
         
      }
  if(empty($this->techno)){
        $this->technoError = 'Veuillez sélectionner au moins une technologie';
       $this->isSuccess    = false;
       
      }
   if(empty($this->comment)){
        $this->commentError = 'Ce champ ne peut pas etre vide';
       $this->isSuccess    = false;
       
      }    
      if(empty($this->liens)){
        $this->liensError = 'Ce champ ne peut pas etre vide';
        $this->isSuccess     = false;
       
      }   
      if(empty($this->image)){
        $this->imageError = 'Ce champ ne peut pas etre vide';
       $this->isSuccess     = false;
    
      }
      else
    {
        $this->isUploadSucces = true;

        if($this->imageExtension != "jpg" && $this->imageExtension != "png" && $this->imageExtension != "jpeg" && $this->imageExtension != "gif")
        {
            $this->imageError = "Les fichiers autorisés sont: .jpg, .jpeg, .png, .gif";
            $this->isUploadSuccess = false;
        }
        if(file_exists($this->imagePath))
        {
            $this->imageError = "Le fichier existe déja";
            $this->isUploadSuccess = false; 
        }
        if($_FILES["image"]["size"] > 500000)
        {
            $this->imageError = "Le fichier ne doit pas dépasser les 500KB";
            $this->isUploadSuccess = false;
        }
        if($this->isUploadSuccess)
        {
            if(!move_uploaded_file($_FILES["image"]["tmp_name"], $this->imagePath))
            {
            $this->imageError = "Il y a eu une erreur lors de l'upload";
            $this->isUploadSuccess = false;
            }

      }  
    }    
       if($this->isSuccess && $this->isUploadSuccess) {
    $folioManager = new \Model\FolioManager();
    $portfolio = $folioManager->insertfolio($image, $description, $techno, $comment, $titre, $liens);
    header('location:index.php?action=boardFolio');
    exit();
} else {
    $view = new \Folio\View('portfolioInsert');
    $view->generer(
        [
            'titreError'=>$this->titreError,
            'descriptionError'=>$this->descriptionError,
            'technoError'=>$this->technoError,
            'commentError'=>$this->commentError,
            'imageError'=>$this->imageError,
            'liensError'=>$this->liensError,
            'titre'=>$this->titre,
            'description'=>$this->description,
            'techno'=>$this->techno,
            'comment'=>$this->comment,
            'image'=>$this->image,
            'liens'=>$this->liens,
            'isSuccess'=>$this->isSuccess
        ]
    );
}
    
 }  


}

public function imageFolio()
{
  $folioManager = new \Model\FolioManager();
  $portfolio = $folioManager->getFolio($_GET['id']); 
 $view = new \Folio\View('imagefolioView');
    $view->generer(['portfolio' => $portfolio,'imageError'=>$this->imageError]);
}

public function changeImage($folioId, $image){
    $this->image  = htmlspecialchars(ltrim((($_FILES['image']['name']))));
    $this->imagePath       = '../cv/public/images/' . basename($this->image);
    $this->imageExtension  = pathinfo($this->imagePath, PATHINFO_EXTENSION);
    $this->isSuccess       = true;
    $this->isUploadSuccess = true;
    $this->isImageUpdated = true;
 
    
       if(empty($this->image)){
        $this->isImageUpdated = false;
        $this->imageError = "Vous n'avez pas selectionné de fichiers";
      }
      else
    {
       $this->isImageUpdated = true;
       $this->isUploadSucces = true;
        if($this->imageExtension != "jpg" && $this->imageExtension != "png" && $this->imageExtension != "jpeg" && $this->imageExtension != "gif")
        {
            $this->imageError = "Les fichiers autorisés sont: .jpg, .jpeg, .png, .gif";
            $this->isUploadSuccess = false;
        }
        if($_FILES["image"]["size"] > 500000)
        {
           $this->imageError = "Le fichier ne doit pas dépasser les 500KB";
           $this->isUploadSuccess = false;
        }
        if($this->isUploadSuccess)
        {
            if(!move_uploaded_file($_FILES["image"]["tmp_name"], $this->imagePath))
            {
            $this->imageError = "Il y a eu une erreur lors de l'upload";
            $this->isUploadSuccess = false;
            }

      }  
    } 
if(($this->isImageUpdated && $this->isUploadSuccess)) {
$portfolio = new \Model\FolioManager();
 $result = $portfolio->updateImage($folioId,$image);

 header('location:index.php?action=imageFolio&id='. $folioId);
 exit();
}else{


$folioManager = new \Model\FolioManager();
  $portfolio = $folioManager->getFolio($_GET['id']); 
 $view = new \Folio\View('imagefolioView');
    $view->generer(['portfolio' => $portfolio,'imageError'=>$this->imageError,'image'=>$this->image,'imagePath '=>$this->imagePath,'imageExtension '=>$this->imageExtension,'isSuccess' =>$this->isSuccess,'isUploadSuccess'=>$this->isUploadSuccess,'isImageUpdated'=>$this->isImageUpdated]);

   
}

}



public function boardFolio()
{
    $folioManager = new \Model\FolioManager();
    $portfolio = $folioManager->getFolio2(); 
    $view = new \Folio\View('boardFolio');
    $view->generer(['portfolio' => $portfolio]);
}


public function projectView()
  {
    $folioManager = new \Model\FolioManager();
    $portfolio = $folioManager->getFolio($_GET['id']); 
 
  
    $view = new \Folio\View('projectView');
    $view->generer(['portfolio'=>$portfolio]);
    
}

public function cleanProject($folioId){
       $folioManager = new \Model\FolioManager();
    $portfolio = $folioManager->getFolio($_GET['id']); 
       $view = new \Folio\View('deleteProjectView'); 
       $view->generer(['portfolio'=>$portfolio]);
   }


 public function eraseProject($folioId){
       $folioManager = new \Model\FolioManager();
       $deleteLines = $folioManager->deleteProject($_GET['id']);
       header('Location: index.php?action=boardFolio');
       exit;
   }

public function portfolioModif($folioId)
{
    $folioManager = new \Model\FolioManager();
    $portfolio = $folioManager->getFolio($_GET['id']); 
    $view = new \Folio\View('portfolioModif');
    $view->generer(['titreError'=>$this->titreError, 'descriptionError'=>$this->descriptionError, 'technoError'=>$this->technoError, 'commentError'=>$this->commentError,'liensError'=>$this->liensError,'titre'=>$this->titre,'description'=>$this->description,'techno'=>$this->techno,'comment'=>$this->comment,'liens'=>$this->liens,'isSuccess'=>$this->isSuccess, 'wrong'=>$this->wrong,'portfolio'=>$portfolio]);
  }

     public function portfolioModifAction($folioId,$description, $techno, $comment, $titre,$liens)
    {

    
session_start();
  if(!empty($_POST))
{
    $this->titre           = htmlspecialchars(ltrim(($_POST['titre'])));
    $this->description     = htmlspecialchars(ltrim(($_POST['description'])));
    $this->techno          = htmlspecialchars(ltrim(($_POST['techno'])));
    $this->comment         = htmlspecialchars(ltrim(($_POST['comment'])));
    $this->liens           = htmlspecialchars(ltrim(($_POST['liens'])));
    $this->isSuccess       = true;


if(empty($this->titre)){
        $this->titreError = 'Ce champ ne peut pas etre vide';
        $this->isSuccess     = false;
        
      }

 if(empty($this->description)){
        $this->descriptionError = 'Ce champ ne peut pas etre vide';
        $this->isSuccess     = false;
         
      }
  if(empty($this->techno)){
        $this->technoError = 'Veuillez sélectionner au moins une technologie';
       $this->isSuccess    = false;
       
      }
     
      if(empty($this->liens)){
        $this->liensError = 'Ce champ ne peut pas etre vide';
        $this->isSuccess     = false;
       
      }   
         
       if($this->isSuccess == true) {
       
    $folioManager = new \Model\FolioManager();
      $portfolio = $folioManager->getFolio($_GET['id']); 
    $reaffected = $folioManager->updateProject($folioId,$description, $techno, $comment, $titre, $liens);
    $view = new \Folio\View('portfolioModif');
    header('location:index.php?action=boardFolio');
        $view->generer(
        [
            'titreError'=>$this->titreError,
            'descriptionError'=>$this->descriptionError,
            'technoError'=>$this->technoError,
            'commentError'=>$this->commentError,
            'liensError'=>$this->liensError,
            'titre'=>$this->titre,
            'description'=>$this->description,
            'techno'=>$this->techno,
            'comment'=>$this->comment,
            'liens'=>$this->liens,
            'isSuccess'=>$this->isSuccess,
            'wrong'=>$this->wrong,
            'portfolio'=>$portfolio
        ]
    );  

}else{
  $folioManager = new \Model\FolioManager(); 
$portfolio = $folioManager->getFolio($_GET['id']); 
$this->$wrong = 'Désolé une erreur est survenu,veuillez recommencer';
      $view = new \Folio\View('portfolioModif');

        $view->generer(
        [
            'titreError'=>$this->titreError,
            'descriptionError'=>$this->descriptionError,
            'technoError'=>$this->technoError,
            'commentError'=>$this->commentError,
            'liensError'=>$this->liensError,
            'titre'=>$this->titre,
            'description'=>$this->description,
            'techno'=>$this->techno,
            'comment'=>$this->comment,
            'liens'=>$this->liens,
            'isSuccess'=>$this->isSuccess,
            'wrong'=>$this->wrong,
            'portfolio'=>$portfolio

        ]
    );
} 
   
 }  

}


public function boardPrincipal()
  {
    $session = new \App\MessageFlash();
 $view = new \Folio\View('interface');
 $view->generer(['session' => $session]);    
}


public function connect(){ 
 $session = new \App\MessageFlash();
 $view = new \Folio\View('connectView'); 
 $view->generer(['session' => $session]);
}

}