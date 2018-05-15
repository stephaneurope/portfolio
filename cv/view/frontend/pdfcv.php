
<?php
require "vendor/autoload.php";
  
   $adminManager = new \Model\AdminManager();
    $cvManager = new \Model\CvManager();
   $result = $adminManager->identity();  
    $proCv = $cvManager->getProCv();
    $expCv = $cvManager->getExpCv();
    $avCv = $cvManager->getAvCv();
   $edCv = $cvManager->getEdCv();
?>

<style type="text/css">

    table { 
        width: 50%; 
        color: black; 
        font-family: helvetica; 
        line-height: 5mm; 
  

    }
 img{
    	width:100px;
    	border-radius:50%;
    	
    }
    hr{
color:#dedede;
    }
    td{
    	padding:10px;
    
    }
    td p {
    	margin-bottom:10px;
    }
    tr{
    	padding:10px;
    }
   .div1 {margin-right:50px;border-radius:50px; }
   .div2 {width:500px; } 
    .div3 {	list-style-type: none;margin-left: 50px; }  
     .div4 { list-style-type: none;width:470px;font-family: helvetica;}
     .div5 {list-style-type: none;width:500px} 
     .div6 {list-style-type: none;width:200px;
    float:left;} 
     .titre{
     	padding-right: 20px;
     	width:150px;
     }          
    h2 { margin: 0; padding: 0;color:red;line-height: 10mm;  }
    p { margin: 5px; }
 
  
   
</style>


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
                      <li>  <h3><?=$data3['title_education'];?></h3></li>
                        <li><?=$data3['title_secondary'];?></li>
                       <li><?=$data3['description_education'];?></li>
                       <?php } ?>
                       </ul>
                    </td>
     </tr>  
    </table>
</page>