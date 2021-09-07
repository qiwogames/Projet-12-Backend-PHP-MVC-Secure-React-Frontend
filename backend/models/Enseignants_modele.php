<?php

require_once 'Database_modele.php';
class Enseignants_modele extends Database_modele
{
    //Init des varaiables
    private $idEns;
    private $nomEns;
    private $prenomEns;
    private $nomMat;


    //Afficher les enseignants
    public function afficherEnseignants(){
        //init connexion
        $db = $this->getPDO();
        //Requète SQL

        $sql = "SELECT * FROM enseignant INNER JOIN  matieres ON enseignant.nomMatiere = matieres.id_matiere";
        //Recuperation des valeur avec query
        /*
         * PDO::query — Exécute une requête SQL, retourne un jeu de résultats en tant qu'objet PDOStatement
         */
        $enseignant = $db->query($sql);
        return $enseignant;
    }


    //Exporter les enseignat au format json
    public function enseignantJson(){
        //init connexion
        $db = $this->getPDO();
        //Requète SQL

        $enseignantArray = [];
        $sql = "SELECT * FROM enseignant INNER JOIN  matieres ON enseignant.nomMatiere = matieres.id_matiere";
        //Recuperation des valeur avec query
        /*
         * PDO::query — Exécute une requête SQL, retourne un jeu de résultats en tant qu'objet PDOStatement
         */
        $enseignants = $db->query($sql);

        if($enseignants){
            //Init du compteur d'elements
            $i = 0;
            //Boucle de lecture
            while ($row = $enseignants->fetch(PDO::FETCH_ASSOC)){
                $enseignantArray[$i]['idEns'] = $row['idEns'];
                $enseignantArray[$i]['nomEns'] = $row['nomEns'];
                $enseignantArray[$i]['prenomEns'] = $row['prenomEns'];
                $enseignantArray[$i]['nomMatiere'] = $row['nomMatiere'];
                //Incremente le compteur
                $i++;
            }

            //Si tous va bien on encode SQL
            echo json_encode($enseignantArray, JSON_PRETTY_PRINT);
        }else{
            http_response_code(404);
        }
    }

    public function enseignatById(){
        $db = $this->getPDO();
        $sql = "SELECT * FROM enseignant INNER JOIN matieres ON enseignant.nomMatiere = matieres.id_matiere WHERE idEns= ?";
        $this->idEns = $_GET['id'];
        $statement = $db->prepare($sql);
        $statement->bindParam(1, $_GET['id']);
        $statement->execute();

        $details = $statement->fetch(PDO::FETCH_ASSOC);
        return $details;
    }

    //Ajouter un enseignant
    public function ajouterEnseignant($nomEns, $prenomEns, $nomMatiere){
        $db = $this->getPDO();

        $this->nomEns = $nomEns;
        $this->prenomEns = $prenomEns;
        $this->nomMat = $nomMatiere;

        $sql = "INSERT INTO enseignant (nomEns, prenomEns, nomMatiere) VALUES (?,?,?)";

        $statement = $db->prepare($sql);

        $statement->bindParam(1, $nomEns);
        $statement->bindParam(2, $prenomEns);
        $statement->bindParam(3, $nomMatiere);

        $statement->execute(array(
            $nomEns,
            $prenomEns,
            $nomMatiere
        ));

        return $statement;
    }

    //Supprimer enseignant
    public function supprimerEnseignant(){

        $db = $this->getPDO();

        $sql = 'DELETE FROM enseignant WHERE idEns = ?';
        $statement = $db->prepare($sql);
        $this->idEns = $_GET['id'];
        $statement->bindParam(1, $this->idEns);
        $delete = $statement->execute();
        return $delete;
    }

    //Mettre a jour enseignant
    public function editerEnseignant($nomEns, $prenomEns, $nomMatiere, $id){
        $db = $this->getPDO();

        $this->nomEns = $nomEns;
        $this->prenomEns = $prenomEns;
        $this->nomMat = $nomMatiere;

        $sql = "UPDATE enseignant SET nomEns = ?, prenomEns = ?, nomMatiere = ? WHERE idEns = ?";
        $statement = $db->prepare($sql);
        $statement->execute(array($nomEns, $prenomEns, $nomMatiere, $id,));
        return $statement;
    }
}