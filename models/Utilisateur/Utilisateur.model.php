<?php

require_once("./models/MainManager.model.php");

class UtilisateurManager extends MainManager{
    
    private function getPasswordUser($NOM_CLIENT){
        $req = "SELECT MDP FROM client WHERE NOM_CLIENT = :NOM_CLIENT";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":NOM_CLIENT",$NOM_CLIENT,PDO::PARAM_STR);
        $stmt->execute(); 
        $resultat = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $resultat['MDP'];
    }

    public function isCombinaisonValide($NOM_CLIENT,$MDP){
        $passwordBD = $this->getPasswordUser($NOM_CLIENT);
        //echo $passwordBD;
        return password_verify($MDP, $passwordBD);
       }


    public function getUserInformation($NOM_CLIENT){
        $req = "SELECT * FROM client WHERE NOM_CLIENT = :NOM_CLIENT";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":NOM_CLIENT",$NOM_CLIENT,PDO::PARAM_STR);
        $stmt->execute(); 
        $resultat = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $resultat;
    }

    public function bdCreerCompte($NOM_CLIENT,$passwordCrypt,$MAIL){
        $req = "INSERT INTO client (NOM_CLIENT, MDP, MAIL)
        VALUES (:NOM_CLIENT, :MDP, :MAIL)" ;
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":NOM_CLIENT",$NOM_CLIENT,PDO::PARAM_STR);
        $stmt->bindValue(":MDP",$passwordCrypt,PDO::PARAM_STR);
        $stmt->bindValue(":MAIL",$MAIL,PDO::PARAM_STR);
        $stmt->execute();
        $estModifier = ($stmt->rowCount() > 0);
        $stmt->closeCursor();
        return $estModifier;
    }

    public function verifLoginDisponible($NOM_CLIENT){
        $client = $this->getUserInformation($NOM_CLIENT);
        return empty($client);
    }

    /* valider compte non necessaire */

    public function bdModificationMailUser($NOM_CLIENT,$MAIL){
        $req = "UPDATE client set MAIL  = :MAIL WHERE NOM_CLIENT = :NOM_CLIENT";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":NOM_CLIENT",$NOM_CLIENT,PDO::PARAM_STR);
        $stmt->bindValue(":MAIL",$MAIL,PDO::PARAM_STR);
        $stmt->execute();
        $estModifier = ($stmt->rowCount() > 0);
        $stmt->closeCursor();
        return $estModifier;
    }



    } 
?>