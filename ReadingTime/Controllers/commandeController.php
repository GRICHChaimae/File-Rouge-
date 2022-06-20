<?php

require_once '../../model/commande.php';

class CommandeController{
    public function AddCommande(){

    if(!isset($_POST['submit'])) return;

        $data = array(
            'status'=>$_POST['status'],
            'book_id' => $_POST['book_id'],
            'first_name' => $_POST['first_name'],
            'second_name' => $_POST['second_name'],
            'adress_1' => $_POST['adress_1'],
            'adress_2' => $_POST['adress_2'],  
            'city' => $_POST['city'],
            'states' => $_POST['states'],
            'country' => $_POST['country'],
            'phone_number' => $_POST['phone_number'],
            'zip_code' => $_POST['zip_code'],
            'user_id' => $_POST['user_id'],
            'made' => $_POST['made']
        );

            $add = new Commande();
            $result = $add->Add($data);

            if(!$result){
                echo $result;
            }
    }

    public function getcommandes(){
        $getAll = new Commande();
        $commands = $getAll->getAll();
        return $commands;
    }

    public function getShopListe(){
        $getAll = new Commande();
        $commands = $getAll->getShopListe();
        return $commands;
    }

    public function updateStatus(){
        if(!isset($_POST['command_id'])) return;

            $id = $_POST['command_id'];
            $status = $_POST['status'];

            $delete = new Commande();
            $result = $delete->updateStatus($id,$status);
            
            if($result){
                header('location:shopingList.php');
            }else{
                echo $result;  
            }
    }   
}

?>