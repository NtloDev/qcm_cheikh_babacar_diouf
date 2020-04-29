<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="../CSS/style.css" rel="stylesheet">
        <title>Mini Projet</title>
    </head>
    <body >
        <div class="liste-joueur">
            <div class="liste-joueur-title">LISTE DES JOUEURS PAR SCORE</div>
            <div class="liste-joueur-box">
            <div class="liste-joueur-box-nom">
                <h2>Nom</h2>
            <?php 
            $users=jsondata();
            foreach($users as $key => $user){
                if (isset($user["nom"])){
            ?><p> <?php
                echo $user["nom"];
                
                ?> </p> <?php
                }
                } ?>
            </div>
            <div class="liste-joueur-box-prenom">
            <h2>Prénom</h2>
            <?php 
            $users=jsondata();
            foreach($users as $key => $user){ 
                if (isset($user["prenom"])){  ?>
                <p> <?php
                echo $user["prenom"];
                
                ?> </p> <?php
                }
                } ?>
            </div>
            <div class="liste-joueur-box-score">
            <h2>Score</h2>
            <?php 
            $users=jsondata();
            foreach($users as $key => $user){ ?>
            <p> <?php
               // echo $user["nom"];
                
                ?> </p> <?php
            
               
                
               
                } ?>
            </div>
            </div>
            <button class="suivant-joueur" >Suivant</button>
            
        </div>
    </body>
</html>