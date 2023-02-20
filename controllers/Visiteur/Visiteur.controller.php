<?php
require_once("./controllers/MainController.controller.php");

class VisiteurController extends MainController{
  
    public function accueil(){
        $data_page = [
            "page_description" => "Description de la page d'accueil",
            "page_title" => "Titre de la page d'accueil",
            "view" => "views/Visiteur/accueil.view.php",
            "template" => "views/common/template.php"
        ];
        $this->genererPage($data_page);
    }

    public function pageErreur($msg){
        parent::pageErreur($msg);
    }
}