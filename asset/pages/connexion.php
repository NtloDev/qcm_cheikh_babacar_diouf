
        <div class="joueur-inscription">
        <div class="inscription-joueur">
            <div class="inscription-joueur-title1">S'INSCRIRE</div><br>
            <div class="inscription-joueur-title2">Pour tester votre niveau de culture generale</div><br><br><br>
            <form method="post" action="" id="form-connexion">
            <div class="inscription-joueur-title-form">Prénom</div><br>
            <input type="text" name="prenom" error ="error-3" class="input2">
            <div class="error-form" id="error-3"></div><br><br>
            <div class="inscription-joueur-title-form">Nom</div><br>
            <input type="text" name="nom" error ="error-4" class="input2">
            <div class="error-form" id="error-4"></div><br><br>
            <div class="inscription-joueur-title-form">Login</div><br>
            <input type="text" name="login" error ="error-5" class="input2">
            <div class="error-form" id="error-5"></div><br><br>
            <div class="inscription-joueur-title-form">Password</div><br>
            <input type="password" name="password" error ="error-6" class="input2">
            <div class="error-form" id="error-6"></div><br><br>
            <div class="inscription-joueur-title-form">Confirmer Password</div><br>
            <input type="password" name="confirm-password" error ="error-7" class="input2" >
            <div class="error-form" id="error-7"></div><br><br>
            <div class="avatar2">Avatar <input type="file" name="photo" class="fileUpload2"></div>
            <br>
            <input type="submit" name="creer" value="Creer un compte" class="creer2">

            </form>
            <img src="" class="profil-image-avatar" />
            <div class="profil-image-avatar-title">Avatar du joueur</div>
        </div> 
        <script>
      const inputs =  document.getElementsByTagName("input");
     for(input of inputs){
         input.addEventListener("keyup",function(e){
           if(e.target.hasAttribute("error")) {
               var idDivError=e.target.getAttribute("error");
               document.getElementById(idDivError).innerText=""
           }
         })
 
     } 
    document.getElementById("form-connexion").addEventListener("submit",function(e){
        const inputs =  document.getElementsByTagName("input");
        var error = false;
        for(input of inputs){
            if(input.hasAttribute("error")){
               var idDivError=input.getAttribute("error")
            if(!input.value){
                
                    
                    document.getElementById(idDivError).innerText="Ce champs est obligatoire"
                    error = true
                }
                
                
            }
           
        }
        if(error){
            e.preventDefault();
        }
        
        return false
    })
</script>
    <?php

        if (isset($_POST['creer'])) {

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
                foreach($users as $key => $user){
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
                    'prenom' => [],
                    'nom' => [],
                    'login' => [],
                    'mdp' => [],
                    'image' =>[],
                    'role'=>[],
                ];

                // ensuite on affecte les donnes du formulaire sur le table tab
                $tab['prenom'] = $prenom;
                $tab['nom']= $nom;
                $tab['login'] = $login;
                $tab['mdp'] = $mdp;
                $tab['image'] = $photo;
                $tab['role'] = 'joueur';

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
                header("location:index.php");
                 }
                 else{
                     ?>

                <div class="logerror"><?php echo "ce login existe deja";?></div>
                <?php
                 }
            }
             }
        
    ?>
