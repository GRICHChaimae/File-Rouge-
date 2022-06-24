<?php

require_once '../../model/gererCommande.php';

class GererCommandsController{

    public function getcommandes(){
        $getAll = new  GererCommande();
        $commands = $getAll->getAll();
        return $commands;
    }

    public function getmadecommandes(){
        $getAll = new  GererCommande();
        $commands = $getAll->getAllMades();
        return $commands;
    }


    public function UpdateMade(){
        if(!isset($_POST['submit'])) return;

        $data = array(
            'made' => $_POST['made'],
            'command_id' => $_POST['command_id']
        );    

        $edit = new GererCommande();
        $result = $edit->Update($data);

        if($result){
            header('location:admin_gerer_orders.php');
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

        $edit = new GererCommande();
        $result = $edit->Update($data);

        if($result){
            header('location:admin_gerer_Madeorders.php');
        }else{
            echo $result;      
        }
    }
  
}

?>