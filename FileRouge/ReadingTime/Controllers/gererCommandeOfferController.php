<?php

require_once '../../model/gererCommandeOffer.php';

class  GererCommandeOfferController{

    public function getcommandes(){
        $getAll = new  GererOfferCommande();
        $commands = $getAll->getAll();
        return $commands;
    }

    public function getmadeOffercommandes(){
        $getAll = new  GererOfferCommande();
        $commands = $getAll->getAllMades();
        return $commands;
    }


    public function UpdateMade(){
        if(!isset($_POST['submit'])) return;

        $data = array(
            'made' => $_POST['made'],
            'command_id' => $_POST['command_id']
        );    

        $edit = new GererOfferCommande();
        $result = $edit->Update($data);

        if($result){
            header('location:admin_gerer_offer_orders.php');
        }else{
            echo $result;      
        }
    }

    public function UpdateMadeTrue(){
        if(!isset($_POST['submit'])) return;

        $data = array(
            'made' => $_POST['made'],
            'command_id' => $_POST['command_id']
        );    

        $edit = new GererOfferCommande();
        $result = $edit->Update($data);

        if($result){
            header('location:admin_gerer_MadeOfferOrders.php');
        }else{
            echo $result;      
        }
    }
  
}

?>