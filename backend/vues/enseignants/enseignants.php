
<?php
require_once '../models/Enseignants_modele.php';
$enseignants = new Enseignants_modele();
$listeEnseignants = $enseignants->afficherEnseignants();
?>
<div id="enseignant" class="mt-3">
    <div class="panel-heading">
        ENSEIGNANTS
        <a href="ajouter-enseignant" class="is-info is-pulled-right">Ajouter un enseignant</a>
    </div>
    <div class="table-container">
        <table class="table is-striped container is-fluid">
        <thead>
        <tr>
            <th><abbr title="id">N°</abbr></th>
            <th><abbr title="prenom">PRENOM</abbr></th>
            <th><abbr title="nom">NOM</abbr></th>
            <th><abbr title="matiere">MATIERE</abbr></th>
            <th><abbr title="details">DÉTAILS</abbr></th>
            <th><abbr title="editer">EDITER</abbr></th>
            <th><abbr title="json">JSON</abbr></th>
            <th><abbr title="supprimer">SUPPRIMER</abbr></th>
        </tr>
        </thead>

        <?php
        foreach ($listeEnseignants as $ens){
            ?>
            <tbody>
            <tr>
                <th><?= $ens['idEns'] ?></th>
                <td><?= $ens['prenomEns'] ?></td>
                <td><?= $ens['nomEns'] ?></td>
                <td><?= $ens['nomMatiere'] ?></td>


                <td><a href="enseignantID&id=<?= $ens['idEns']?>" class="button is-warning">DÉTAILS</a></td>
                <td><a href="editer-enseignant&id=<?= $ens['idEns'] ?>" class="button is-info">EDITER</a></td>
                <td><a href="http://localhost/SchoolFullstack/backend/vues/enseignants/enseignant_json.php" target="_blank" class="button is-primary">JSON</a></td>
                <td><a href="supprimerenseignantID&id=<?= $ens['idEns']?>" class="button is-danger">SUPPRIMER</a></td>
            </tr>
            </tbody>
            <?php
        }
        ?>
    </table>
    </div>
</div>