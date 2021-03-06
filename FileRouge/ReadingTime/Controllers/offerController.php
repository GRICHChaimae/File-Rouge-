<?php

require_once '../../model/offer.php';

class OfferController{
    public function AddOffer(){

    if(!isset($_POST['submit'])) return ;

        $image = $_FILES['image']['name'];
        $imgsrc= $_FILES['image']['tmp_name'];
        $folderLocation = "../images";
        $path = $folderLocation."/".$image;
        move_uploaded_file($imgsrc,$path);

        $data = array(
            'description' => $_POST['description'],
            'prix' => $_POST['prix'],
            'title'=> $_POST['titre'],
            'path'=> $path,
            'quantity'=> $_POST['quantity']
        );

        $add = new Offer();
        $result = $add->Add($data);

        if($result){
            header("location:admin_management_offer.php");
        }else{
            echo $result;   
        }
    }


    public function getAllOffers(){

        $getAll = new Offer();
        $Offers = $getAll->getAll();
        return $Offers;
    }

    public function getOneOffer($id){
        $getOne = new Offer();
        $Offers = $getOne ->getOne($id);
        return $Offers;
    }

    public function UpdateOffer(){
        if(!isset($_POST['submit'])) return;
    
        $image = $_FILES['image']['name'];
        $imgsrc= $_FILES['image']['tmp_name'];
        $folderLocation = "../images";
        $path ="$folderLocation/".$image;
        move_uploaded_file($imgsrc,$path);

        $data = array(
            'title' => $_POST['titre'],
            'picture' => $_POST['picture'],
            'description' =>$_POST['description'],
            'prix' => $_POST['prix'],
            'id' => $_POST['id'],
            'path' => $path,
            'check_image' => $image,
            'quantity'=> $_POST['quantity']
        );    

        $edit = new Offer();
        $result = $edit->Update($data);

        if($result){
            header('location:admin_management_offer.php');
        }else{
            echo $result;      
        }
    }

    public function deleteOffer(){
        if(isset($_POST['deleteOffer'])){
            
            $id = $_POST['id'];

            $delet = new Offer();
            $result = $delet->delete($id);

            if($result === 'ok'){
                header('location:admin_management_offer.php');
            }else{
                echo $result;  
            }
        }
    }

    public function UpdateStore(){
        if(!isset($_POST['submit'])) return;
        $data = array(
            'offer_id' => $_POST['offer_id'],
            'quantity' => $_POST['quantity']
        );

        $edit = new Offer();
        $result = $edit->UpdateQuantity($data);
        if(!$result){
            echo $result;  
        }
        
    }

    public function getVoidOfferStorage(){
        $getVoidOffers = new Offer();
        $AllvoidOffers = $getVoidOffers->VoidOffers();
        return $AllvoidOffers;
    }

    public function getNotExpiredOffers(){
        $getVoidOffers = new Offer();
        $AllvoidOffers = $getVoidOffers->getNotExpiredOffers();
        return $AllvoidOffers;
    }    
    
}
?>