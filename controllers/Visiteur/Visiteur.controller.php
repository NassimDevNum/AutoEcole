<?php
require_once("./controllers/MainController.controller.php");
require_once("./models/Visiteur/Visiteur.model.php");


class VisiteurController extends MainController{
    private $visiteurManager;

    public function __construct(){
        $this->visiteurManager = new VisiteurManager();
    }

    public function accueil(){
        $utilisateurs = $this->visiteurManager->getUtilisateurs();

        $data_page = [
            "page_description" => "Description de la page d'accueil",
            "page_title" => "Titre de la page d'accueil",
            "utilisateurs" => $utilisateurs,                    // info trans vers la vu grace à cette ligne 
            "view" => "views/Visiteur/accueil.view.php",
            "template" => "views/common/template.php"
        ];
        $this->genererPage($data_page);
    }

    public function login(){
        //echo password_hash("test", PASSWORD_DEFAULT);
        $data_page = [
            "page_description" => "Page de connexion",
            "page_title" => "Page de connexion",    // info trans vers la vu grace à cette ligne 
            "view" => "views/Visiteur/login.view.php",
            "template" => "views/common/template.php"
        ];
        $this->genererPage($data_page);
    }

    public function pageErreur($msg){
        parent::pageErreur($msg);
    }
}