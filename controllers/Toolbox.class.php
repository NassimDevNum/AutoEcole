<?php
class Toolbox {
    // ici les const dispo 
    public const COULEUR_ROUGE = "alert-danger";
    public const COULEUR_ORANGE = "alert-warning";
    public const COULEUR_VERTE = "alert-success";
    //la fonction ajouter message d'alerte
    public static function ajouterMessageAlerte($message,$type){
        $_SESSION['alert'][]=[
            "message" => $message,
            "type" => $type
        ];
    }
    public static function sendMail($destinataire, $sujet, $message){
        $headers = "From: lahlouhnassim@gmail.com";
        if (mail($destinataire,$sujet,$message,$headers)){
            self::ajouterMessageAlerte("Mail envoyé", self::COULEUR_VERTE);
        }else {
            self::ajouterMessageAlerte("Mail non envoyé", self::COULEUR_ROUGE);
        }
    }
}