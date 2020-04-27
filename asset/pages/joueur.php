<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="../CSS/style.css" rel="stylesheet">
        <title>Mini Projet</title>
    </head>
    <body >
        <?php is_connect ();?>
        <div class="joueur-container">
            <div class="joueur-container-header">
                <p class="joueur-container-header-title">BIENVENUE SUR LA PLATEFORME DE JEU DE QUIZZ<br>JOUEZ ET TESTEZ VOTRE NIVEAU DE CULTURE GENERAL</p>
                <div class="joueur-container-menu-profil">                
                    <img src="asset/JSON/<?php echo $_SESSION['user']['image']; ?>" class="profil-image2" />
                    <p class="prenom-profil2"><?php echo $_SESSION['user']['prenom'];?><?php echo ' '; ?><?php echo $_SESSION['user']['nom'];?></p>
                </div> 
                <div class="joueur-container-header-deconnexion"><a href="index.php?statut=logout">Deconnexion</a></div>   
            </div>
            <div class="joueur-body">
                <div class="joueur-body-question">
                    <div class="joueur-body-question-entete">
                    
                    </div>
                </div>
                <div class="joueur-body-score">
                    <p>bonjour</p>
                </div>
            </div>  
        </div>
        
    </body>
