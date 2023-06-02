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
    $_SESSION['profil']['ROLE'] = $datas['ROLE'];

    $data_page = [
      "page_description" => "Page de profil",
      "page_title" => "Page de profil",
      "utilisateur" => $datas,       //         // info de l'utilisateur vers la vu grace à cette ligne 
      "page_javascript"=>['profil.js'],
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

  public function validation_creerCompte($nom, $prenom, $date_naissance, $numero_telephone, $mail, $adresse, $password){
    if($this->utilisateurManager->verifMailDisponible($mail)){
      $passwordCrypt= password_hash($password, PASSWORD_DEFAULT);
      if($this->utilisateurManager->bdCreerCompte($nom, $prenom, $date_naissance, $numero_telephone, $mail, $adresse, $passwordCrypt, "utilisateur")){
        $clef = rand(0,9999); // a voir apres
        $this->sendMailValidation($nom, $mail, $clef);
        Toolbox::ajouterMessageAlerte("Le compte a été créé ! Un mail de validation vous a été envoyé !", Toolbox::COULEUR_VERTE);
        header("Location: ".URL."login");
      }else{
        Toolbox::ajouterMessageAlerte("Erreur lors de la création du compte, recommencez !", Toolbox::COULEUR_ROUGE);
        header("Location: ".URL."creerCompte");
      }
    }else {
      Toolbox::ajouterMessageAlerte("Le mail est déjà utilisé ! ", Toolbox::COULEUR_ROUGE);
      header("Location: ".URL."creerCompte");
    }
  }


  private function sendMailValidation($NOM_CLIENT,$MAIL,$clef){
    $urlVerification = URL." validationMail/".$NOM_CLIENT."/".$clef;
    $sujet = "Création du compte sur le site < ... > ";
    $message = "Pour valider votre compte cliquer sur le lien suivant".$urlVerification;
    Toolbox::sendMail($MAIL,$sujet,$message);
  }


  public function validation_modificationMail($MAIL){
    if($this->utilisateurManager->bdModificationMailUser($_SESSION['profil']['NOM_CLIENT'], $MAIL)){
      Toolbox::ajouterMessageAlerte("la modification est effectuée", Toolbox::COULEUR_VERTE);
    } else {
      Toolbox::ajouterMessageAlerte("Aucune modification effectuée", Toolbox::COULEUR_ROUGE);
    }
    header("Location: ".URL."compte/profil");
  }

  public function modificationPassword(){
    $data_page = [
      "page_description" => "Page de modification du password",
      "page_title" => "Page modification du password",
      "page_javascript" => ["modificationPassword.js"],
      "view" => "views/Utilisateur/modificationPassword.view.php",
      "template" => "views/common/template.php"
  ];
  $this->genererPage($data_page);
  }

  public function validation_modificationPassword($ancienMDP,$newMDP,$confirmMDP){
    if ($newMDP === $confirmMDP) {
      if($this->utilisateurManager->isCombinaisonValide($_SESSION['profil']['NOM_CLIENT'], $ancienMDP)){
          $passwordCrypt = password_hash($newMDP,PASSWORD_DEFAULT);
          if($this->utilisateurManager->bdModificationPassword($_SESSION['profil']['NOM_CLIENT'],$passwordCrypt)){
            Toolbox::ajouterMessageAlerte('La modification mdp est prise en compte',Toolbox::COULEUR_VERTE);
            header('Location: '.URL.'compte/profil');
          } else { 
        Toolbox::ajouterMessageAlerte('Modification a echouée',Toolbox::COULEUR_ROUGE);
      header('Location: '.URL.'compte/modificationPassword');
      }
    } else {
      Toolbox::ajouterMessageAlerte('Les mdp ne correspondent pas',Toolbox::COULEUR_ROUGE);
      header('Location: '.URL.'compte/modificationPassword');
  }
}
  }



  public function suppressionCompte(){
    if($this->utilisateurManager->bdSuppressionCompte($_SESSION['profil']['NOM_CLIENT'])){
      Toolbox::ajouterMessageAlerte('la Suppression du compte est un succès',Toolbox::COULEUR_VERTE);
      $this->deconnexion();
    } else {
      Toolbox::ajouterMessageAlerte("la Suppression n'a pas été effectuée. Contacter l'administrateur",Toolbox::COULEUR_VERTE);
      header('Location: '.URL.'compte/profil');
    }
  }


  public function prendreRdv(){
    
    $data_page = [
      "page_description" => "Page de prise de RDV",
      "page_title" => "Page de prise de RDV",
      "view" => "views/Utilisateur/prendreRdv.view.php",
      "template" => "views/common/template.php"
  ];
  $this->genererPage($data_page);
  }
  

  public function pageErreur($msg){
     parent::pageErreur($msg);
  }
}