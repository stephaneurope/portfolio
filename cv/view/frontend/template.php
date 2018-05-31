<!DOCTYPE html>
<html lang="fr">
<head>

    <meta charset="utf-8" />
    <meta name="author" content="Serri Stephan" />
    <meta name="description" content="cv personnel de serri stephan webmaster" />
    <meta name="copyright" content="©serri-stephan" />
    <meta property="og:title" content="serri-stephan.com" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="" />
    <meta property="og:image" content="" />
    <meta property="og:description" content="cv personnel de serri stephan webmaster" />
    <meta name="twitter:card" content="summary">
    <meta name="twitter:site" content="@publisher_handle">
    <meta name="twitter:title" content="cv personnel de serri stephan webmaster">
    <meta name="twitter:description" content="cv personnel de serri stephan webmaster">
    <meta name="twitter:creator" content="Serri Stephan">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/me3.jpeg" href="serri-stephan" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"> 
    <link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Rokkitt" rel="stylesheet">
    <link rel="stylesheet" href="public/css/style.css">
    <link rel="stylesheet" href="public/css/styleCv.css">
    <link href="https://fonts.googleapis.com/css?family=Oxygen" rel="stylesheet">
    <link rel="stylesheet" href="public/font-awesome-4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Gloria+Hallelujah%7CPacifico%7CPermanent+Marker" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> 
    <script defer src="https://use.fontawesome.com/releases/v5.0.9/js/all.js" integrity="sha384-8iPTk2s/jMVj81dnzb/iFR2sdA7u06vHJyyLlAd4snFpCl/SnyUjRrbdJsw1pGIl" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-1.12.3.js" integrity="sha256-1XMpEtA4eKXNNpXcJ1pmMPs8JV+nwLdEqwiJeCQEkyc=" crossorigin="anonymous"></script>
    <script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=i9qtcs3a3bdsajmuw9vustqee9f5wd2z1pnc8mpv2bjzzzn0
    "></script>
    <script src="public/js/ajax.js"></script>
    <script src="public/js/instagram.js"></script>
    <script src="public/js/impression.js"></script>
    <script src="public/js/checkbox.js"></script>
    <script src="public/langs/fr_FR.js"></script>
    <script>
        tinymce.init({
            selector: "textarea"
            , selector: "textarea:not(.mceNoEditor)"
            , language_url: "public/langs/fr_FR.js"
            , theme: "modern"
            , entity_encoding: "raw"
            , plugins: "lists advlist image imagetools"
            , forced_root_block: false
            , force_br_newlines: true
            , force_p_newlines: false
        });
    </script>
     

    <title>
        <?= $title ?>
    </title>
</head>
   

<body>
  
   <div id="main">
    <?= $content ?>

  </div>

<footer class=" text-center
container-fluid navbar-fixed-bottom">       
<?php if ($_SESSION) { ?><a href="index.php?action=deconnexion" style='color:#fff;'>déconnexion</a><br><a href="index.php?action=boardPrincipal" style='color:#fff;'>administration</a> <?php } ?>
<h5>© 2018 SERRI-STEPHAN.COM</h5>
<?php if (!$_SESSION) { ?><a class="rgpd" href="index.php?action=rgpd">Mentions Légales</a> <?php } ?> 
</footer>
 
</body>

    
</html>
 