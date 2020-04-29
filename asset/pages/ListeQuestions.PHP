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
                <input type="number" name="nbrquestion" class="nbrequestion">
                <input type="submit" name="ok" value="ok" class="nbrequestionOK"> </div>
                <button class="suivant" >Suivant</button>
            <br><br><br><br> 
            <div class="liste-question-box">
            <?php 
            
            $qes = file_get_contents('asset/JSON/question.json');

            // on decode le fichier et le transformer sous forme de table c'estquoi j'ai mis true
            $qes = json_decode($qes,true);

            // on affecte le tableau tab dans le fichier json
        
            if (isset($_POST['ok']))
            {
               $nbrquestion = $_POST['nbrquestion'];
               var_dump($nbrquestion);
               for ($i=1 ; $i<= $nbrquestion ; $i++)
               {

                   echo $i;
                   echo '<br';
               }
            }
            ?>
            </div>
            
            
            </form>
        </div>
    </body>
</html>