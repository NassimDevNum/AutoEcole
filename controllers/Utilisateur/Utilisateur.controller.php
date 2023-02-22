<?php
require_once("./controllers/MainController.controller.php");
require_once("./models/Utilisateur/Utilisateur.model.php");


class UtilisateurController extends MainController{
     private $utilisateurManager;

    public function __construct(){
    $this->utilisateurManager = new UtilisateurManager();
    }

  public function validation_login($NOM_CLIENT,$MDP){
    if($this->utilisateurManager->isCombinaisonValide($NOM_CLIENT,$MDP)){
        echo "C'est bon";
    }else {
        Toolbox::ajouterMessageAlerte("Combinaison login et mdp non valide", Toolbox::COULEUR_ROUGE);
        header("Location: ".URL."login");
    }
  }

    public function pageErreur($msg){
        parent::pageErreur($msg);
    }
}