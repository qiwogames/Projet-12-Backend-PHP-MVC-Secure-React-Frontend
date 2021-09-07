<?php
session_start();

//ob_start — Enclenche la temporisation de sortie (memoire tampon)
ob_start();

//Appel des controllers
require_once '../controllers/UtilisateurController.php';
require_once '../controllers/EtudiantController.php';
require_once '../controllers/EnseignantController.php';
require_once '../controllers/MatiereController.php';

//Cle / Valeur URL
if(isset($_GET['url'])){
    $url = $_GET['url'];
}else{
    $url = 'connexion';
}

/*
$match_url = ['connexion','dashboard','etudiantID','ajouter-etudiant','supprimerEtudiantID'];

if(in_array($url,$match_url)){
    echo 'la route est dans le tableau';
}else{
    ////////////////////Si aucune route ne matches/////////////////////
    header('Location: http://localhost/SchoolFullstack/backend/connexion');
}
*/

////////////////////Les routes//////////////////


///////////////CONNEXION////////////////////
if($url === 'connexion'){
    $title = "Dev_School -CONNEXION-";
    require_once 'connexion.php';

    ///////////////ACCES DASHBOARD////////////////////
}elseif ($url === 'dashboard' && $_SESSION['est_connecter'] === true){
    $title = "Dev_School -DASHBOARD-";
    require_once 'dashboard.php';
    ///////////////DECONNEXION////////////////////
}elseif ($url === 'deconnexion'){
    require_once 'deconnexion.php';

    ///////////////DETAILS ETUDIANT////////////////////
}elseif ($url === 'etudiantID' && isset($_GET['id']) && $_GET['id'] > 0){
    $title = 'Dev_School -DETAILS ETUDIANT-';
    etudiantID();
    ///////////////AJOUTER ETUDIANT////////////////////
}elseif ($url === "ajouter-etudiant"){
    $title = "Dev_School -AJOUTER ETUDIANT -";
    require_once 'ajouter_etudiant.php';
    if(isset($_POST['nom_etudiant']) && isset($_POST['prenom_etudiant']) && isset($_POST['sexe']) && isset($_POST['date_naissance'])){
        ajouterEtudiant($_POST['nom_etudiant'], $_POST['prenom_etudiant'], $_POST['sexe'], $_POST['date_naissance']);
    }
    ///////////////SUPPRIMER ETUDIANT////////////////////
}elseif ($url === "supprimerEtudiantID" && isset($_GET['id']) && $_GET['id'] > 0){
    supprimerUnEtudiant();
    ///////////////EDITER ETUDIANT////////////////////
}elseif ($url === "editer-etudiant" && isset($_GET['id']) && $_GET['id'] > 0){
    $title = "Dev_School -EDITER ETUDIANT -";
    etudiantID();
    require_once 'editer_etudiant.php';
    if(isset($_POST['nom_etudiant']) && isset($_POST['prenom_etudiant']) && isset($_POST['sexe']) && isset($_POST['date_naissance'])){
        miseAjourUnEtudiant($_POST['nom_etudiant'], $_POST['prenom_etudiant'], $_POST['sexe'], $_POST['date_naissance'],$_GET['id']);
    }

    ///////////////////////////////ENSEIGNANTS/////////////////////
}elseif($url === "enseignantID" && isset($_GET['id']) && $_GET['id'] > 0){
    $title = 'Dev_School -DETAILS ENSEIGNANTS-';
    enseignantParID();
    /////////////////////AJOUTER ENSEIGNANT/////////////////
}elseif($url === "ajouter-enseignant"){
    $title = "Dev_School -AJOUTER ENSEIGNANT-";
    require_once 'enseignants/ajouter_enseignant.php';
    if(isset($_POST['nom_enseignant']) && isset($_POST['prenom_enseignant']) && isset($_POST['nom_matiere'])){
        ajouterEnseignant($_POST['nom_enseignant'], $_POST['prenom_enseignant'], $_POST['nom_matiere']);
    }
    /////////////////SUPPRIMER ENSEIGNANT////////////////
}elseif($url === "supprimerenseignantID" && isset($_GET['id']) && $_GET['id'] > 0){
    supprimerUnEnseignant();
    /////////////////EDITER ENSEIGNANT//////////////////////
}elseif ($url === "editer-enseignant" && isset($_GET['id']) && $_GET['id'] > 0){
    $title = "Dev_School -EDITER ENSEIGNANTS -";
    enseignantParID();
    require_once 'enseignants/editer_enseignant.php';
    if(isset($_POST['nom_enseignant']) && isset($_POST['prenom_enseignant']) && isset($_POST['nom_matiere'])){
        editerUnEnseignant($_POST['nom_enseignant'], $_POST['prenom_enseignant'], $_POST['nom_matiere'],$_GET['id']);
    }

    ///////////////MATIERE ID////////////////////
}elseif ($url === "matiereID" && isset($_GET['id']) && $_GET['id'] > 0){
    $title = 'Dev_School -DETAILS MATIERE-';
    matiereParId();
    ////////////AJOUTER MATIERE/////////////
}elseif ($url === "ajouter-matiere"){
    $title = "Dev_School -AJOUTER MATIERE-";
    require_once 'matieres/ajouter_matiere.php';
    if(isset($_POST['nom_matiere'])){
        ajouterMatiere($_POST['nom_matiere']);
    }
}elseif ($url === "supprimermatiereID" && isset($_GET['id']) && $_GET['id'] > 0){
    supprimerUneMatière();
}elseif ($url === "editer-matiere" && isset($_GET['id']) && $_GET['id'] > 0){
    $title = "Dev_School -EDITER MATIERE -";
    matiereParId();
    require_once 'matieres/editer_matiere.php';
    if(isset($_POST['nom_matiere'])){
        editerUneMatiere($_POST['nom_matiere'], $_GET['id']);
    }
}

else{
    header('Location: connexion');
}



//ob_get_clean — Lit le contenu courant du tampon de sortie puis l'efface
$content = ob_get_clean();

require_once 'template.php';


