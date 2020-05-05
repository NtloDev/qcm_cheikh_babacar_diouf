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
                <input type="text" name="question" class="input3" error ="error-3"><br><br>
                <div class="error-form" id="error-3"></div>
                <label for = "nbrpoints" class="titres-input">Nbre de points</label>
                <input type="number" name="nbrpoints" class="input4" error ="error-4"><br><br>
                <div class="error-form" id="error-4"></div>
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
    if (!empty($_POST))
    {
        $tab = [];
        unset($_POST['enregister']);
        $tab=$_POST;
        $save = file_get_contents("asset/JSON/question.json");
        $save= json_decode($save,true);
        $save[]=$tab;
        $save = json_encode($save);
        file_put_contents('asset/JSON/question.json',$save);
    }
?>
<script>
    const inputs =  document.getElementsByTagName("input");
    for(input of inputs)
    {
        input.addEventListener("keyup",function(e)
        {
            if(e.target.hasAttribute("error")) 
            {
                var idDivError=e.target.getAttribute("error");
                document.getElementById(idDivError).innerText=""
            }
        })
    } 
    document.getElementById("form-question").addEventListener("submit",function(e)
    {
        const inputs =  document.getElementsByTagName("input");
        var error = false;
        for(input of inputs)
        {
            if(input.hasAttribute("error"))
            {
               var idDivError=input.getAttribute("error")
                if(!input.value)
                {    
                    document.getElementById(idDivError).innerText="Ce champs est obligatoire"
                    error = true
                }
            }
        }
        if(error)
        {
            e.preventDefault();
        }
        return false
    })
</script>
<script>
    var nbrinput= 0;
    <?php $nbrinput=0; ?>
    
    function AddInput()
    {
        var b = document.querySelector("select"); 
        b.setAttribute("disabled", "");
        nbrinput++;
        <?php $nbrinput++; ?>        
        const   texte = document.getElementById("select").options[document.getElementById('select').selectedIndex].text;
        if (texte == "Texte")
        {         
            
            var divInputs = document.getElementById('form-question');
            var newInput = document.createElement('div');
            newInput.innerHTML = '<label for = \"reponsetexte\" class=\"titres-input2\">Reponse' + nbrinput + ' </label>' +
                                 '<input type=\"text\" name=\"rep'+nbrinput+'\" error =\"error-6\" class=\"input5-1\">' + '<a href=\"\" class=\"link-form\"><img src=\"asset/IMG/Images/Icônes/ic-supprimer.png\" class=\"supp2\" /></a>' +                   
                                 '<div class=\"error-form\" id=\"error-6\"></div>';
            divInputs.appendChild(newInput);  
            
        } 
        else if (texte == "Choix multiple")
        {                
            var divInputs = document.getElementById('form-question');
            var newInput = document.createElement('div');
            newInput.innerHTML = 
                    '<label for = \"reponsetexte\" class=\"titres-input2\">Reponse' +nbrinput+ '  </label>' +
                    '<input type=\"text\" name=\"rep'+nbrinput+'\" class=\"input5-1\" error =\"error-6\">' +                
                    '<input type = \"checkbox\" name=\"choix' +nbrinput+ '\" value=\"choix' +nbrinput+ '\"  class =\"input6\">' +
                    '\<a href=\'\' class=\"link-form\"><img src=\"asset/IMG/Images/Icônes/ic-supprimer.png\" class=\"supp\" /></a>' +
                    '<div class=\"error-form\" id=\"error-6\"></div>'  ;
            divInputs.appendChild(newInput);       
        } 
        else if (texte == "Un seul choix")
        {                
            var divInputs = document.getElementById('form-question');
            var newInput = document.createElement('div');
            newInput.innerHTML = 
                    '<label for = \"reponsetexte\" class=\"titres-input2\">Reponse' +nbrinput+ ' </label>' +
                    '<input type=\"text\" name=\"rep'+nbrinput+'\" error ="\error-6\" class=\"input5-1\">' +
                    '<input type = \"radio\" name=\"val' +nbrinput+ '\" class =\"input7\">' +    
                    '<a href=\'\' class=\"link-form\"><img src=\"asset/IMG/Images/Icônes/ic-supprimer.png\" class=\"supp\" /></a>' +
                    '<div class=\"error-form\" id=\"error-6\"></div>'  ;
            divInputs.appendChild(newInput);       
        }             
    }
</script>
    </body>
</html>
