<?php
require_once 'dataBase.php';

class GererOfferCommande{

    public function getAll(){

        $stmt = DB::connect()->prepare('SELECT * FROM `commandoffer` inner join offers on commandoffer.offer_id = offers.id WHERE made = "false" ');
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt = null;
    }

    public function getAllMades(){

        $stmt = DB::connect()->prepare('SELECT * FROM `commandoffer` inner join offers on commandoffer.offer_id = offers.id WHERE made = "true" ');
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt = null;
    }

    public function Update($data){;
    
        $stmt = DB::connect()->prepare('UPDATE commandoffer SET made = :made WHERE command_id = :command_id');

        $executed = $stmt->execute(["made"=> $data['made'],"command_id"=> $data['command_id']]);

        return $executed;

        $stmt = null;

    }

}

?>