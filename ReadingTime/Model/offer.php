<?php
require_once 'dataBase.php';

class Offer{
    static public function AddOffer($data){

        $stmt = DB::connect()->prepare('INSERT INTO offers (prix_offer,image_offer,description_offer,title_offer) VALUES (:prix_offer,:image_offer,:description_offer,:title_offer)');

        $executed = $stmt->execute(["prix_offer"=> $data['prix'],"image_offer"=> $data['path'],"description_offer"=>$data['description'],"title_offer"=>$data['title']]);

        return  $executed ;
       
        $stmt = null;
    }

    static public function deleteOffer($id){
        $stmt = DB::connect()->prepare("DELETE from offers where id = $id");
        $stmt->execute();
    }


    static public function getAll(){
        $stmt = DB::connect()->prepare('SELECT * FROM offers');
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt = null;
    }

    static public function getOffer($id){
        try{
            $stmt = DB::connect()->prepare("SELECT * FROM offers WHERE id = $id");
            $stmt->execute();
            $offer = $stmt->fetch(PDO::FETCH_ASSOC);
            return $offer;

        }catch(PDOexception $ex)
        {
            echo 'erreur'.$ex->getMessage();
        }
    }

    static public function Update($data){;
    
        $stmt = DB::connect()->prepare('UPDATE offers SET title_offer = :title_offer , description_offer = :description_offer , image_offer= :image_offer , prix_offer = :prix_offer WHERE id = :id');
        if(isset($data['check_image']) && !empty($data['check_image'])){
            $executed = $stmt->execute(["id"=> $data['id'] ,"title_offer"=> $data['title'] ,"description_offer"=> $data['description'] ,"image_offer"=> $data['path'] ,"prix_offer"=> $data['prix']]);
        }else{
            $executed = $stmt->execute(["id"=> $data['id'] ,"title_offer"=> $data['title'] ,"description_offer"=> $data['description'] ,"image_offer"=> $data['picture'] ,"prix_offer"=> $data['prix']]);
        }
       
        return $executed;

        $stmt = null;

        }
}

?>