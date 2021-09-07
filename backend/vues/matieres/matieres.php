
<?php
require_once '../models/Matieres_modele.php';
$matiere = new Matieres_modele();
$listeMatiere = $matiere->afficherMatiere();
?>
<div id="matiere" class="mt-3">
    <div class="panel-heading">
        MATIERES
        <a href="ajouter-matiere" class="is-info is-pulled-right">Ajouter une matière</a>
    </div>
    <div class="table-container">
        <table class="table is-striped container is-fluid">
        <thead>
        <tr>
            <th><abbr title="id">N°</abbr></th>
            <th><abbr title="matiere">MATIERE</abbr></th>
            <th><abbr title="details">DÉTAILS</abbr></th>
            <th><abbr title="editer">EDITER</abbr></th>
            <th><abbr title="json">JSON</abbr></th>
            <th><abbr title="supprimer">SUPPRIMER</abbr></th>
        </thead>

        <?php
        foreach ($listeMatiere as $mat){
            ?>
            <tbody>
            <tr>
                <th><?= $mat['id_matiere'] ?></th>
                <td><?= $mat['nomMatiere'] ?></td>
                <td><a href="matiereID&id=<?= $mat['id_matiere']?>" class="button is-warning">DÉTAILS</a></td>
                <td><a href="editer-matiere&id=<?= $mat['id_matiere'] ?>" class="button is-info">EDITER</a></td>
                <td><a href="http://localhost/SchoolFullstack/backend/vues/matieres/matiere_json.php" target="_blank" class="button is-primary">JSON</a></td>
                <td><a href="supprimermatiereID&id=<?= $mat['id_matiere']?>" class="button is-danger">SUPPRIMER</a></td>
            </tr>
            </tbody>
            <?php
        }
        ?>
    </table>
    </div>
</div>
