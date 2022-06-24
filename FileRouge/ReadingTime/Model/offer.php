<?php
require_once 'dataBase.php';
require_once 'parentClass.php';

class Offer extends ParentClass{
    public function Add($data){

        $stmt = DB::connect()->prepare('INSERT INTO offers (prix_offer,image_offer,description_offer,title_offer,quantity) VALUES (:prix_offer,:image_offer,:description_offer,:title_offer,:quantity)');

        $executed = $stmt->execute(["prix_offer"=> $data['prix'],"image_offer"=> $data['path'],"description_offer"=>$data['description'],"title_offer"=>$data['title'],"quantity"=>$data['quantity']]);

        return  $executed ;
       
        $stmt = null;
    }

    public function delete($id){
        $stmt = DB::connect()->prepare("DELETE from offers where id = $id");
        $stmt->execute();
    }

    public function getAll(){
        $stmt = DB::connect()->prepare('SELECT * FROM offers');
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt = null;
    }

    public function getOne($id){
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

    public function Update($data){
    
        $stmt = DB::connect()->prepare('UPDATE offers SET title_offer = :title_offer , description_offer = :description_offer , image_offer= :image_offer , prix_offer = :prix_offer , quantity = :quantity WHERE id = :id');
        if(isset($data['check_image']) && !empty($data['check_image'])){
            $executed = $stmt->execute(["id"=> $data['id'] ,"title_offer"=> $data['title'] ,"description_offer"=> $data['description'] ,"image_offer"=> $data['path'] ,"prix_offer"=> $data['prix'] ,"quantity"=> $data['quantity']]);
        }else{
            $executed = $stmt->execute(["id"=> $data['id'] ,"title_offer"=> $data['title'] ,"description_offer"=> $data['description'] ,"image_offer"=> $data['picture'] ,"prix_offer"=> $data['prix'] ,"quantity"=> $data['quantity']]);
        }
       
        return $executed;

        $stmt = null;

    }

    public function UpdateQuantity($data){

        $stmt = DB::connect()->prepare('UPDATE offers SET quantity = :quantity WHERE id = :offer_id');
        $executed = $stmt->execute(["offer_id"=> $data['offer_id'] ,"quantity"=> $data['quantity']]);
        return $executed ;
      
        $stmt = null;        
    }

    public function VoidOffers(){
        $stmt = DB::connect()->prepare('SELECT * FROM offers WHERE quantity = 0');
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt = null;
    }

    public function getNotExpiredOffers(){
        $stmt = DB::connect()->prepare('SELECT * FROM offers WHERE quantity != 0');
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt = null;
    }    

}

?>