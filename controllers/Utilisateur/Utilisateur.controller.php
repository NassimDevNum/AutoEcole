<?php
require_once("./controllers/MainController.controller.php");
require_once("./models/Utilisateur/Utilisateur.model.php");


class UtilisateurController extends MainController{
     private $utilisateurManager;
     private $moniteurManager;
     private $leconManager;
     private $modeleManager;
     

    public function __construct(){
    $this->utilisateurManager = new UtilisateurManager();
   // $this->moniteurManager = new MoniteurManager(); //add ici
    }

    public function validation_login($MAIL, $MOT_DE_PASSE){
      if($this->utilisateurManager->isCombinaisonValide($MAIL, $MOT_DE_PASSE)){
          // Vérifiez si le compte est actif ici si nécessaire
          Toolbox::ajouterMessageAlerte("Bienvenue sur le site ".$MAIL." !", Toolbox::COULEUR_VERTE);
          $_SESSION['profil'] = [
              "MAIL" => $MAIL,
          ];
          header("Location: ".URL."compte/profil");
      }else {
          Toolbox::ajouterMessageAlerte("Combinaison email et mot de passe non valide", Toolbox::COULEUR_ROUGE);
          header("Location: ".URL."login");
      }
  }
   
  //}
  public function profil (){
    $datas = $this->utilisateurManager->getUserInformation($_SESSION['profil']['MAIL']);
    if (is_array($datas) && isset($datas['ROLE'])) {
        $_SESSION['profil']['ROLE'] = $datas['ROLE'];
}
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
    Toolbox::ajouterMessageAlerte("Dexonnexion effectuée",Toolbox::COULEUR_VERTE);
    unset($_SESSION['profil']);
    header("Location: ".URL."accueil");
  }

  public function validation_creerCompte($nom, $prenom, $date_naissance, $numero_telephone, $mail, $adresse, $mot_de_passe)
  {
      if ($this->utilisateurManager->verifMailDisponible($mail)) {
          $mot_de_passe_crypte = password_hash($mot_de_passe, PASSWORD_DEFAULT);
          if ($this->utilisateurManager->bdCreerCompte($nom, $prenom, $date_naissance, $numero_telephone, $mail, $adresse, $mot_de_passe_crypte, "utilisateur"  )) {
              $clef = rand(0, 9999); // À voir après
              $this->sendMailValidation($nom, $mail, $clef);
              Toolbox::ajouterMessageAlerte("Le compte a été créé ! Un mail de validation vous a été envoyé !", Toolbox::COULEUR_VERTE);
              header("Location: " . URL . "login");
          } else {
              Toolbox::ajouterMessageAlerte("Erreur lors de la création du compte, recommencez !", Toolbox::COULEUR_ROUGE);
              header("Location: " . URL . "creerCompte");
          }
      } else {
          Toolbox::ajouterMessageAlerte("Le mail est déjà utilisé !", Toolbox::COULEUR_ROUGE);
          header("Location: " . URL . "creerCompte");
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

  public function prendreRdv()
  {
      $datas = $this->utilisateurManager->getUserInformation($_SESSION['profil']['MAIL']);
      if (is_array($datas) && isset($datas['ROLE'])) {
          $_SESSION['profil']['ROLE'] = $datas['ROLE'];
      }
  
      $moniteurs = $this->utilisateurManager->getMoniteur(); // Récupération des informations des moniteurs
      $lecons = $this->utilisateurManager->getLecon();
      $modeles = $this->utilisateurManager->getModele();

      $data_page = [
          "page_description" => "Page de prise de RDV",
          "page_title" => "Page de prise de RDV",
          "utilisateur" => $datas,
          "moniteurs" => $moniteurs, // Ajout des moniteurs dans le tableau
          "lecons" => $lecons,
          "modeles" => $modeles,
          "view" => "views/Utilisateur/prendreRdv.view.php",
          "template" => "views/common/template.php"
      ];
      $this->genererPage($data_page);
  }
  
  public function validation_prendreRdv($n_lecon, $n_moniteur, $n_modele, $date_heure_debut, $date_heure_fin)
{
    // Récupération du N_CLIENT à partir de la session
    $mail_client = $_SESSION['profil']['MAIL'];
    $infos_client = $this->utilisateurManager->getUserInformation($mail_client);
    $n_client = $infos_client['N_CLIENT'];
      
    if ($this->utilisateurManager->bdPrendreRdv($n_lecon, $n_client, $n_moniteur, $n_modele, $date_heure_debut, $date_heure_fin)) {
        Toolbox::ajouterMessageAlerte("Le rendez-vous a bien été pris en compte !", Toolbox::COULEUR_VERTE);
        header("Location: " . URL . "compte/prendreRdv");
    } else {
        Toolbox::ajouterMessageAlerte("Erreur lors de la prise de rendez-vous !", Toolbox::COULEUR_ROUGE);
        header("Location: " . URL . "compte/prendreRdv");
    }
}



  public function pageErreur($msg){
     parent::pageErreur($msg);
  }
}