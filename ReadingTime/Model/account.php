<?php
    require_once 'dataBase.php';

    class Account {
        public function addAccount($data){ 

            $statement = DB::connect()->prepare('INSERT INTO accounts (nom, prenom, email, mot_de_passe) VALUES (:nom, :prenom, :email, :mot_de_passe)');
            $executed = $statement->execute(["prenom"=> $data['prenom'],"nom"=> $data['nom'],"email"=> $data['email'],"mot_de_passe"=> $data['mot_de_passe']]);

            return $executed;

            $statement = null;
        }

        public function LogIn($data){

            $response = DB::connect()->query("SELECT * FROM accounts WHERE email LIKE '".$data['email']."'");
            
            $row = $response->fetch(PDO::FETCH_ASSOC);

            return $row;
        }
    }
?>