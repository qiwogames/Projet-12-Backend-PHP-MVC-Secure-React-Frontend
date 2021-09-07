<?php

require_once 'Database_modele.php';

class Etudiant_modele extends Database_modele
{
    //Init des variables
    private $idEtudiant;
    private $nomEtudiant;
    private $prenomEtudiant;
    private $sexe;
    private $dateNaissance;


    public function afficherEtudiants(){
        //init connexion
        $db = $this->getPDO();
        //Requète SQL

        $table = 'etudiant';
        $sql = "SELECT * FROM {$table}";
        //Recuperation des valeur avec query
        /*
         * PDO::query — Exécute une requête SQL, retourne un jeu de résultats en tant qu'objet PDOStatement
         */
        $etudiants = $db->query($sql);
        return $etudiants;
    }

    //En json
    public function etudiantJson(){
        //init connexion
        $db = $this->getPDO();
        //Requète SQL

        $table = 'etudiant';
        $etudiantArray = [];
        $sql = "SELECT * FROM {$table}";
        //Recuperation des valeur avec query
        /*
         * PDO::query — Exécute une requête SQL, retourne un jeu de résultats en tant qu'objet PDOStatement
         */
        $etudiants = $db->query($sql);

        if($etudiants){
            //Init du compteur d'elements
            $i = 0;
            //Boucle de lecture
            while ($row = $etudiants->fetch(PDO::FETCH_ASSOC)){
                $etudiantArray[$i]['id'] = $row['id'];
                $etudiantArray[$i]['nomEtudiant'] = $row['nomEtudiant'];
                $etudiantArray[$i]['prenomEtudiant'] = $row['prenomEtudiant'];
                $etudiantArray[$i]['sexe'] = $row['sexe'];
                $etudiantArray[$i]['dateNaissance'] = $row['dateNaissance'];
                //Incremente le compteur
                $i++;
            }

            //Si tous va bien on encode SQL
            echo json_encode($etudiantArray, JSON_PRETTY_PRINT);
        }else{
            http_response_code(404);
        }
    }

    //Etudiant par id
    public function etudiantParID(){
        $db = $this->getPDO();
        $table = 'etudiant';
        $sql = "SELECT * FROM {$table} WHERE id = ?";
        $this->idEtudiant = $_GET['id'];
        $statement = $db->prepare($sql);
        $statement->bindParam(1, $this->idEtudiant);
        $statement->execute();
        $etudiant = $statement->fetch(PDO::FETCH_ASSOC);
        return $etudiant;
    }

    //Ajouter un etudiant
    public function  ajouterEtudiantModele($nom_etudiant, $prenom_etudiant, $sexe, $date_naissance){
        //Connexion a db
        $db = $this->getPDO();
        //Variables privée
        $this->nomEtudiant = $nom_etudiant;
        $this->prenomEtudiant = $prenom_etudiant;
        $this->sexe = $sexe;
        $this->dateNaissance = $date_naissance;


        $table = 'etudiant';
        //Reaquète http
        $sql = "INSERT INTO `etudiant`(`nomEtudiant`, `prenomEtudiant`, `sexe`, `dateNaissance`) VALUES (?,?,?,?)";

        $statement = $db->prepare($sql);
        //Lié les données du formulaire propriétés de la table etudiant
        $statement->bindParam(1, $nom_etudiant);
        $statement->bindParam(2, $prenom_etudiant);
        $statement->bindParam(3, $sexe);
        $statement->bindParam(4, $date_naissance);

        //Executer la requète
        $statement->execute(array(
            $nom_etudiant,
            $prenom_etudiant,
            $sexe,
            $date_naissance
        ));
        return $statement;
    }

    //Editer un etudiant
    public function editerEtudiant($nom_etudiant, $prenom_etudiant, $sexe, $date_naissance, $id){
        //Connexion a db
        $db = $this->getPDO();
        //Variables privée

        $this->nomEtudiant = $nom_etudiant;
        $this->prenomEtudiant = $prenom_etudiant;
        $this->sexe = $sexe;
        $this->dateNaissance = $date_naissance;
        $this->idEtudiant = $id;


        //Requète SQL
        $sql = "UPDATE `etudiant` SET `nomEtudiant`= ?,`prenomEtudiant`= ?,`sexe`=?,`dateNaissance`=? WHERE id = ?";
        //Requète prépérée
        $update= $db->prepare($sql);

        $update->execute(array($nom_etudiant, $prenom_etudiant, $sexe, $date_naissance, $id));
        return $update;
    }


    //Supprimer un etudiant
    public function supprimerEtudiant(){
        //Appel de  la classe mere et de la methode PDO
        $db = $this->getPDO();
        //Requète sql
        $sql = 'DELETE FROM `etudiant` WHERE `id` = ?';
        //Creation de la requète péparée
        $stmt = $db->prepare($sql);
        $this->idEtudiant = $_GET['id'];
        //Lié les paramètre (ici id de annonce a $_GET id url)
        $stmt->bindParam(1, $this->idEtudiant);
        //Execution de la requète
        $delete = $stmt->execute();
        //Retourne l'objet avec son id
        return $delete;
    }
}