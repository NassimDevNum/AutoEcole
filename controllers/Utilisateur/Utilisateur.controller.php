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
      Toolbox::ajouterMessageAlerte("Bienvenue sur le site".$NOM_CLIENT. "!", Toolbox::COULEUR_VERTE);  
      //echo "C'est bon";
      $_SESSION['profil'] = [
        "NOM_CLIENT" => $NOM_CLIENT,
      ];
      header("location: ".URL."compte/profil");
    }else {
        Toolbox::ajouterMessageAlerte("Combinaison login et mdp non valide", Toolbox::COULEUR_ROUGE);
        header("Location: ".URL."login");
    }
  }
  public function profil (){
    $datas = $this->utilisateurManager->getUserInformation($_SESSION['profil']['NOM_CLIENT']);
    // $_SESSION['profil']['role'] = $datas['role']; // à voir apres

    $data_page = [
      "page_description" => "Page de profil",
      "page_title" => "Page de profil",
      "utilisateur" => $datas,       //         // info de l'utilisateur vers la vu grace à cette ligne 
      "view" => "views/Utilisateur/profil.view.php",
      "template" => "views/common/template.php"
  ];
  $this->genererPage($data_page);
  }

  public function deconnexion(){
    Toolbox::ajouterMessageAlerte("Dexonnexion efectuée",Toolbox::COULEUR_VERTE);
    unset($_SESSION['profil']);
    header("Location: ".URL."accueil");
  }

  public function pageErreur($msg){
     parent::pageErreur($msg);
  }
}