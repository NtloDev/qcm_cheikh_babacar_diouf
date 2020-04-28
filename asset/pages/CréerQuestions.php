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
                    <label for = "question" class="titres-input">Questions</label>
                    <input type="text" name="question" class="input3"><br><br>
                    <label for = "nbrpoints" class="titres-input">Nbre de points</label>
                    <input type="number" name="nbrpoints" class="input4"><br><br>
                    <label for = "typereponse" class="titres-input">Type de reponse</label>
                    <select class="input5" name="typereponse" id="select" >
                        <option value="">Donner le type de reponse</option>
                        <option value="choixmultiple" >Choix multiple</option>
                        <option value="unseulchoix" >Un seul choix</option>
                        <option value="texte" >Texte</option>
                    </select><button type="button" id="ajout-reponse" name="button" onclick="AddInput()"></button>
                    
                
                <button type="submit" name="enregistrer" class="enregistrer-question">Enregistrer</button>
                </form>
            </div>
        </div>
        <?php 
            if (isset($_POST['enregistrer'])){
                $question = $_POST['question'];
            $nbrpoints = $_POST['nbrpoints'];
            $reponse1 = $_POST['reponsetexte'];

                $tab =
                [
                    'question' => [],
                    'nbrpoints' => [],
                    'reponse1' => [],
                    'reponse2' =>[],
                    'reponse3'=>[],
                ];

                // ensuite on affecte les donnes du formulaire sur le table tab
                $tab['question'] = $question;
                $tab['nbrpoints']= $nbrpoints;
                $tab['reponse1'] = $reponse1;

                $save = file_get_contents("asset/JSON/question.json");
                $save= json_decode($save,true);
                $save[]=$tab;
                $save = json_encode($save);
                file_put_contents('asset/JSON/question.json',$save);
            }
        ?>
        <script>
            function AddInput(){
             const   texte = document.getElementById("select").options[document.getElementById('select').selectedIndex].text;
                if (texte == "Texte")
                {                
                var divInputs = document.getElementById('form-question');
                var newInput = document.createElement('div');
                newInput.innerHTML =` <label for = "reponsetexte" class="titres-input2">Reponse </label><input type="text" name="reponsetexte" class="input5-1"><a href='' class="link-form"><img src="asset/IMG/Images/Icônes/ic-supprimer.png" class="supp2" /></a> ` ;
                    divInputs.appendChild(newInput);       
                } 
                else if (texte == "Choix multiple")
                {                
                var divInputs = document.getElementById('form-question');
                var newInput = document.createElement('div');
                newInput.innerHTML =` <label for = "reponsetexte" class="titres-input2">Reponse </label>
                    <input type="text" name="reponsetexte" class="input5-1">
                    <input type = "checkbox" name="choix" value="choix1"  class ="input6">
                    <a href='' class="link-form"><img src="asset/IMG/Images/Icônes/ic-supprimer.png" class="supp" /></a> ` ;
                    divInputs.appendChild(newInput);       
                } 
                else if (texte == "Un seul choix")
                {                
                var divInputs = document.getElementById('form-question');
                var newInput = document.createElement('div');
                newInput.innerHTML =` <label for = "reponsetexte" class="titres-input2">Reponse </label>
                    <input type="text" name="reponsetexte" class="input5-1">
                    <input type = "radio" name="choix2" value="Oui" class ="input7">
                    <a href='' class="link-form"><img src="asset/IMG/Images/Icônes/ic-supprimer.png" class="supp" /></a> ` ;
                    divInputs.appendChild(newInput);       
                } 

                
            }
        </script>
        
    </body>
</html>
