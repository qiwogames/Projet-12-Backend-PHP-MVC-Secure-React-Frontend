<?php
require_once 'Database_modele.php';

class Matieres_modele extends Database_modele
{


    private $id_matiere;
    private $nom_matiere;

    function afficherMatiere(){
        //init connexion
        $db = $this->getPDO();
        //Requète SQL

        $table = 'matieres';
        $sql = "SELECT * FROM {$table}";
        //Recuperation des valeur avec query
        /*
         * PDO::query — Exécute une requête SQL, retourne un jeu de résultats en tant qu'objet PDOStatement
         */
        $matieres = $db->query($sql);
        return $matieres;
    }


    public function matieresJson(){
        $db = $this->getPDO();

        $table = 'matieres';
        $matieresArray = [];

        $sql = "SELECT * FROM {$table}";

        $matieres = $db->query($sql);

        if($matieres){
            $i = 0;
            while($row = $matieres->fetch(PDO::FETCH_ASSOC)){
                $matieresArray[$i]['id_matiere'] = $row['id_matiere'];
                $matieresArray[$i]['nomMatiere'] = $row['nomMatiere'];

                $i++;
            }

            echo json_encode($matieresArray,JSON_PRETTY_PRINT);
        }else{
            http_response_code(404);
        }
    }


    public function matiereParId(){
        $db = $this->getPDO();
        $table = 'matieres';
        $sql = "SELECT * FROM {$table} WHERE id_matiere = ?";
        $this->id_matiere = $_GET['id'];
        $statement = $db->prepare($sql);
        $statement->bindParam(1,$this->id_matiere);
        $statement->execute();
        $matiere = $statement->fetch(PDO::FETCH_ASSOC);
        return $matiere;
    }

    public function ajouterMatiere($nom_matiere){
        $db = $this->getPDO();
        $this->nom_matiere;
        $table = 'matieres';

        $sql = "INSERT INTO matieres (nomMatiere) VALUES (?)";

        $statement = $db->prepare($sql);
        $statement->bindParam(1,$nom_matiere);
        $statement->execute();

        return $statement;
    }

    public function editerMatiere($nom_matiere, $id_matiere){
        $db = $this->getPDO();

        $this->nom_matiere = $nom_matiere;
        $this->id_matiere = $id_matiere;

        $sql = "UPDATE matieres SET nomMatiere = ? WHERE id_matiere = ?";

        $update = $db->prepare($sql);
        $update->execute([$nom_matiere, $id_matiere]);
        return $update;
    }

    public function supprimerMatiere(){
        $db = $this->getPDO();
        $sql = "DELETE FROM matieres WHERE id_matiere = ?";

        $statement = $db->prepare($sql);
            $this->id_matiere = $_GET['id'];
            $statement->bindParam(1, $this->id_matiere);
            $delete = $statement->execute();
            return $delete;
    }
}