<?php 

    $this->title = 'serri stephan' ;
    include APPLICATION_PATH.'/view/menus/menu.php' ;

    ?>
<!-- Page Content -->

<section id="folio">
    <div class="container">

      <!-- Portfolio Item Heading -->
      <h1 class="my-4"><?= $portfolio['titre'] ?>
        
      </h1>

      <!-- Portfolio Item Row -->
   
      <div class="row">

        <div class="col-md-8">

          <img  id ="d-block" class="rounded  img-thumbnail img-responsive" src='/cv/public/images/<?= $portfolio['image'] ?>' alt="">
        </div>
  
        <div class="col-md-4">
          <h3 class="my-3">Description du Projet</h3>
          <p><?= $portfolio['description'] ?></p>
          <h3 class="my-3">Technologies Utilisées</h3>
          <?= $portfolio['techno'] ?> <br>
          <?= $portfolio['comment'] ?>
          <br>
           <a target='blank' href="<?= $portfolio['liens'] ?>"><button type ='btn' class= "btn btn-danger">Accès au site</button></a>
        </div>
        </div>

 
      </div>

</div>
</section>

</div>
<section id="portfolio">
      
        <div class="container folioView">
            <div class="red-divider"></div>
            <div class="heading">
                 <div class="white-divider"></div>
                <h2>Portfolio</h2> </div>
    
               <div id="myCarousel" class="carousel slide text-center" data-ride="carousel">
              
                <div class="carousel-inner" role="listbox">
                  <div class="item active">
                        <a class="thumbnail" href="" target="_blank"> <img src="/cv/public/images/portfolio1.jpeg" class="img-responsive " > </a></div>
                    
             
                     <?php while ($data = $portfol->fetch())
                      { ?>
                    <div class="item ">
                        <a class="thumbnail" href="index.php?action=portfolio&amp;id= <?php echo $data['id'] ?>" target=""> <img src="/cv/public/images/<?php echo $data['image'] ; ?>" alt="site agence web" class="img-responsive"> </a></div><?php  } ?>
                    
                </div>
               <a class="left carousel-control" href="#myCarousel" data-slide="prev" role="button"> <span class="glyphicon glyphicon-chevron-left"></span> </a>
                <a class="right carousel-control" href="#myCarousel" data-slide="next" role="button"> <span class="glyphicon glyphicon-chevron-right"></span> </a>
            </div>
        </div>
    </section>