<div class="container mt-3">
    <?php
    require_once 'matiere_id.php';
    ?>
</div>



<div class="box">
    <form method="post">
        <h2 class="title is-2 has-text-info">Mettre à jour la matière</h2>

        <div class="field">
            <label class="label">Nom de la matiere :</label>
            <input type="text" name="nom_matiere" class="input" placeholder="Nom de la matière" required>
        </div>

        <div class="field">
            <button  class="button is-info">Mettre à jour la matière</button>
            <a href="dashboard" class="button is-danger">Retour</a>
        </div>
    </form>
</div>


<?php

//var_dump($_POST['nom_matiere']);

