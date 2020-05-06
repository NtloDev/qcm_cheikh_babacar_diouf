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
            <?php 
                
             if (isset($_GET['numPage']))
            {
                $j=$_GET['numPage'];?>
                <div class="liste-joueur-box-nom">
                    <h2>Nom</h2>
                    <?php  
                        $users=jsondata();
                        for ($i=$j ; $i<=$j+10 ; $i++)
                        {  
                            if (isset($users[$i]['nom']))
                            {?>
                                <p>
                                    <?php echo $users[$i]['nom'];?> 
                                </p><?php
                            }
                        }
                     ?>
                </div>
                <div class="liste-joueur-box-prenom">
                    <h2>Prénom</h2><?php 
                    $users=jsondata();
                    for ($i=$j ; $i<=$j+10 ; $i++)
                        {  
                        if (isset($users[$i]['prenom']))
                        {?>
                            <p> 
                                <?php echo $users[$i]['prenom'];?>
                            </p><?php
                        }
                    }?>
                </div>
                <div class="liste-joueur-box-score">
                    <h2>Score</h2><?php 
                    $users=jsondata();
                    for ($i=$j ; $i<=$j+10 ; $i++)
                        {  
                        if (isset($users[$i]["score"]))
                        {?>
                        <p> 
                            <?php  echo $users[$i]["score"];?>
                        </p><?php
                     }
                      
                    }?>
                </div>
                <?php } ?>
            </div> 
            <a class="suivant" href="index.php?lien=accueil&link=3&numPage=<?php echo $j+10 ?>">suivant</a>
            </form>   
        </div><?php
        if ($_GET['numPage']==$j+10)
                {
                    $j=$j+10;
                    {  ?>
                        <div class="liste-joueur-box-nom">
                            <h2>Nom</h2>
                            <?php  
                                $users=jsondata();
                                for ($i=$j ; $i<=$j+10 ; $i++)
                                {  
                                    if (isset($users[$i]['nom']))
                                    {?>
                                        <p>
                                            <?php echo $users[$i]['nom'];?> 
                                        </p><?php
                                    }
                                }
                             
                            ?>
                        </div>
                        <div class="liste-joueur-box-prenom">
                            <h2>Prénom</h2><?php 
                            $users=jsondata();
                            for ($i=$j ; $i<=$j+10 ; $i++)
                                {  
                                if (isset($users[$i]['prenom']))
                                {?>
                                    <p> 
                                        <?php echo $users[$i]['prenom'];?>
                                    </p><?php
                                }
                            }?>
                        </div>
                        <div class="liste-joueur-box-score">
                            <h2>Score</h2><?php 
                            $users=jsondata();
                            for ($i=$j ; $i<=$j+10 ; $i++)
                                {  
                                if (isset($users[$i]["score"]))
                                {?>
                                <p> 
                                    <?php  echo $users[$i]["score"];?>
                                </p><?php
                             }
                              
                            }?>
                        </div>
                        <?php } ?>
                    </div> 
                    <a class="suivant3" href="index.php?lien=accueil&link=3&numPage=<?php echo $j+10 ?>">suivant</a>
                    </form>   
                </div><?php
                }
                ?>
    </body>
</html>