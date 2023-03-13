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
      //if($this->utilisateurManager->estCompteActive($login)){
      Toolbox::ajouterMessageAlerte("Bienvenue sur le site".$NOM_CLIENT." !", Toolbox::COULEUR_VERTE);  
     // echo "C'est bon";
      $_SESSION['profil'] = [
        "NOM_CLIENT" => $NOM_CLIENT,
      ];
      header("Location: ".URL."compte/profil");
    }else {
        Toolbox::ajouterMessageAlerte("Combinaison login et mdp non valide", Toolbox::COULEUR_ROUGE);
        header("Location: ".URL."login");
    }
  }  
  //}
  public function profil (){
    $datas = $this->utilisateurManager->getUserInformation($_SESSION['profil']['NOM_CLIENT']);
    //$_SESSION['profil']['role'] = $datas['role']; // à voir apres

    //$_SESSION['profil']

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

  public function validation_creerCompte($NOM_CLIENT,$MDP,$MAIL){
    if($this->utilisateurManager->verifLoginDisponible($NOM_CLIENT)){
      $passwordCrypt= password_hash($MDP, PASSWORD_DEFAULT);
      // $clef = rand(0,9999); // a voir apres 
      if($this->utilisateurManager->bdCreerCompte($NOM_CLIENT,$passwordCrypt,$MAIL)){
        $this->sendMailValidation($NOM_CLIENT, $MAIL);
        Toolbox::ajouterMessageAlerte("Le compte a  été créer ! ",Toolbox::COULEUR_VERTE);
        header("Location: ".URL."login");
      }else{
        Toolbox::ajouterMessageAlerte("Erreur lors de la création du compte, recommencer !",Toolbox::COULEUR_ROUGE);
        header("Location: ".URL."creeCompte");
      }
    }else {
      Toolbox::ajouterMessageAlerte("Le login est déjà utilisé ! ", Toolbox::COULEUR_ROUGE);
      header("Location: ".URL."creerCompte");
    }
  }

  private  function sendMailValidation( $NOM_CLIENT, $MAIL){
    $urlVerification = URL."validationMail/".$NOM_CLIENT."/";
    $sujet = "Création du compte sur le site < ... > ";
    $message = "Pour valider votre compte cliquer sur le lien suivant".$urlVerification;
    Toolbox::sendMail($MAIL,$sujet,$message);
  }

  public function pageErreur($msg){
     parent::pageErreur($msg);
  }
}