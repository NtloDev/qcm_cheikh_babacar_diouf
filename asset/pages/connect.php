<div class="container">
    <div class="header-container">
        <div class="title">Login Form</div>
    </div>
    <div class="body-container">
        <form method="post" action ="" id="form-connexion">
            <div class="input-form">
                <div class="icon-form icon-form-login"></div>
                <input type="texte" name="id" error ="error-1" placeholder="Login" class="form-controle">
                <div class="error-form" id="error-1"></div>
            </div>
            <div class="input-form">
                <div class="icon-form icon-form-pwd"></div>
                <input type="password" name="mdp" error ="error-2" placeholder="Password" class="form-controle">
                <div class="error-form" id="error-2"></div>
            </div>
            <div class="input-form">
                <button type="submit"  name="connexion" class="btn-form">Connexion</button>
                <a href='index.php?inscription' class="link-form">S'inscrire pour jouer</a>
            </div>
        </form>                  
    </div>
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
    document.getElementById("form-connexion").addEventListener("submit",function(e)
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
<?php
    if (isset($_POST['connexion'])) 
    {
        // affectation des variables
        $login = $_POST['id'];
        $mdp = $_POST['mdp'];
        $result = connexion($login,$mdp);
        if ($result=="error")
        {
            echo "Donnees incorrectes";
        }
        else
        {
            header("location:index.php?lien=".$result);
        }
     }        
?>