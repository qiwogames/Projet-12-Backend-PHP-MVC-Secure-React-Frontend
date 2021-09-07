<?php
require_once '../models/Matieres_modele.php';

function matiereParId(){
    $matieres = new Matieres_modele();

    $matieresID = $matieres->matiereParId();
    require_once '../vues/matieres/matiere_id.php';
    return $matieresID;
}

function ajouterMatiere($nom_matiere){
    $matieres = new Matieres_modele();
    $matieres->ajouterMatiere($nom_matiere);
    if($matieres){
        header('Location: dashboard');
    }else{
        echo "<p class='notification is-danger p-2'>Une erreur est survenue durant l'ajout de la matiere merci de réessayé !</p>";
    }
}

function supprimerUneMatière(){
    $matieres = new Matieres_modele();
    $delete = $matieres->supprimerMatiere();
    if($delete){
        header("Location: dashboard");
    }else{
        echo "rien a supprimer";
    }
}

function editerUneMatiere($nom_matiere, $id){
    $matieres = new Matieres_modele();
    $_GET['id'] = $id;
    $update = $matieres->editerMatiere($nom_matiere, $_GET['id']);
    if ($update) {
        header('Location: dashboard');
    } else {
        echo "<p class='notification is-danger p-2'>Une erreur est survenue durant la mise a jour de la matière merci de réessayé !</p>";
    }
}