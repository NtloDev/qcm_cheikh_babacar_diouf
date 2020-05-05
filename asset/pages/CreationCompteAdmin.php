<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="../CSS/style.css" rel="stylesheet">
        <title>Mini Projet</title>
    </head>
    <body>
        <div class="inscription-admin">
            <div class="inscription-admin-title1">S'INSCRIRE</div><br>
            <div class="inscription-admin-title2">Pour proposer des quizz</div><br>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
            <form method="post" action="" id="form-connexion">
                <div class="inscription-admin-title-form">Prénom</div><br>
                <input type="text" name="prenom" error ="error-3" class="input">
                <div class="error-form" id="error-3"></div><br><br>
                <div class="inscription-admin-title-form">Nom</div><br>
                <input type="text" name="nom" error ="error-4" class="input">
                <div class="error-form" id="error-4"></div><br><br>
                <div class="inscription-admin-title-form">Login</div><br>
                <input type="text" name="login" error ="error-5" class="input">
                <div class="error-form" id="error-5"></div><br><br>
                <div class="inscription-admin-title-form">Password</div><br>
                <input type="password" name="password" error ="error-6" class="input">
                <div class="error-form" id="error-6"></div><br><br>
                <div class="inscription-admin-title-form">Confirmer Password</div><br>
                <input type="password" name="confirm-password" error ="error-7" class="input" >
                <div class="error-form" id="error-7"></div><br><br>
                <div class="avatar">Avatar <input type="file" name="photo" alt="image profile" accept="image/png, image/jpeg" id="imgInp" class="fileUpload"></div>
                
                <input type="submit" name="creer" value="Creer un compte" class="creer">
            </form>
            <img src="#" id="imgupload" class="profil-image-avatar" />
            <div class="profil-image-avatar-title">Avatar Admin</div>
        </div>
                        <script>
                        function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    
                    reader.onload = function(e) {
                    $('#imgupload').attr('src', e.target.result);
                    }
                    
                    reader.readAsDataURL(input.files[0]); // convert to base64 string
                }
                }

                $("#imgInp").change(function() {
                readURL(this);
                });
                </script>
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
            if (isset($_POST['creer'])) 
            {
                // on affecte les variables pour simplifier leurs ecritures
                $prenom = $_POST['prenom'];
                $nom = $_POST['nom'];
                $login = $_POST['login'];
                $mdp = $_POST['password'];
                $mdpc = $_POST['confirm-password'];
                $photo= $_POST['photo'];
                // on verifie si les champs sont remplis
                if (!empty($prenom) && !empty($nom) && !empty($login) && !empty($mdp) && !empty($mdpc) && !empty($photo))
                {
                    $users=jsondata('save');
                    $val=0;
                    foreach($users as $key => $user)
                    {
                        if($user["login"]===$login)
                        {
                            $val=$val+1;
                        }
                    }
                    if($val==0)
                    {
                        // on cree un tableau $tab avec les noms des variables comme indices
                        $tab =
                            [
                            'prenomad' => [],
                            'nomad' => [],
                            'login' => [],
                            'mdp' => [],
                            'image' =>[],
                            'role'=>[],
                            ];
                        // ensuite on affecte les donnes du formulaire sur le table tab
                        $tab['prenomad'] = $prenom;
                        $tab['nomad']= $nom;
                        $tab['login'] = $login;
                        $tab['mdp'] = $mdp;
                        $tab['image'] = $photo;
                        $tab['role'] = 'admin';
                        // on appelle le fichier json
                        $save = file_get_contents('asset/JSON/save.json');
                        // on decode le fichier et le transformer sous forme de table c'estquoi j'ai mis true
                        $save = json_decode($save,true);
                        // on affecte le tableau tab dans le fichier json
                        $save[]=$tab;
                        // on code encore le fichier
                        $save = json_encode($save);
                        // on sauvegarde le fichier
                        file_put_contents('asset/JSON/save.json',$save);
                    }
                    else
                    {
                        ?>
                        <div class="logerror"><?php echo "ce login existe deja";?></div>
                        <?php
                    }
                }
            }
        ?>
    </body>
</html>