<?php 

class Securite {
    public static function secureHTML($chaine){
        return htmlentities($chaine);
    }

    public static function estConnecte(){
        return(!empty($_SESSION['profil']));
    }

    public static function estUtilisateur(){
        return(($_SESSION['profil']['ROLE'] === "utilisateur"));
    }
    public static function estAdministrateur(){
        return(($_SESSION['profil']['ROLE'] === "administrateur"));
    }
}

?>