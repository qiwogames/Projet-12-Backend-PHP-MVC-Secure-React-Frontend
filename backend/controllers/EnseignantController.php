<?php

require_once '../models/Enseignants_modele.php';

//Afficher les details

function enseignantParID(){
    $enseignant = new Enseignants_modele();

    $enseignantID = $enseignant->enseignatById();
    require_once '../vues/enseignants/enseignantID.php';
    return $enseignantID;
}


//Supprimer
function supprimerUnEnseignant(){
    $enseignant = new Enseignants_modele();
    $delete = $enseignant->supprimerEnseignant();
    if($delete){
        header("Location: dashboard");
    }else{
        echo "rien a supprimer";
    }
}

function editerUnEnseignant($nomEns, $prenomEns, $nomMatiere, $id){
    $enseignant = new Enseignants_modele();
    $_GET['id'] = $id;
    $update = $enseignant->editerEnseignant($nomEns, $prenomEns, $nomMatiere, $_GET['id']);

    if ($update) {
        header('Location: dashboard');
    } else {
        echo "<p class='notification is-danger p-2'>Une erreur est survenue durant la mise a jour de l'enseignant merci de réessayé !</p>";
    }
}

function ajouterEnseignant($nomEns, $prenomEns, $nomMatiere){
    $enseignant = new Enseignants_modele();
    $enseignant->ajouterEnseignant($nomEns, $prenomEns, $nomMatiere);
    if($enseignant){
        header('Location: dashboard');
    }else{
        echo "<p class='notification is-danger p-2'>Une erreur est survenue durant l'ajout de l'enseignant merci de réessayé !</p>";
    }
}
