<div class="mt-5 center-element box">
    <article class="mt-5 panel is-warning">
        <div class="has-text-centered">
            <p class="panel-heading m-5 title is-1 has-text-info p-5">
                CONNEXION
            </p>
            <img src="backend/assets/img/logo.png">
            <h1 class="m-3 title is-4 has-text-info">ÉCOLE DE DÉVELOPPEMENT WEB & MOBILE</h1>
        </div>

        <div class="panel-block m-5 p-5">
            <form method="post" class="container">
                <div class="field">
                    <label class="label">Email :</label>
                    <input name="email" class="input is-warning" required autofocus type="email" placeholder="email">
                </div>
                <div class="field">
                    <label class="label">Mot de passe :</label>
                    <input name="password" class="input is-warning" required type="password" placeholder="email">
                </div>

                <div class="field">
                    <button name="btn-connexion" type="submit" class="button is-warning">CONNEXION</button>
                </div>
            </form>
        </div>
    </article>
</div>

<?php
/*
var_dump($_POST['email']);
var_dump($_POST['password']);
*/
if(isset($_POST['btn-connexion'])){
    connexion();
}