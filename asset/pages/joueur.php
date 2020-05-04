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
                <?php 
                    $qes = file_get_contents('asset/JSON/question.json');
                    // on decode le fichier et le transformer sous forme de table c'estquoi j'ai mis true
                    $qes = json_decode($qes,true);
                    shuffle($qes);
                    $nbrquestion = 1;
                    $_SESSION['nbrquestion'] = 1;
                    $nbrelmnt=count($qes);
                    $nbrparpage= 1;
                    $_SESSION['nbrparpage']=1;

                    if (($_SESSION['jouer']==1))
                    {?>
                        <a class="jouer" href="index.php?lien=jeux&numPage=<?php echo 1 ; ?>" >Jouer</a><?php
                    }
                    for ($i=1 ; $i<=5 ; $i++)
                    {    
                        if (isset($_GET['numPage']))
                        {
                            if ($_GET['numPage']==$i)
                            {?>
                                <div class="joueur-body-question-entete">
                                    <p class="joueur-question-num"><?php 
                                        echo "Question $i/5 :";?>
                                    </p>
                                    <p class="joueur-question-choix">
                                        <?php echo $qes[$i-1]['question'].'<br>'; ?>
                                    </p>
                                </div>
                                <div class ="joueur-question-points">
                                    <?php echo $qes[$i-1]['nbrpoints']; echo "pts";?>
                                </div> 
                                <div class="joueur-body-question-rep">
                                    <?php
                                        for ($j=1 ; $j<=5 ; $j++)
                                        {
                                            if ($qes[$i-1]['typereponse']== 'choixmultiple')
                                            {?>
                                                <form method="post" action="index.php?lien=jeux&numPage=<?php echo $i+1 ; ?>"><?php
                                                if (isset($qes[$i-1]['rep'.$j]))
                                                {?>
                                                    <input type = "checkbox" name="<?php echo $qes[$i-1]['rep'.$j] ?>" class="joueur-body-question-input" />
                                                    <?php echo $qes[$i-1]['rep'.$j].'<br>';
                                                }
                                            }
                                            if ($qes[$i-1]['typereponse']== 'unseulchoix')
                                            {?>
                                                <form method="post" action="index.php?lien=jeux&numPage=<?php echo $i+1 ; ?>"><?php
                                                if (isset($qes[$i-1]['rep'.$j]))
                                                {?>
                                                    <input type = "radio" name="choix<?php echo $i-1 ; ?> " class="joueur-body-question-input" />
                                                    <label for="choix<?php echo $i-1 ; ?> "><?php
                                                    echo $qes[$i-1]['rep'.$j] ;?></label> <?php
                                                }
                                            }
                                            if ($qes[$i-1]['typereponse']== 'texte')
                                            {?>
                                                <form method="post" action="index.php?lien=jeux&numPage=<?php echo $i+1 ; ?>"><?php
                                                if (isset($qes[$i-1]['rep'.$j]))
                                                {
                                                    echo '<input type = "texte" name="choix" class="joueur-body-question-input" />  ';
                                                }
                                            }                               
                                        }
                                        ?><button type="submit" name="terminer"  value="suivant">suivant</button> 
                                    </form><?php
                                var_dump($_POST);?>
                            </p>
                        </div>   
                        <a class="precedent" href="index.php?lien=accueil&link=1&numPage=">Precedent</a><?php
                        if ($_GET['numPage']==5)
                        {?>
                            <input type="submit" name="terminer" value="terminer" ><?php
                        }
                        break;
                    }           
                }
            }
            if (isset($_POST['terminer']))
            {
                $_SESSION[$i]=$_POST;
                if ($qes[$i]['rep'.$j]=="choix.'$i'")
                {
                    echo "cool";
                }
            }
            if (isset($_POST['termine']))
            {
                var_dump($_POST);
                if (!empty($_POST))
                {
                    $tab = [];                   
                    $tab=$_POST;
                    $save = file_get_contents("asset/JSON/reponse.json");
                    $save= json_decode($save,true);
                    $save[]=$tab;
                    $save = json_encode($save);
                    file_put_contents('asset/JSON/reponse.json',$save);
                }
            }
            ?>
        </form>     
    </div>
    <div class="joueur-body-score">              
    </div>
    </div>  
</div>
</body>
