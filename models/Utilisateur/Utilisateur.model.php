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

    // public function bdCreerCompte($NOM_CLIENT,$passwordCrypt,$MAIL,$ROLE){
    //     $req = "INSERT INTO client (NOM_CLIENT, MDP, MAIL, ROLE)
    //     VALUES (:NOM_CLIENT, :MDP, :MAIL, :ROLE)" ;
    //     $stmt = $this->getBdd()->prepare($req);
    //     $stmt->bindValue(":NOM_CLIENT",$NOM_CLIENT,PDO::PARAM_STR);
    //     $stmt->bindValue(":MDP",$passwordCrypt,PDO::PARAM_STR);
    //     $stmt->bindValue(":MAIL",$MAIL,PDO::PARAM_STR);
    //     $stmt->bindValue(":ROLE",$ROLE,PDO::PARAM_STR);
    //     $stmt->execute();
    //     $estModifier = ($stmt->rowCount() > 0);
    //     $stmt->closeCursor();
    //     return $estModifier;
    // }

    public function bdCreerCompte($nom, $prenom, $date_naissance, $numero_telephone, $mail, $adresse, $passwordCrypt, $role)
    {
        $req = "INSERT INTO CLIENT (NOM_CLIENT, PRENOM_CLIENT, ADRESSE_CLIENT, DATE_DE_NAISSANCE, TEL, DATE_INSCRIPTION, MAIL, MOT_DE_PASSE, ROLE)
        VALUES (:NOM_CLIENT, :PRENOM_CLIENT, :ADRESSE_CLIENT, :DATE_DE_NAISSANCE, :TEL, NOW(), :MAIL, :MOT_DE_PASSE, :ROLE)";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":NOM_CLIENT", $nom, PDO::PARAM_STR);
        $stmt->bindValue(":PRENOM_CLIENT", $prenom, PDO::PARAM_STR);
        $stmt->bindValue(":ADRESSE_CLIENT", $adresse, PDO::PARAM_STR);
        $stmt->bindValue(":DATE_DE_NAISSANCE", $date_naissance, PDO::PARAM_STR);
        $stmt->bindValue(":TEL", $numero_telephone, PDO::PARAM_STR);
        $stmt->bindValue(":MAIL", $mail, PDO::PARAM_STR);
        $stmt->bindValue(":MOT_DE_PASSE", $passwordCrypt, PDO::PARAM_STR);
        $stmt->bindValue(":ROLE", $role, PDO::PARAM_STR);
        $stmt->execute();
        $estModifier = ($stmt->rowCount() > 0);
        $stmt->closeCursor();
        return $estModifier;
    }
    
    
    
    public function verifMailDisponible($mail) {
        $req = "SELECT COUNT(*) as nb FROM client WHERE MAIL = :mail";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":mail", $mail, PDO::PARAM_STR);
        $stmt->execute();
        $resultat = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        
        // Si le nombre de correspondances est égal à 0, cela signifie que l'email n'est pas utilisé, retourner true
        return $resultat['nb'] == 0;
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

    public function bdModificationPassword($NOM_CLIENT,$MDP){
        $req = "UPDATE client set MDP  = :MDP WHERE NOM_CLIENT = :NOM_CLIENT";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":NOM_CLIENT",$NOM_CLIENT,PDO::PARAM_STR);
        $stmt->bindValue(":MDP",$MDP,PDO::PARAM_STR);
        $stmt->execute();
        $estModifier = ($stmt->rowCount() > 0);
        $stmt->closeCursor();
        return $estModifier;
    }


    public function bdSuppressionCompte($NOM_CLIENT){
        $req = "DELETE from client where NOM_CLIENT = :NOM_CLIENT";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":NOM_CLIENT",$NOM_CLIENT,PDO::PARAM_STR);
        $stmt->execute();
        $estModifier = ($stmt->rowCount() > 0);
        $stmt->closeCursor();
        return $estModifier;
    }

    } 
?>