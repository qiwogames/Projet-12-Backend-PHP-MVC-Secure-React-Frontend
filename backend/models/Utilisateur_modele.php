<?php

//Appel de la classe MERE PDO

require_once "Database_modele.php";

class Utilisateur_modele extends Database_modele
{

    //Init des variables
    private $id_utilisateur;
    private $nom_utilisateur;
    private $email_utilisateur;
    private $password_utilisateur;


    //Connexion
    public function connecterUtilisateur(){
        //Connexion PDO
        $db = $this->getPDO();
        //Affectation des variables
        $this->email_utilisateur = $_POST['email'];
        $this->password_utilisateur = $_POST['password'];

        //Requète SQL
        $sql = "SELECT * FROM utilisateur WHERE email = ? AND password = ?";
        //Requète préparée
        $statement = $db->prepare($sql);
        //Liés les paramètre de la requète aux données de la table
        $statement->bindParam(1, $this->email_utilisateur);
        $statement->bindParam(2, $this->password_utilisateur);

        //Execution de la requète
        $statement->execute();

        //On compte les element de la table et on check les valeurs
        //Si il y a au moin une valeur
        if($statement->rowCount() >= 1){
            $row = $statement->fetch(PDO::FETCH_ASSOC);
            $this->id_utilisateur = $row['id'];
            $this->email_utilisateur = $row['email'];
            $this->password_utilisateur = $row['password'];

            //Check si ca matche + condition

            if($this->email_utilisateur === $row['email'] && $this->password_utilisateur === $row['password']){
                //On demarre une session
                session_start();
                //On stock les valeurs temoraire dans une session
                $_SESSION['est_connecter'] = true;
                $_SESSION['email'] = $this->email_utilisateur;
                $_SESSION['password'] = $this->password_utilisateur;
                //On fait une redirection vers le dashboard
                header('Location: dashboard');
            }else{
                //Sinon on declenche une erreur
                echo "<div class='mt-3 notification is-danger'>Erreur ! Merci de vérifié votre email et mot de passe</div>";
            }
        }else{
            if(!$_SESSION['est_connecter']){
                echo "<script>alert(\"Aucun utilisateur ne possèdent cet email et mot de passe\")</script>";
            }
            echo "<div class='mt-3 notification is-danger'>Aucun utilisateur ne possèdent cet email et mot de passe</div>";
        }
    }
}