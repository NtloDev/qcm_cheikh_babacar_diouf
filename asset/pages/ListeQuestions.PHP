<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="../CSS/style.css" rel="stylesheet">
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
                    $_SESSION['nbrquestion'] = 5;
                    $nbrelmnt=count($qes);
                    $nbrparpage= 5;
                    $_SESSION['nbrparpage']=5;
                    $nbrdepage=ceil($nbrelmnt/$nbrparpage);
                    
                    
                    for ($i=1 ; $i<= $_SESSION['nbrquestion'] ; $i++)
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
                    
                }
                $i=1;
                ?> <a class="suivant" href="index.php?lien=accueil&link=1&numPage=<?php echo $i ?>">suivant</a><?php 
                if (isset($_GET['numPage']))
                    {

                        for ($i=$_SESSION['nbrquestion']+1 ; $i<=$_SESSION['nbrparpage']+5 ; $i++)
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
                      
                    }
                ?>
                </div>
            </form>
        </div>
    </body>
</html>