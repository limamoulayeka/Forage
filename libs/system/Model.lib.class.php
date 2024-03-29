<?php
/*======================================================
    SENFORAGE EST UN PROJET PHP DE GESTION DE FORAGE
    AVEC LE FRAMEWORK SAMANE MVC
    DEVELOPPE PAR LIMAMOU LAYE KA
    almahdilaye@gmail.com
    (+221) 78 - 137 - 66 - 46
  ======================================================*/
/*==================================================
    MODELE MVC DEVELOPPE PAR Ngor SECK
    ngorsecka@gmail.com
    (+221) 77 - 433 - 97 - 16
    PERFECTIONNEZ CE MODEL ET FAITES MOI UN RETOUR
    POUR TOUTE MODIFICATION VISANT A AMELIORER
    CE DERNIER (GIT).
    VOUS ETES LIBRE DE TOUTE UTILISATION.
  ===================================================*/

class Model{
        protected $db;
        public function __construct(){
            if(connexion_params()['etat'] == 'on')
                $this->db = $this->getConnexion();
        }

        private function getConnexion(){
            $dsn = "mysql:host=".connexion_params()['host'].";dbname=".connexion_params()['database_name'];
            $user = connexion_params()['user'];
            $password = connexion_params()['password'];
            try{
                $this->db = new PDO($dsn,
                                        $user,
                                        $password,
                                        array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
            }catch (PDOException $ex){
                $erreur_base = $ex->getMessage();
            if(substr($erreur_base, 0, 8) == "SQLSTATE")
                die("<h1>Hooo vous n'avez pas encore cree la base de donnees? :)</h1>");
            else
                die('Erreur : '.$ex->getMessage());
            }
            return $this->db;
        }
    }
?>