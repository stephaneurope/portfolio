<?php 
  
    $this->title = 'serri stephan' ;
 include "menu.php" ;?>
    
 <div id="top">
    <div id="cv" class="instaFade">
   <div class="mainDetails">
            <div id="headshot" class="quickFade"> <img src="public/images/me2.jpg" alt="Alan Smith" /> </div>
            <div id="name">
                <?php while ($data0 = $result->fetch()){  ?>
                <h1 class="quickFade delayTwo"><?=$data0['nom'].' '.$data0['prenom'] ?></h1>
                <h2 class="quickFade delayThree"><?=$data0['works']?></h2> </div>
            <div id="contactDetails" class="quickFade delayFour">
                <ul>
                    <li>email: <a href="mailto:serri-stephan@gmail.com" target="_blank"><?=$data0['mail']?></a></li>
                    <li>web: <a href="<?=$data0['web']?>"><?=$data0['web']?></a></li>
                    <li>mobile: <?=$data0['mobile']?></li>
                </ul>
                <?php } ?>
            </div>
            <div class="clear"></div>
        </div>
          
        <div id="mainArea" class="quickFade delayFive">
              <section>
                
                <div class="sectionTitle">
                    <h1>Compétences</h1> </div>
                    <?php while ($data2 = $avCv->fetch()){ ?>
                <div class="sectionContent">
                    <ul class="keySkills">
                        
                        <form action="index.php?action=deleteCompet&id=<?=$data2['id']?>" method="post" enctype="multipart/form-data">
                        <li><input name='avantage' value="<?=$data2['avantage'];?>"/></li>
                               <input href="" type="submit" class="btn btn-danger " value=" Suprimer"> </div>
                    </ul>
                    
                <div class="clear"></div>
                    
                
            </form>
            <?php } ?>
            <a class="btn btn-primary btn1" href="index.php?action=boardCv"><span class="glyphicon glyphicon-arrow-left"> Retour</span></a>
            </section>
            
        
  
    </div>
</div>


