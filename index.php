<?php

use Random\Engine\Secure;

session_start();

define("URL", str_replace("index.php","",(isset($_SERVER['HTTPS'])? "https" : "http").
"://".$_SERVER['HTTP_HOST'].$_SERVER["PHP_SELF"]));

require_once("./controllers/Toolbox.class.php"); //cette page permet de generer les erreur en variable de session
require_once("./controllers/Securite.class.php");
require_once("./controllers/Visiteur/Visiteur.controller.php");
require_once("./controllers/Utilisateur/Utilisateur.controller.php");
require_once("./controllers/Administrateur/Administrateur.controller.php");

$visiteurController = new VisiteurController();
$utilisateurController= new UtilisateurController();
$administrateurController= new AdministrateurController();

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
        break;
        case "creerCompte" : $visiteurController->creerCompte();
        break;
        case "validation_creerCompte":
            if (!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['date_naissance']) && !empty($_POST['numero_telephone']) && !empty($_POST['mail']) && !empty($_POST['adresse']) && !empty($_POST['mot_de_passe'])) {
                $nom = Securite::secureHTML($_POST['nom']);
                $prenom = Securite::secureHTML($_POST['prenom']);
                $date_naissance = Securite::secureHTML($_POST['date_naissance']);
                $numero_telephone = Securite::secureHTML($_POST['numero_telephone']);
                $mail = Securite::secureHTML($_POST['mail']);
                $adresse = Securite::secureHTML($_POST['adresse']);
                $mot_de_passe = Securite::secureHTML($_POST['mot_de_passe']);
                
                $utilisateurController->validation_creerCompte($nom, $prenom, $date_naissance, $numero_telephone, $mail, $adresse, $mot_de_passe);
            } else {
                Toolbox::ajouterMessageAlerte("Tous les champs sont obligatoires !", Toolbox::COULEUR_ROUGE);
                header('Location: ' . URL . 'creerCompte');
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
                    
        case "prendreRdv" : $utilisateurController -> prendreRdv();
        break;
                default : throw new Exception("La page n'existe pas"); //sans le default ça nous affiche une page blanche 
            }
        }
        break;
        case "conditions" : $visiteurController->conditions();
        break;
        case "administration" : 
            if(!Securite::estConnecte()){
                Toolbox::ajouterMessageAlerte("Veuillez vous connecter !",Toolbox::COULEUR_ROUGE);
                header('Location: '.URL.'login');
            }   elseif(!Securite::estAdministrateur()){
                Toolbox::ajouterMessageAlerte("Vous avez pas le droit d'être ici !",Toolbox::COULEUR_ROUGE);
                header('Location: '.URL.'accueil');
            }   else {
                switch($url[1]){
                    case "droits" : $administrateurController->droits();
                    break;     
                    case "validation_modificationRole"  : $administrateurController->validation_modificationRole($_POST['NOM_CLIENT'],$_POST['ROLE']);  
                    break;
                    default : throw new Exception("La page n'existe pas");
                }
            }
        default : throw new Exception("La page n'existe pas");
    }
} catch (Exception $e){
    $visiteurController->pageErreur($e->getMessage());
}