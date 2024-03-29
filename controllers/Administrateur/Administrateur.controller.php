<?php
require_once("./controllers/MainController.controller.php");
require_once("./models/Administrateur/Administrateur.model.php");

class AdministrateurController extends MainController{
    private $AdministrateurManager;

    public function __construct(){
        $this->AdministrateurManager = new AdministrateurManager();
    }

    public function droits(){

        $utilisateurs = $this->AdministrateurManager->getUtilisateurs();

        $data_page = [
            "page_description" => "Gestion des droits",
            "page_title" => "Gestion des droits",
            "utilisateurs" => $utilisateurs,
            "view" => "views/Administrateur/droits.view.php",
            "template" => "views/common/template.php"
        ];
        $this->genererPage($data_page);
    }

    public function validation_modificationRole($NOM_CLIENT,$ROLE){
       if($this->AdministrateurManager->bdModificationRoleUser($NOM_CLIENT,$ROLE)){
        Toolbox::ajouterMessageAlerte('La modification été prise en compte', Toolbox::COULEUR_VERTE);
       }
       else{
        Toolbox::ajouterMessageAlerte("La modification n'a été prise en compte", Toolbox::COULEUR_ROUGE);
       }
       header('Location: '.URL.'administration/droits');
    }

    public function pageErreur($msg){
        parent::pageErreur($msg);
    }
}