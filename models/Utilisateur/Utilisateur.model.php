<?php

require_once("./models/MainManager.model.php");

class UtilisateurManager extends MainManager{
    
    private function getPasswordUser($NOM_CLIENT){
        $req = "select MDP from client where NOM_CLIENT = :NOM_CLIENT";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":NOM_CLIENT",$NOM_CLIENT,PDO::PARAM_STR);
        $stmt->execute();
        $admin = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $admin['MDP'];
    }

    public function isCombinaisonValide($NOM_CLIENT,$MDP){
        $passwordBD = $this->getPasswordUser($NOM_CLIENT);
        echo $passwordBD;
        return password_verify($MDP, $passwordBD);
       }
    } 


?>