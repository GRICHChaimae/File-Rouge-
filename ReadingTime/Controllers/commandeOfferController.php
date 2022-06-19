<?php

require_once '../../model/commandeOffer.php';

class CommandeOfferController{
    public function AddCommande(){

    if(!isset($_POST['submit'])) return;

        $data = array(
            'offer_id' => $_POST['offer_id'],
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

            $add = new CommandeOffer();
            $result = $add->Add($data);

            if(!$result){
                echo $result;
            }
    }

    public function getcommandes(){
        $getAll = new CommandeOffer();
        $commands = $getAll->getAll();
        return $commands;
    }

    // public function deleteCommande(){
    //     if(!isset($_POST['command_id'])) return;

    //         $id = $_POST['command_id'];

    //         $delete = new CommandeOffer();
    //         $result = $delete->delete($id);
            
    //         if($result === 'ok'){
    //             header('location:shopingList.php');
    //         }else{
    //             echo $result;  
    //         }
    // }   
}

?>