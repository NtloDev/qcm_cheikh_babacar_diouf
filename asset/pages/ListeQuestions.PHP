<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <title>Mini Projet</title>
    </head>
    <body >
        <div class="nbre-question">
            <form method="post" action="" class="nbre-question-form">
                <div class="nbre-question-title">Nbre de question/Jeu
                <input type="number" name="nbrquestion" class="nbrequestion" id="nbrquestion">
                <button type="submit" name="ok" class="nbrequestionOK" >OK</button>
                
                </div>
                
                <br><br><br><br> 
                <div id ="liste-question-box">
                <?php 

                 
            
                $qes = file_get_contents('asset/JSON/question.json');

                // on decode le fichier et le transformer sous forme de table c'estquoi j'ai mis true
                $qes = json_decode($qes,true);
                
            
                // on affecte le tableau tab dans le fichier json
                if (isset($_POST['ok']))
                {
                    $nbrquestion = $_POST['nbrquestion'];
                    $uss=jsondata();
                    $uss[0]['nbrquestions']=$nbrquestion;
                                            $uss = json_encode($uss); 
                                            // on sauvegarde le fichier
                                            file_put_contents('asset/JSON/save.json',$uss);
                    $_SESSION['nbrquestion'] = $nbrquestion;
                    $nbrelmnt=count($qes);
                    $nbrparpage= 0 ;
                    $_SESSION['exe'] =1;
                   
                }   
                    if(isset($_SESSION['exe']))
                    { 
                    $k=$_GET['numPage'];
                    $_SESSION['nbrparpage']=$k+$_SESSION['nbrquestion'];
                    for ($i=$k ; $i< $_SESSION['nbrparpage'] ; $i++)
                    {?> <div class="questionaffiche">
                           <?php echo $i.'. ' ;
                            echo $qes[$i-1]['question'].'<br>'; ?>
                        </div>
                        <?php
                        for ($j=1 ; $j<=5 ; $j++)
                        {
                            if ($qes[$i-1]['typereponse']== 'choixmultiple')
                            {
                                if (isset($qes[$i-1]['rep'.$j]))
                                {
                                    echo '<input type = "checkbox" name="choix" class="questionafficheinput" />  ';
                                    echo $qes[$i-1]['rep'.$j].'<br>';
                                }
                            }
                            if ($qes[$i-1]['typereponse']== 'unseulchoix')
                            {
                                if (isset($qes[$i-1]['rep'.$j]))
                                {
                                    echo ' <input type = "radio" name="choix" class="questionafficheinput" />  ';
                                    echo $qes[$i-1]['rep'.$j].'<br>';
                                }
                            }
                            if ($qes[$i-1]['typereponse']== 'texte')
                            {
                                if (isset($qes[$i-1]['rep'.$j]))
                                {
                                    echo '<input type = "texte" name="choix" class="questionafficheinput" />  ';
                                }
                            }
                        }
                    }
                    ?> <a class="suivant" href="index.php?lien=accueil&link=1&numPage=<?php echo $_SESSION['nbrparpage'] ?>">suivant</a>
                    <a class="precedent" href="index.php?lien=accueil&link=1&numPage=<?php echo $k-$_SESSION['nbrquestion'] ?>">precedent</a><?php 
                     }
                ?>
                </div>
            </form>
        </div>
    </body>
</html>