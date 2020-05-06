<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="../CSS/style.css" rel="stylesheet">
        <title>Mini Projet</title>
    </head>
    <body >
    <div class="admin-container">
        <div class="admin-container-header">
            <p class="admin-container-header-title">CREEZ ET PARAMETREZ VOS QUIZ </p>
            <p class="admin-container-header-deconnexion"><a href="index.php?statut=logout">Deconnexion</a></p>
        </div>
        <div class="admin-container-menu">
            <div class="admin-container-menu-profil">
                <?php is_connect ();?>
                <img src="asset/JSON/<?php echo $_SESSION['user']['image']; ?>" class="profil-image" />
                <p class="prenom-profil"><?php echo $_SESSION['user']['prenomad'];?></p>
                <p class="nom-profil"><?php echo $_SESSION['user']['nomad'];?></p>
            </div>
            <div class="admin-container-menu-profil-links">
                <p ><a style="text-decoration:none" href="index.php?lien=accueil&link=1&numPage=1">Liste Questions  <img  src="asset/IMG/Images/Icônes/ic-liste.png" class="admin-container-menu-profil-links-icones" /></a></p><br>
                <p ><a style="text-decoration:none" href="index.php?lien=accueil&link=2">Creer Admin &nbsp; &nbsp; <img  src="asset/IMG/Images/Icônes/ic-ajout.png" class="admin-container-menu-profil-links-icones"/></a></p><br>
                <p ><a style="text-decoration:none" href="index.php?lien=accueil&link=3&numPage=1">Liste Joueurs &nbsp; &nbsp;<img  src="asset/IMG/Images/Icônes/ic-liste.png" class="admin-container-menu-profil-links-icones"/></a></p><br>
                <p ><a style="text-decoration:none" href="index.php?lien=accueil&link=4">Creer Questions <img  src="asset/IMG/Images/Icônes/ic-ajout.png" class="admin-container-menu-profil-links-icones"/></a></p><br>
            </div>
            <div>
                <div class="admin-container-links">
                    <?php 
                    if (isset($_GET['link']))
                    {
                        $link=$_GET['link'];
                        switch($link)
                        {
                            case 1:
                                require_once("asset/pages/ListeQuestions.php");
                                break;
                            case 2:
                                require_once("asset/pages/CreationCompteAdmin.php");
                                break;
                            case 3:
                                require_once("asset/pages/ListeJoueur.php");
                                break;
                            case 4:
                                require_once("asset/pages/CréerQuestions.php");
                                break;
                        }
                    }?>
                </div>
            </div>
        </body>
