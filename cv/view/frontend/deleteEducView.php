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
                    <h1>Formation</h1> </div>
                <?php while ($data3 = $edCv->fetch()){ ?>    
                <div class="sectionContent">
                    
                    <article>
                         <form action='index.php?action=deleteEduca&id=<?= $data3['id']?>' method="post">
                        <h2><input name ='title_education' value="<?=$data3['title_education'];?>"/></h2>
                        <p class="subDetails"><input name ='title_secondary' value="<?=$data3['title_secondary'];?>"/></p>
                        <p><textarea name ='description_education'><?=$data3['description_education'];?></textarea></p>
                        <input href="" type="submit" class="btn btn-danger " value=" Suprimer">
                    </article>
                     
                </div>
           
                <div class="clear"></div>
                    <div class="form-actions">
                    
                
            </form>
             <?php } ?>

             <a class="btn btn-primary btn1" href="index.php?action=boardCv"><span class="glyphicon glyphicon-arrow-left"> Retour</span></a> </div>
            </section>
            
        
  
    </div>
</div>


