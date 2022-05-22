<?php
require_once 'dataBase.php';

class Offer{
    static public function AddOffer(){
        
        $image = $_FILES['image']['name'];
        $imgsrc= $_FILES['image']['tmp_name'];
        $folderLocation = "../images";
        $path="$folderLocation/".$image;
        move_uploaded_file($imgsrc,$path);

        $description = $_POST['description'];
        $prix = $_POST['prix'];
        $title = $_POST['titre'];

        $stmt = DB::connect()->prepare('INSERT INTO offers (prix_offer,image_offer,description_offer,title_offer) VALUES (:prix_offer,:image_offer,:description_offer,:title_offer)');

        $executed = $stmt->execute(["prix_offer"=> $prix,"image_offer"=> $path,"description_offer"=>$description,"title_offer"=>$title]);

        if($executed){
            return 'ok';
        }else{
            return 'error';
        }
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

    static public function Update(){

        $title = $_POST['titre'];
        $picture = $_POST['picture'];
        $description = $_POST['description'];
        $prix = $_POST['prix'];
        $id = $_POST['id'];
        $image = $_FILES['image']['name'];
        $imgsrc= $_FILES['image']['tmp_name'];
        $folderLocation = "../images";
        $path ="$folderLocation/".$image;
        move_uploaded_file($imgsrc,$path);
    
        $stmt = DB::connect()->prepare('UPDATE offers SET title_offer = :title_offer , description_offer = :description_offer , image_offer= :image_offer , prix_offer = :prix_offer WHERE id = :id');
        if(isset($image) && !empty($image)){
            $executed = $stmt->execute(["id"=> $id ,"title_offer"=> $title  ,"description_offer"=> $description ,"image_offer"=> $path ,"prix_offer"=> $prix]);
        }else{
            $executed = $stmt->execute(["id"=> $id ,"title_offer"=> $title  ,"description_offer"=> $description ,"image_offer"=> $picture ,"prix_offer"=> $prix]);
        }
        if($executed){
            return 'ok';
        }else{
            return 'error';
        }
        $stmt = null;
        }
}

?>