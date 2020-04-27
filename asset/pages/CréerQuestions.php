<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="../CSS/style.css" rel="stylesheet">
        <title>Mini Projet</title>
    </head>
    <body>
    <div class="creer-question">
            <div class="creer-question-title">PARAMETRER VOS QUESTIONS</div>
            <div class="creer-question-box">
                <form method="post" action="" id="form-question">
                    <label for = "question">Questions</label>
                    <input type="text" name="question" class="input3"><br><br>
                    <label for = "nbrpoints">Nbre de points</label>
                    <select class="input4" name="nbrpoints">
                        <option value="1">1</option>
                        <option value="2" >2</option>
                        <option value="3" >3</option>
                        <option value="4" >4</option>
                        <option value="5" >5</option>
                    </select><br><br>
                    <label for = "nbrpoints">Type de reponse</label>
                    <select class="input4" name="typereponse">
                        <option value="">Donner le type de reponse</option>
                        <option value="2" >2</option>
                        <option value="3" >3</option>
                        <option value="4" >4</option>
                        <option value="5" >5</option>
                    </select><br><br>
                </form>
            </div>
        </div>
    </body>
</html>
