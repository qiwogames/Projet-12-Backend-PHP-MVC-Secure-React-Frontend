<?php
require_once '../models/Etudiant_modele.php';
$etudiants = new Etudiant_modele();
$listeEtudiants = $etudiants->afficherEtudiants();


if($_SESSION['est_connecter']){

    ?>
    <div class="container is-fluid">
        <div class="notification is-success">
            <div class="title is-4">Bonjour :<b class="has-text-info"> <?= $_SESSION['email'] ?></b>
                <a href="deconnexion" class="is-pulled-right is-danger">DECONNEXION</a>
            </div>
        </div>
        <div class="box">
            <div class="title is-2 has-text-centered has-text-danger">TABLEAU DE BORD</div>
            <div class="columns">
                <div class="column is-3">
                    <?php
                    require_once 'left_aside.php'
                    ?>
                </div>
                <div class="column is-9">
                    <article id="etudiant" class="panel is-success">
                        <div class="panel-heading">
                            ETUDIANTS
                            <a href="ajouter-etudiant" class="is-info is-pulled-right">Ajouter etudiant</a>
                        </div>
                        <div class="table-container">
                            <table class="table is-striped container is-fluid">
                            <thead>
                            <tr>
                                <th><abbr title="id">N°</abbr></th>
                                <th><abbr title="prenom">PRENOM</abbr></th>
                                <th><abbr title="nom">NOM</abbr></th>
                                <th><abbr title="sexe">SEXE</abbr></th>
                                <th><abbr title="date_naissance">DATE NAISSANCE</abbr></th>
                                <th><abbr title="details">DÉTAILS</abbr></th>
                                <th><abbr title="editer">EDITER</abbr></th>
                                <th><abbr title="json">JSON</abbr></th>
                                <th><abbr title="supprimer">SUPPRIMER</abbr></th>
                            </tr>
                            </thead>

                            <?php
                                foreach ($listeEtudiants as $et){
                                    ?>
                                    <tbody>
                                    <tr>
                                        <th><?= $et['id'] ?></th>
                                        <td><?= $et['prenomEtudiant'] ?></td>
                                        <td><?= $et['nomEtudiant'] ?></td>
                                        <td><?= $et['sexe'] ?></td>

                                        <?php
                                        $date = new DateTime($et['dateNaissance'])
                                        ?>

                                        <td><?= $date->format('d-m-Y') ?></td>
                                        <td><a href="etudiantID&id=<?= $et['id']?>" class="button is-warning">DÉTAILS</a></td>
                                        <td><a href="editer-etudiant&id=<?= $et['id'] ?>" class="button is-info">EDITER</a></td>
                                        <td><a href="http://localhost/SchoolFullstack/backend/vues/etudiant_json.php" target="_blank" class="button is-primary">JSON</a></td>
                                        <td><a href="supprimerEtudiantID&id=<?= $et['id']?>" class="button is-danger">SUPPRIMER</a></td>
                                    </tr>
                                    </tbody>
                                    <?php
                                }
                            ?>
                        </table>
                        </div>

                        <?php
                        require_once "../vues/enseignants/enseignants.php";
                        require_once "../vues/matieres/matieres.php";
                        ?>

                    </article>
                </div>
            </div>
        </div>
    </div>
<?php
}

?>
<script>
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            document.querySelector(this.getAttribute('href')).scrollIntoView({
                behavior: 'smooth'
            });
        });
    });
</script>

