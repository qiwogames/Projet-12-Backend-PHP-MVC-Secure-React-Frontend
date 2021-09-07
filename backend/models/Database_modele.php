<?php

//Option json_encode http
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: PUT, PATCH, GET, POST, DELETE");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");


class Database_modele
{
    private $db_host = 'localhost';
    private $db_name = 'school_dev';
    private $db_user = 'root';
    private $db_pass = '';

    protected $isConnected;

    public function getPDO(){
        $this->isConnected = null;
        //Test de connexion singleton
        if($this->isConnected === null){
            try {
                $this->isConnected = new PDO("mysql:host=".$this->db_host.";dbname=".$this->db_name.";charset=utf8", $this->db_user, $this->db_pass);
                //DEBUG DE PDO
                $this->isConnected->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                //echo "C bon t connecté";
                //var_dump($this->isConnected);
                return $this->isConnected;
            }catch (PDOException $exception){
                echo "Erreur de connexion a PDO";
                die();
            }
        }
    }

}