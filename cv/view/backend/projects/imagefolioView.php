<?php  include APPLICATION_PATH.'/view/menus/menu.php' ;

?>

        <div class="container admin">
            <div >
              
                <h1><strong>Modifier cette image </strong></h1>
                   
                    <h3 ><?= $portfolio['titre'] ?></h3>

        <div class="col-md-6">

          <img class="rounded mx-auto img-thumbnail img-responsive"  src='/cv/public/images/<?= $portfolio['image'] ?>' alt="">
        </div>
        <div class="col-md-6">
        <form class="form" role="form" action="index.php?action=imageModif&id=<?= $portfolio['id'] ;?>" method="post" enctype="multipart/form-data">
<div class="form-group">
                        <label for="image">Sélectionner une image:</label>
                        <input type="file" id="image" name="image">
                        <span class="help-inline"><?= $imageError;?></span>
                    
                        </div>
                        </div>
<div class="form-actions">
                    <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-pencil"></span> Modifier</button>
                    <a class="btn btn-primary" href="index.php?action=boardFolio"><span class="glyphicon glyphicon-arrow-left"> Retour</span></a>
                    </div>
</form>
</div>
                
            </div>