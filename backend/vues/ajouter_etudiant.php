
<div class="box">
    <form method="post">
        <h2 class="title is-2 has-text-info">Ajouter un etudiant</h2>

        <div class="field">
            <label class="label">Nom de l'etudiant :</label>
            <input type="text" name="nom_etudiant" class="input" placeholder="Nom de l'etudiant" required>
        </div>

        <div class="field">
            <label class="label">Prenom de l'etudiant :</label>
            <input name="prenom_etudiant" class="input"  placeholder="Prenom de l'etudiant" required>
        </div>

        <div class="field">
            <label class="label">Sexe de l'etudiant :</label>
            <input type="text" name="sexe" class="input" placeholder="Femme" required/>
        </div>

        <div class="field">
            <label class="label">Date de naissance :</label>
            <input type="date" name="date_naissance" value="<?= date("Y-m-d") ?>" class="input" required/>
        </div>

        <div class="field">
            <button name="btn_ajouter_etudiant" class="button is-info">Publier étudiant</button>
            <a href="dashboard" class="button is-danger">Retour</a>
        </div>
    </form>
</div>


<?php
/*
var_dump($_POST['nom_etudiant']);
var_dump($_POST['prenom_etudiant']);
var_dump($_POST['sexe']);
var_dump($_POST['date_naissance']);
*/
