<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="../CSS/style.css" rel="stylesheet">
        <title>Mini Projet</title>
    </head>
    <body >
        <?php is_connect (); ?>
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
                        $log=$_SESSION['user']['login'];
                        $uss=jsondata();
                        $nbrquestion=$uss[0]['nbrquestions'];
                        if (($_SESSION['jouer']==1))
                        {?>
                            <form method="post" action="index.php?lien=jeux&numPage=<?php echo 1 ; ?>">
                                <input id="jouer" type="submit" class= "jouer" name="termine" onclick="masquer_div2('jouer');" value="jouer"/>
                            </form>
                        <?php
                        } 
                        for ($i=1 ; $i<=$nbrquestion ; $i++)
                        {    
                            if (isset($_GET['numPage']))
                            {?>
                                <script>
                                    document.getElementById('jouer').style.display = 'none';
                                </script>
                            <?php
                            if ($_GET['numPage']==$i)
                            {?>
                                <div class="joueur-body-question-entete">
                                    <p class="joueur-question-num"><?php 
                                        echo "Question $i/$nbrquestion :";?>
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
                                            { $_SESSION['type']=1;?>
                                                <form method="post" action="index.php?lien=jeux&numPage=<?php echo $i+1 ; ?>"><?php
                                                if (isset($qes[$i-1]['rep'.$j]))
                                                {?>
                                                    <input type = "checkbox" value="<?php echo 'rep'.$j ?>" name="<?php echo $qes[$i-1]['rep'.$j] ?>" class="joueur-body-question-input" />
                                                    <?php echo $qes[$i-1]['rep'.$j].'<br>';
                                                }
                                            }
                                            if ($qes[$i-1]['typereponse']== 'unseulchoix')
                                            {$_SESSION['type']=2?>
                                                <form method="post" action="index.php?lien=jeux&numPage=<?php echo $i+1 ; ?>"><?php
                                                if (isset($qes[$i-1]['rep'.$j]))
                                                {?>
                                                    <input type = "radio" name="<?php echo $qes[$i-1]['rep'.$j] ; ?>" value="<?php echo 'rep'.$j ?>" class="joueur-body-question-input" />
                                                    <label for="choix<?php echo $i-1 ; ?> "><?php
                                                    echo $qes[$i-1]['rep'.$j] ;?></label> <?php
                                                    $_SESSION['tabun']=$qes[$i-1];
                                                }
                                            }
                                            if ($qes[$i-1]['typereponse']== 'texte')
                                            {$_SESSION['type']=3?>
                                                <form method="post" action="index.php?lien=jeux&numPage=<?php echo $i+1 ; ?>"><?php
                                                if (isset($qes[$i-1]['rep'.$j]))
                                                {?>
                                                    <input type = "texte" name="choix" class="joueur-body-question-input" style="width:30%; height:30px; border: 1px solid rgb(41, 200, 221);position:relative; left:10%"/><?php
                                                }
                                                $_SESSION['textes']=$qes[$i-1];
                                            }                               
                                        }
                                    ?>        
                                </div>   
                                <button type="submit" id ="suivant" class= "suivant4" name="terminer"  value="suivant">suivant</button> 
                            </form>
                            <?php 
                            if ($_GET['numPage']>=2)
                            {
                               
                                ?>
                                    <a class="precedent" href="index.php?lien=jeux&numPage=<?php echo $i-1 ; ?>">Precedent</a><?php
                            }
                            
                            if ($_GET['numPage']==$nbrquestion)
                            {?>
                                <script>
                                    document.getElementById('suivant').style.display = 'none';
                                </script>
                            <form method="post" action="index.php?lien=jeux&numPage=<?php echo $nbrquestion+1 ; ?>">
                                <input class= "suivant4" type="submit" name="soumettre" value="terminer" >
                            </form><?php
                        }                        
                    }           
                }
                if (isset($_POST['terminer']))
                {
                    if (!empty($_POST))
                    {
                        if ($_SESSION['type']==1)
                        {
                            unset($_POST['terminer']);
                            $tab=$_POST;
                           
                            $c=count($tab);
                            $o=0;
                            $n=0; 
                            foreach($qes[$i-1] as $choix)
                            {
                                if(preg_match("#rep#",$choix))
                                {
                                    $o++;
                                }
                                foreach($tab as $t)
                                {
                                    if($t==$choix)
                                    {
                                        $n++;
                                    }
                                }
                            }
                            if($n==$o)
                            {
                                $_SESSION['score']=$_SESSION['score']+$qes[$i-1]['nbrpoints'];
                                
                            }
                        }
                    }
                    if ($_SESSION['type']==2)
                    {
                        unset($_POST['terminer']);
                        $tab=$_POST;
                        $c=count($tab);
                        $oo=0;
                        foreach($_SESSION['tabun'] as $choix)
                        {
                            for($i=1;$i<=2;$i++)
                            {
                                if(preg_match("#rep$i#",$choix))
                                {
                                    $oo=$choix;
                                }
                                break;
                            }
                        }
                        if(!empty($tab))
                        { 
                            foreach($tab as $ll)
                            {
                                $lll=$ll;
                            }                                        
                            if($lll==$oo)
                            {
                                $_SESSION['score']=$_SESSION['score']+$_SESSION['tabun']['nbrpoints'];            
                            } 
                        }
                    }
                    if($_SESSION['type']=3)
                    {
                        unset($_POST['terminer']);
                        $tab=$_POST;    
                        $c=count($tab);
                        $o=0;
                        $n=0; 
                        if (isset($_POST['choix']))
                        { 
                            if ($_POST['choix']==$_SESSION['textes']['rep1'])
                            {        
                                $_SESSION['score']=$_SESSION['score']+$qes[$i-1]['nbrpoints'];   
                            }
                        }
                    }
                }
            }
            if (isset($_POST['soumettre']))
            {            
                $users=jsondata();
                $p=count($users);
                for ($i=0 ;$i<=$p ;$i++)
                {
                    if (isset ($users[$i]['prenom']))
                    { 
                        if ($users[$i]['prenom']===$_SESSION['user']['prenom'] && $users[$i]['nom']===$_SESSION['user']['nom'] && $users[$i]['mdp']===$_SESSION['user']['mdp'])
                        {?><p style="position:relative; font-size:40px ; left:20%; margin-top:140px;"><?php
                            echo "votre score est de ".' ';
                            echo  $_SESSION['score'].' ';
                            echo "points!"; ?></p><?php
                            if ($_SESSION['score']>=$users[$i]['score'])
                            { 
                                $users[$i]['score']=$_SESSION['score'];
                                $_SESSION['user']['score']=$users[$i]['score'];
                                $users = json_encode($users); 
                                // on sauvegarde le fichier
                                file_put_contents('asset/JSON/save.json',$users);                        
                            }
                            $_SESSION['score']=0;
                            break;
                        }
                    }    
                }
            }             
            ?>
        </form>   
    <script>
        <?php   
        if(isset($_GET['numPage']))
        {?>
            var b = document.getElementByClassName("jouer"); 
            var_dump(b);
        <?php
        }?>
    </script>
</div>
    <script>
    function masquer_div1(id)
    {
        if (document.getElementById(id).style.display == 'none') 
        {
            document.getElementById(id).style.display = 'block';
            document.getElementById('joueur-body-score-meilleur').style.display = 'none';
        }
        else 
        {
            document.getElementById(id).style.display = 'none';
        }
    }
    function masquer_div2(id)
    {
        if (document.getElementById(id).style.display == 'none')    
        {
            document.getElementById(id).style.display = 'block';
            document.getElementById('joueur-body-score-top').style.display = 'none';
        }
        else 
        {
            document.getElementById(id).style.display = 'none';
        }
    }
    function masquer_div3(id)
    {
        document.getElementById(id).style.display == 'none'       
    }
    </script>
    <div class="joueur-body-score">  
        <div class="joueur-body-score-top-title">
            <input type="button" class="topscore" value="Top scores" onclick="masquer_div1('joueur-body-score-top');" />
        </div>
    <div class="joueur-body-score-meilleur-title">
        <input type="button" class="meilleur-score" value="Mon meilleur Score" onclick="masquer_div2('joueur-body-score-meilleur');" />
    </div>
    <div id="joueur-body-score-top">       
        <?php $tri = file_get_contents('asset/JSON/save.json');
            // on decode le fichier et le transformer sous forme de table c'estquoi j'ai mis true
            $tri = json_decode($tri,true); 
            $counttri=count($tri);                
            $tab=array();
            for($i=0; $i<=$counttri ; $i++)
            {                
                if(isset($tri[$i]['score']) && isset($tri[$i]['nom'])&& isset($tri[$i]['prenom']))
                {
                    $tab[$i]=[$tri[$i]['prenom'],$tri[$i]['nom'], $tri[$i]['score'],];          
                }        
            }        
            $tab = array_values($tab);            
            $taille=count($tab) ;
            for ($i=0;$i<=count($tab) ; $i++)
            {
                $bon=0;
                if(isset($tab[$i][2]))
                {
                    for($j=0 ; $j<=count($tab)-1 ;$j++)
                    {
                        if($tab[$i][2]>$tab[$j][2])
                        {
                            $bon++;                           
                        }            
                    }                    
                    if($bon==$taille-1)
                    {                    
                        $scorenumero1=$tab[$i];?>
                        <p style="font-weight:bold; position:absolute ; left:5%; top:20px;"><?php echo $scorenumero1[0].' '; echo $scorenumero1[1]; ?></p>
                        <p style="font-weight:bold; position:absolute ; left:70%; top:20px;"><?php echo $scorenumero1[2].' '; echo "pts"; ?></p>                <?php
                    }
                    if($bon==$taille-2)
                    {
                        $scorenumero2=$tab[$i];?>
                        <p style="font-weight:bold; position:absolute ; left:5%; top:60px;"><?php echo $scorenumero2[0].' '; echo $scorenumero2[1]; ?></p>
                        <p style="font-weight:bold; position:absolute ; left:70%; top:60px;"><?php echo $scorenumero2[2].' '; echo "pts"; ?></p><?php
                    }
                    if($bon==$taille-3)
                    {
                        $scorenumero3=$tab[$i];?>
                        <p style="font-weight:bold; position:absolute ; left:5%; top:100px;"><?php echo $scorenumero3[0].' '; echo $scorenumero3[1]; ?></p>
                        <p style="font-weight:bold; position:absolute ; left:70%; top:100px;"><?php echo $scorenumero3[2].' '; echo "pts"; ?></p><?php
                    }
                    if($bon==$taille-4)
                    {
                        $scorenumero4=$tab[$i];?>
                        <p style="font-weight:bold; position:absolute ; left:5%; top:140px;"><?php echo $scorenumero4[0].' '; echo $scorenumero4[1]; ?></p>
                        <p style="font-weight:bold; position:absolute ; left:70%; top:140px;"><?php echo $scorenumero4[2].' '; echo "pts"; ?></p><?php
                    }
                    if($bon==$taille-5)
                    {
                        $scorenumero5=$tab[$i];?>
                        <p style="font-weight:bold; position:absolute ; left:5%; top:180px;"><?php echo $scorenumero5[0].' '; echo $scorenumero5[1]; ?></p>
                        <p style="font-weight:bold; position:absolute ; left:70%; top:180px;"><?php echo $scorenumero5[2].' '; echo "pts"; ?></p><?php
                    }
                }        
           }?>
        </div>  
        <div style="display: none;" id="joueur-body-score-meilleur">
            <p><?php echo $_SESSION['user']['score']; ?> </p>
        </div>          
    </div>
    </div>  
</div>
</body>
