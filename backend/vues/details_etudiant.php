
<?php
$nom = $etudiantID['prenomEtudiant'];

?>

<div class="container is-fluid">
    <div class="box">
        <div class="title is-1 p-2">
            Détails de l'étudiant :
        </div>
        <div>NOM : <?= $nom ?> </div>
        <div>PRENOM : <?= $etudiantID['nomEtudiant'] ?></div>
        <p>SEXE : <?= $etudiantID['sexe'] ?></p>

        <?php
        $date = new DateTime($etudiantID['dateNaissance'])
        ?>
        <p>Date de naissance : <?= $date->format('d-m-Y') ?></p>
        <a href="dashboard" class="button is-success">Retour</a>
    </div>

</div>
