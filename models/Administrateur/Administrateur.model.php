<?php

require_once("./models/MainManager.model.php");

class AdministrateurManager extends MainManager{
    public function getUtilisateurs(){
        $req = $this->getBdd()->prepare("SELECT * FROM client");
        $req->execute();
        $datas = $req->fetchAll(PDO::FETCH_ASSOC);
        $req->closeCursor();
        return $datas;
    } 


    public function bdModificationRoleUser($NOM_CLIENT,$ROLE){
        $req = "UPDATE client set ROLE  = :ROLE WHERE NOM_CLIENT = :NOM_CLIENT";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":NOM_CLIENT",$NOM_CLIENT,PDO::PARAM_STR);
        $stmt->bindValue(":ROLE",$ROLE,PDO::PARAM_STR);
        $stmt->execute();
        $estModifier = ($stmt->rowCount() > 0);
        $stmt->closeCursor();
        return $estModifier;
    }
}

?>