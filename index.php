<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="asset/CSS/style.css" rel="stylesheet">
        <title>Mini Projet</title>
    </head>
    <body>
        <script type="text/javascript" src="js/jquery.mon.js"></script>
        <div class="header">
            <div class="logo"></div>
            <div class="header-title">Le plaisir de jouer</div>
        </div>
        <div class="conteneur">
        <?php 
        session_start();
        require_once("src/fonctions.php")  ;
              if (isset($_GET['lien'])){
                  switch($_GET['lien'])
                  {
                      case "accueil":
                        require_once("asset/pages/admin.php");
                      break;
                      case "jeux":
                        require_once("asset/pages/joueur.php");
                      break;
                  }
              }
              else{
                  if (isset($_GET['statut']) && $_GET['statut']==="logout")
                  {
                      deconnexion();
                      require_once("asset/pages/connect.php")  ;
                  }
                  else
                  {
                    if (isset($_GET['inscription']))
                    {
                        require_once("asset/pages/connexion.php")  ;
                    }
                    else{
                        require_once("asset/pages/connect.php")  ;
                    }
                  
                  }
                
              }
             
        ?> 
         
        </div>     
    </body>
</html>