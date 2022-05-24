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
        );

        $result = Offer::AddOffer($data);
        if($result){
            header("location:admin_management_offer.php");
        }else{
            echo $result;   
        }
    }


    public function getAllOffers(){
        $Offers = Offer::getAll();
        return $Offers;
    }

    public function getOneOffer($id){
        $Offers = Offer::getOffer($id);
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
            'check_image' => $image
        );    

        $result = Offer::Update($data);

        if($result){
            header('location:admin_management_offer.php');
        }else{
            echo $result;      
        }
    }

    public function deleteOffer(){
        if(isset($_POST['deleteOffer'])){
            $id = $_POST['id'];
            $result = Offer::deleteOffer($id);
            if($result === 'ok'){
                header('location:admin_management_offer.php');
            }else{
                echo $result;  
            }
        }
    }
    
}
?>