<link type="text/css" href="./public/css/pdf.css" rel="stylesheet" />
<style type="text/css"></style>


<?php

require "vendor/autoload.php";
  
   
?>




<page backtop="10mm" backleft="05mm" backright="05mm" backbottom="10mm">

	
<table>
        <tr>
<?php while ($data0 = $result->fetch()){  ?> 
            <td><img class="div1" src="public/images/<?=$data0['profil_img']?>"  alt="stephan serri"></td>
            <td>
           <h1><?=$data0['nom'].' '.$data0['prenom'] ?></h1>
             <h2 style="color:black;"><?=$data0['works']?></h2>

            </td>
            
            <td>
        <div class="div3">
                <ul class="div div3">
                    <li>Email: <a href="mailto:serri-stephan@gmail.com" target="_blank"><?=$data0['mail']?></a></li>
                    <li>Web: <a href="<?=$data0['web']?>"><?=$data0['web']?></a></li>
                    <li>Mobile: <?=$data0['mobile']?></li>
                </ul> <?php } ?>	
      
 </div>
            </td>

        </tr>
        </table>
        <br><br>
 <hr style="color:red;">

      <table>  
     <tr>
     	<td class="titre"><h2> Profil <br>Personnel</h2></td>
     	<td class="div4">

                        <?php while ($data = $proCv->fetch()){  
                echo $data['profil'];} ?></td>


     </tr>  
    </table>
<hr>
 <table>  
     <tr>
     	<td class="titre"><h2> Expèrience <br>Professionnelle</h2></td>
     	<?php while ($data1 = $expCv->fetch()){ ?><td class="div4"><h3><?=$data1['title'];?></h3>
<p><?=$data1['period'];?></p>

<p><?=$data1['description'];?></p></td>
<?php }  ?>

     </tr>  
    </table>
    <br>
    <hr>
<table>  
     <tr>
     	<td class="titre"><h2> Compétences</h2></td>
 
<td>
	<br>
<?php while ($data2 = $avCv->fetch()){ ?>
                        <?=$data2['avantage'];?>    /            
                        <?php } ?>   <br><br></td>


     </tr>  
    </table>
    <hr>
 <table>  
     <tr>
     	<td class="titre">

     		<h2> Formation</h2></td>
     	
                    <td>
                    	<ul class="div5">
                    		<?php while ($data3 = $edCv->fetch()){ ?>
                      <li>  <h3><?=$data3['title'];?></h3></li>
                        <li><?=$data3['year'];?></li>
                       <li><?=$data3['description'];?></li>
                       <?php } ?>
                       </ul>
                    </td>
     </tr>  
    </table>
</page>