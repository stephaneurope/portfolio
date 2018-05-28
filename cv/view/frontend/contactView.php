<?php 

$this->title = 'serri stephan' ;
include APPLICATION_PATH.'/view/menus/menu.php'; ?>
<section id="devis" class="container-fluid">
 
    <h2>DEVIS pour la création ou refonte d'un site internet</h2>
    <div class= "container cont rimg">

        <div class="  col-md-4">
            <img src="public/images/responsive.png" alt="creation site internet" class=" img-thumbnail img-responsive">
            <h5> Création de site internet</h5>

            <p>Nous créons des sites internet dynamiques, compatible pour les mobiles, simple d'utilisation et facile d'accès pour les internautes, administration intuitive pour les clients.</p></div>

            <div class="  col-md-4">
               <img src="public/images/charges.jpg" alt="creation site internet" class=" img-thumbnail img-responsive  ">          
               <h5 >  Forfaits TOUT COMPRIS</h5>
               <p>Hébergement, nom de domaine, site internet, graphisme, référencement : vous ne perdez plus de temps, nous nous chargeons de tout !
               </p></div>

               <div class=" col-md-4">
                <img src="public/images/referencement.png" alt="creation site internet" class=" img-thumbnail img-responsive ">
                <h5>RÉFÉRENCEMENT</h5>

                <p>Etre référencé sur des expressions pertinantes et très utilisées vous napporterons des visiteurs qui se convertiront en contact puis client.</p></div>
            </div>
        </section>
        <section id="contact" class="prog" style='background: #d82c2e;'>
            <div class="container contact">
                <div class="divider"></div>
                <div class="heading">
                    <h2>Contactez-moi</h2>
                </div>
                
                <div class="row" style="padding-bottom:20px;">
                 <div class="col-lg-10 col-lg-offset-1">
                    <form id="contact-form" method="post" action='index.php?action=contactForm' role="form">
                        <div class="row">
                            

                            <div class=" bar col-md-6">
                                <label for="name">Nom <span class="blue">*</span></label>
                                <input id="name" type="text" name="name" class="form-control" placeholder="Votre Nom">
                                <p class="comments"><?= $nameError ?></p>
                            </div>

                            <div class="bar col-md-6">
                                <label for="firstname">Prénom <span class="blue">*</span></label>
                                <input id="firstname" type="text" name="firstname" class="form-control" placeholder="Votre Prénom">
                                <p class="comments"><?= $firstnameError ?></p>
                            </div>
                            
                            <div class="bar col-md-6">
                                <label for="email">Email <span class="blue">*</span></label>
                                <input id="email" type="text" name="email" class="form-control" placeholder="Votre Email">
                                <p class="comments"><?= $mailError ?></p>
                            </div>
                            
                            <div class="bar col-md-6">
                                <label for="phone">Téléphone</label>
                                <input id="phone" type="tel" name="phone" class="form-control" placeholder="Votre Téléphone">
                                <p class="comments"><?= $phoneError ?></p>
                            </div>
                            
                            <div class="bar col-md-12">
                                <label for="message">Message <span class="blue">*</span></label>
                                <textarea id="message" name="message" class="form-control mceNoEditor" placeholder="Votre Message" rows="4"></textarea>
                                <p class="comments"><?= $messageError ?></p>
                            </div>
                            
                            <div class="col-md-12">
                                <p class="blue"><strong>* Ces informations sont requises.</strong></p>
                            </div>
                            <div class="col-md-12">
                                <input type="submit" class="button2" value="Envoyer">
                            </div>    
                        </div>
                        <p class="thank-you"><?= $message1 ?></p>
                    </form>
                </div>
            </div>
        </div>

    </section>
