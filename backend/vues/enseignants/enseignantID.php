
<?php
$nom = $enseignantID['prenomEns'];

?>

<div class="container is-fluid">
    <div class="box">
        <div class="title is-1 p-2">
            Détails de l'étudiant :
        </div>
        <div>NOM : <?= $nom ?> </div>
        <div>PRENOM : <?= $enseignantID['nomEns'] ?></div>
        <p>MATIERE : <?= $enseignantID['nomMatiere'] ?></p>
        <a href="dashboard" class="button is-success">Retour</a>
    </div>

</div>
