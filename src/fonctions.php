<?php 
    function connexion($login,$mdp){
        $users=jsondata();
        
        foreach($users as $key => $user){
            if($user["login"]===$login && $user["mdp"]===$mdp)
            {
                $_SESSION['user']=$user;
                $_SESSION['statut']="login";
                if ($user["role"]==="admin"){
                    return "accueil";
                }
                else{
                    return "jeux";
                }

            }
           
        }
        return "error";
    }

    function jsondata($file="save"){
        $save = file_get_contents("asset/JSON/".$file.".json");
        $save= json_decode($save,true);
        return $save;
    }

    function deconnexion(){
        unset($_SESSION['user']);
        unset( $_SESSION['statut']);
        session_destroy();
    }
    function is_connect (){
        if (!isset($_SESSION['statut'])){
            header ("location:index.php");
        }
    }
?>