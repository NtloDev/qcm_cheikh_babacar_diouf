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
                <input type="number" name="nbrequestion">
                <input type="submit" name="ok" value="ok"> </div>
                <?php 
            if (isset($_POST['ok']))
            {
                echo '<br>';
                for ($i=1 ;$i<=$_POST['nbrequestion'] ; $i++)
                {
                    $tab[]= $i;
                    
                }
                ?>
                <div class="questions" ><?php
                foreach($tab as $ligne)
                {
                    echo $ligne;
                    echo'<br>';?>
                <?php
                }?>
                </div><?php
            }
            ?>
            <br><br><br><br> 
            
            <button class="suivant" >Suivant</button>
            
            </form>
        </div>
    </body>
</html>