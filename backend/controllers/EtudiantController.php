<?php

require_once '../models/Etudiant_modele.php';

//Etudiant par id

function etudiantID(){
    //Insatnce du modele
    $etudiant = new Etudiant_modele();
    //Appel de la methode
    $etudiantID = $etudiant->etudiantParID();
    require_once '../vues/details_etudiant.php';
    return $etudiantID;
}

//Ajouter un etudiant

function ajouterEtudiant($nom_etudiant, $prenom_etudiant, $sexe, $date_naissance){
    $ajouter_etudiant = new Etudiant_modele();
    $ajouter_etudiant->ajouterEtudiantModele($nom_etudiant, $prenom_etudiant, $sexe, $date_naissance);
    if($ajouter_etudiant){
        header("Location: dashboard");
    }else{
        echo "<p class='notification is-danger p-2'>Une erreur est survenue durant l'ajout de l'étudiant merci de réessayé !</p>";
    }
}

//Mise a jour d'un etudiant
function miseAjourUnEtudiant($nom_etudiant, $prenom_etudiant, $sexe,$date_naissance, $id){
    //Insatnce de la classe etudiant
    $editer_etudiant = new Etudiant_modele();
    $_GET['id'] = $id;
    $update = $editer_etudiant->editerEtudiant($nom_etudiant, $prenom_etudiant, $sexe, $date_naissance, $_GET['id']);
    if($update){
        header("Location: dashboard");
    }else{
        echo "<p class='alert alert-danger'>Une erreur est survenue durant la mise a jour de l'etudiant merci de réessayé !</p>";
    }
}


//Supprimer un etudiant
//Supprimer une annone d'un utilisateur
function supprimerUnEtudiant(){
    //Instance du model (classe) annonce
    $etudiant = new Etudiant_modele();
    $confim = false;
    $delete = $etudiant->supprimerEtudiant();
    if($delete){
        header("Location: dashboard");
    }else{
        echo "rien a supprimer";
    }
}
