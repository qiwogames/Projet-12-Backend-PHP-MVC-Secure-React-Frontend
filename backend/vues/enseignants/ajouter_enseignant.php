
<?php
require_once './../models/Matieres_modele.php';
$matiere = new Matieres_modele();
$listeMatiere = $matiere->afficherMatiere();
?>

<div class="box">
    <form method="post">
        <h2 class="title is-2 has-text-info">Ajouter un enseignant</h2>

        <div class="field">
            <label class="label">Nom de l'etudiant :</label>
            <input type="text" name="nom_enseignant" class="input" placeholder="Nom de l'enseignant" required>
        </div>

        <div class="field">
            <label class="label">Prenom de l'enseignant :</label>
            <input name="prenom_enseignant" class="input"  placeholder="Prenom de l'enseignant" required>
        </div>

        <div class="field">
            <label class="label">Matière :</label>

                        <div class="select">
                            <select name="nom_matiere">
                            <?php
                            foreach ($listeMatiere as $mat){
                            ?>
                                <option value="<?= $mat['id_matiere'] ?>"><?= $mat['nomMatiere'] ?></option>
                                <?php
                            }
                            ?>
                            </select>
                        </div>


        </div>

        <div class="field">
            <button name="btn_ajouter_enseignant" class="button is-info">Publier enseignant</button>
            <a href="dashboard" class="button is-danger">Retour</a>
        </div>
    </form>
</div>


<?php

//var_dump($_POST['nom_enseignant']);
//var_dump($_POST['prenom_enseignant']);
//var_dump($_POST['nom_matiere']);


