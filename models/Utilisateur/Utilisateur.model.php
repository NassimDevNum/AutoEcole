<?php

require_once("./models/MainManager.model.php");

class UtilisateurManager extends MainManager{
    
    private function getPasswordUser($MAIL){
        $req = "SELECT MOT_DE_PASSE FROM client WHERE MAIL = :MAIL";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":MAIL", $MAIL, PDO::PARAM_STR);
        $stmt->execute(); 
        $resultat = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $resultat['MOT_DE_PASSE'];
    }
    

    public function isCombinaisonValide($MAIL, $MOT_DE_PASSE){
        $passwordBD = $this->getPasswordUser($MAIL);
        return password_verify($MOT_DE_PASSE, $passwordBD);
    }
    


    public function getUserInformation($MAIL){
        $req = "SELECT * FROM client WHERE MAIL = :MAIL";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":MAIL",$MAIL,PDO::PARAM_STR);
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


// /* pour les rdv*/ 

    public function getLecon(){
        $req = $this->getBdd()->prepare("SELECT * FROM lecon");
        $req->execute();
        $datas = $req->fetchAll(PDO::FETCH_ASSOC);
        $req->closeCursor();
        return $datas;
        } 
    


    public function getMoniteur(){
        $req = $this->getBdd()->prepare("SELECT * FROM moniteur");
        $req->execute();
        $datas = $req->fetchAll(PDO::FETCH_ASSOC);
        $req->closeCursor();
        return $datas;
        } 

    public function getModele(){
        $req = $this->getBdd()->prepare("SELECT * FROM modele");
        $req->execute();
        $datas = $req->fetchAll(PDO::FETCH_ASSOC);
        $req->closeCursor();
        return $datas;
            } 
    
            public function bdPrendreRdv($nom_lecon, $nom_client, $nom_moniteur, $nom_modele, $date_heure_debut, $date_heure_fin){
                $req = "INSERT INTO PLANNING (NOM_LECON, NOM_CLIENT, NOM_MONITEUR, NOM_MODELE, DATE_HEURE_DEBUT, DATE_HEURE_FIN) VALUES (:nom_lecon, :nom_client, :nom_moniteur, :nom_modele, :date_heure_debut, :date_heure_fin)";
                $stmt = $this->getBdd()->prepare($req);
                $stmt->bindValue(":nom_lecon", $nom_lecon, PDO::PARAM_STR);
                $stmt->bindValue(":nom_client", $nom_client, PDO::PARAM_STR);
                $stmt->bindValue(":nom_moniteur", $nom_moniteur, PDO::PARAM_STR);
                $stmt->bindValue(":nom_modele", $nom_modele, PDO::PARAM_STR);
                $stmt->bindValue(":date_heure_debut", $date_heure_debut, PDO::PARAM_STR);
                $stmt->bindValue(":date_heure_fin", $date_heure_fin, PDO::PARAM_STR);
                $stmt->execute();
                $resultat = ($stmt->rowCount() > 0);
                $stmt->closeCursor();
                return $resultat;
            }
                

    } 
    //add ici
// class MoniteurManager extends MainManager{
//     public function getMoniteur(){
//         $req = $this->getBdd()->prepare("SELECT * FROM moniteur");
//         $req->execute();
//         $moniteurs = $req->fetchAll(PDO::FETCH_ASSOC);
//         $req->closeCursor();
//         return $moniteurs;
//         } 
//     }


//     class LeconManager extends MainManager{
//         public function getMoniteur(){
//             $req = $this->getBdd()->prepare("SELECT * FROM Lecon");
//             $req->execute();
//             $moniteurs = $req->fetchAll(PDO::FETCH_ASSOC);
//             $req->closeCursor();
//             return $moniteurs;
//             } 
//         }
//         class ModeleManager extends MainManager{
//             public function getMoniteur(){
//                 $req = $this->getBdd()->prepare("SELECT * FROM Modele");
//                 $req->execute();
//                 $moniteurs = $req->fetchAll(PDO::FETCH_ASSOC);
//                 $req->closeCursor();
//                 return $moniteurs;
//                 } 
//             }
?>