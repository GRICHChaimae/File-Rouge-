<?php

require_once '../../model/offer.php';

class OfferController{
    public function AddOffer(){

        if(isset($_POST['submit'])){
            $result = Offer::AddOffer();
            if($result === 'ok'){
                header("location:admin_management_offer.php");
            }else{
                echo $result;
            }
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
        if(isset($_POST['submit'])){
            $result = Offer::Update();
            if($result === 'ok'){
                header('location:admin_management_offer.php');
            }else{
                echo $result;  
            }
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