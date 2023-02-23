<?php
session_start();

define("URL", str_replace("index.php","",(isset($_SERVER['HTTPS'])? "https" : "http").
"://".$_SERVER['HTTP_HOST'].$_SERVER["PHP_SELF"]));

require_once("./controllers/Toolbox.class.php"); //cette page permet de generer les erreur en variable de session
require_once("./controllers/Securite.class.php");
require_once("./controllers/Visiteur/Visiteur.controller.php");
require_once("./controllers/Utilisateur/Utilisateur.controller.php");

$visiteurController = new VisiteurController();
$utilisateurController= new UtilisateurController();

try {
    if(empty($_GET['page'])){
        $page = "accueil";
    } else {
        $url = explode("/", filter_var($_GET['page'],FILTER_SANITIZE_URL));
        $page = $url[0];
    }

    switch($page){
        case "accueil" : $visiteurController->accueil();
        break;
        case "login" : $visiteurController->login();
        break;
        case "validation_login" : 
            if (!empty($_POST['NOM_CLIENT']) && !empty($_POST['MDP'])){
                $NOM_CLIENT = Securite::secureHTML($_POST['NOM_CLIENT']);
                $MDP = Securite::secureHTML($_POST['MDP']);
                $utilisateurController->validation_login($NOM_CLIENT,$MDP);
        }
        else {
            Toolbox::ajouterMessageAlerte("Login ou mdp non renseigné",Toolbox::COULEUR_ROUGE );
            header('Location: '.URL.'login');
        }
      // echo $_POST['NOM_CLIENT'] . " - " .$_POST['MDP']; 
        break;
        case "compte" : 
           if (!Securite::estConnecte()){  //le if suivant vérifie si on est bien co ou pas 
            Toolbox::ajouterMessageAlerte('Veuiller vous connecter !', Toolbox::COULEUR_ROUGE);
            header('Location: '.URL.'login');
        } else{
            switch($url[1]){
                case "profil": $utilisateurController->profil();
                break;
              case "deconnexion" : $utilisateurController->deconnexion();
                break;
                default : throw new Exception("La page n'existe pas"); //sans le default ça nous affiche une page blanche 
            }
        }
        break;
        default : throw new Exception("La page n'existe pas");
    }
} catch (Exception $e){
    $visiteurController->pageErreur($e->getMessage());
}