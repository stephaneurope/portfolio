<?php 

$this->title = 'serri stephan' ;
include APPLICATION_PATH.'/view/menus/menu.php' ;?>
<div id="top">

    <div id="cv" class="instaFade">

        <div class="mainDetails">
         
          <?php while ($data0 = $result->fetch()){  ?>  
            <div id="headshot" class="img_profil quickFade"> <img src="public/images/<?=$data0['profil_img']?>"  alt="Serri Stephan" /> </div>
            <div id="imprime_moi">
                <div id="name">
                    
                    <h1 class="quickFade delayTwo"><?=$data0['nom'].' '.$data0['prenom'] ?></h1>
                    <h2 class="quickFade delayThree"><?=$data0['works']?></h2> </div>
                    <div id="contactDetails" class="quickFade delayFour">
                        <ul>
                            <li>Email: <a href="mailto:serri-stephan@gmail.com" target="_blank"><?=$data0['mail']?></a></li>
                            <li>Web: <a href="<?=$data0['web']?>"><?=$data0['web']?></a></li>
                            <li>Mobile: <?=$data0['mobile']?></li>
                        </ul>
                        <?php } ?>
                    </div>

                    <div class="clear"></div>
                    
                    <div id="mainArea" class="quickFade delayFive">
                        <section>
                     
                                <div class="sectionTitle">
                                    <h2> Profil Personnel</h2> </div><br>
                                    <div class="sectionContent">
                                        <?php while ($data = $proCv->fetch()){  
                                            echo $data['profil'];} ?>
                                        </div>
                                  
                                    <div class="clear"></div>
                                </section>
                                <section>
                                    <div class="sectionTitle">
                                        <h2>Experience Professionelle</h2> </div>
                                        <div class="sectionContent">
                                           <?php while ($data1 = $expCv->fetch()){ ?>
                                            <article>
                                                <h2><?= htmlspecialchars($data1['title']);?></h2>
                                                <p class="subDetails"><?= htmlspecialchars($data1['period']);?></p>
                                                <p><?=$data1['description'];?></p>
                                            </article>
                                            <?php }  ?>
                                        </div>
                                        <div class="clear"></div>
                                    </section>
                                    <section>
                                        <div class="sectionTitle">
                                            <h2>Compétences</h2> </div>
                                            <div class="sectionContent">
                                                <ul class="keySkills">
                                                    <?php while ($data2 = $avCv->fetch()){ ?>
                                                        <li><?= htmlspecialchars($data2['avantage']);?></li>
                                                        <?php } ?>
                                                    </ul>
                                                </div>
                                                <div class="clear"></div>
                                            </section>
                                            <section>
                                                <div class="sectionTitle">
                                                    <h2>Formation</h2> </div>
                                                    <div class="sectionContent">
                                                        <?php while ($data3 = $edCv->fetch()){ ?>
                                                            <article>
                                                                <h2><?= htmlspecialchars($data3['title']);?></h2>
                                                                <p class="subDetails"><?= htmlspecialchars($data3['year']);?></p>
                                                                <p><?=$data3['description'];?></p>
                                                            </article>
                                                            <?php } ?>  
                                                        </div>
                                                        <div class="clear"></div>
                                                    </section>
                                                </div>
                                            </div>
                                        </div>
                                    </div> 
                                    <div class='imprime'>
                                        <button  id="btn_imprime" class='btn btn-danger'><i class="fas fa-print"></i> Imprimer</button> <a href="index.php?action=pdf"><i class="fa fa-download"></i> Télécharger</a></div>
                                        

                                    </div>

                                    <script>Impression.imprimer();</script>
                                    