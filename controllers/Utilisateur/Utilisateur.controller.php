<?php
require_once("./controllers/MainController.controller.php");
require_once("./models/Visiteur/Visiteur.model.php");


class UtilisateurController extends MainController{
    // private $visiteurManager;

    // public function __construct(){
    //     $this->visiteurManager = new VisiteurManager();
    // }

  public function validation_login($NOM_CLIENT,$MDP){
    echo "test";
  }

    public function pageErreur($msg){
        parent::pageErreur($msg);
    }
}