<?php

use Random\Engine\Secure;

session_start();

//permet de tjr venir pointer vers la racine du site (gestion role)
define("URL", str_replace("index.php","",(isset($_SERVER['HTTPS'])? "https" : "http").
"://".$_SERVER['HTTP_HOST'].$_SERVER["PHP_SELF"]));


//on fera tjr appel a notre controle la ou se trouve la logique du site afin de piloter tout le contenue du site 
require_once("./controllers/Toolbox.class.php"); //cette page permet de generer les erreur en variable de session
require_once("./controllers/Securite.class.php");
require_once("./controllers/Visiteur/Visiteur.controller.php");
require_once("./controllers/Utilisateur/Utilisateur.controller.php");

$visiteurController = new VisiteurController();
$utilisateurController= new UtilisateurController();



// gere les url de routage 
try {
    if(empty($_GET['page'])){    //en gros supprime le "index.php?page=" de l'url
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
        break;
        case "creerCompte" : $visiteurController->creerCompte();
        break;
        case "validation_creerCompte" :
            if(!empty($_POST['NOM_CLIENT']) && !empty($_POST['MDP']) && !empty($_POST['MAIL'])){
                $NOM_CLIENT = Securite::secureHTML($_POST['NOM_CLIENT']);
                $MDP = Securite::secureHTML($_POST['MDP']);
                $MAIL = Securite::secureHTML($_POST['MAIL']);
                $utilisateurController->validation_creerCompte($NOM_CLIENT,$MDP,$MAIL);
            }else {
                Toolbox::ajouterMessageAlerte("les 3 information sont obligatoires !", Toolbox::COULEUR_ROUGE);
                header('Location: '.URL.'creerCompte');
            }
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
                case "validation_modificationMail" : $utilisateurController -> validation_modificationMail(Securite::secureHTML($_POST['MAIL']));
                break;
                case "modificationPassword" : $utilisateurController -> modificationPassword();
                break;
                case "validation_modificationPassword" : 
                    if(!empty($_POST['ancienMDP']) && !empty($_POST['newMDP']) && !empty($_POST['confirmMDP'])){
                        $ancienMDP = Securite::secureHTML($_POST['ancienMDP']);
                        $newMDP =Securite::secureHTML($_POST['newMDP']);
                        $confirmMDP =Securite::secureHTML($_POST['confirmMDP']);
                        $utilisateurController->validation_modificationPassword($ancienMDP,$newMDP,$confirmMDP);
                       
                    } else {
                        Toolbox::ajouterMessageAlerte('Vous avez pas renseigné toutes les information',Toolbox::COULEUR_ROUGE);
                        header('Location: '.URL.'compte/modificationPassword');
                    }
                    break;
                case "suppressionCompte" : $utilisateurController->suppressionCompte();
                break;
                // ajouter la prise de rdv ici
                case "newCours" :$utilisateurController ->prendreUnCours();
                break;
                default : throw new Exception("La page n'existe pas"); //sans le default ça nous affiche une page blanche 
            }
        }
        break;
        default : throw new Exception("La page n'existe pas"); //gestion des erreurs
    }
} catch (Exception $e){
    $visiteurController->pageErreur($e->getMessage());
}