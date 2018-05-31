<?php 

$this->title = 'serri stephan' ;
include  APPLICATION_PATH.'/view/menus/menu.php';   ?>
<!-- Page Content -->

<section>
  <div class="container">

    <!-- Portfolio Item Heading -->
    <h1 class="my-4"><?= htmlspecialchars($portfolio['titre']) ?>
    
  </h1>

  <!-- Portfolio Item Row -->
  
  <div class="row">

    <div class="col-md-8">

      <img  class="rounded img-thumbnail img-responsive folview" src='/cv/public/images/<?= $portfolio['image'] ?>' alt="">
    </div>
    
    <div class="col-md-4">
      <h3 class="my-3">Description du Projet</h3>
      <p><?=  $portfolio['description'] ?></p>
      <h3 class="my-3">Technologies Utilisées</h3>
      <?= $portfolio['techno'] ?> <br>
      <?= $portfolio['comment'] ?>
      <br>      
      <div class="btnPortfolio">
        <a class="btn btn-primary" href="index.php?action=boardFolio"><span class="glyphicon glyphicon-arrow-left"> Retour</span></a>
      </div>
      
    </div>

    
  </div>

</section>
