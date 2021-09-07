<?php
require_once '../models/Utilisateur_modele.php';

//Connecter un utilisateur
function connexion(){
    //Instance du modele
    $utilisateur = new Utilisateur_modele();
    //Appel de la methode du modele
    $connecter_utilisateur = $utilisateur->connecterUtilisateur();
    return $connecter_utilisateur;
}