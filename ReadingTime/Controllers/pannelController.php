<?php

require_once '../../model/pannel.php';

class PannelController{
    public function AddPannelProduct(){

        if(!isset($_POST['submit'])) return;  
    
        $data = array(
            'description' => $_POST['description'],
            'prix' => $_POST['prix'],
            'book_id' => $_POST['book_id'],
            'image' => $_POST['image'],
            'user_id' => $_POST['user_id']
        );
        
        $add = new Pannel();
        $result = $add->AddPannelProduct($data);

        if($result){
            header("location:Books.php");
        }else{
            echo $result;
        }
        
    }

    public function existeInPannel(){
        if(!isset($_POST['submit'])) return;

            $user_id = $_POST['user_id'];
            $book_id = $_POST['book_id'];
            $existe = new Pannel();
            $result = $existe->existeInPannel($user_id , $book_id);
       
        if(isset($result) and !empty($result)){
            return true;
        }else {
            return false;
        }
        
    }

    public function getPannelProduct(){

        $getAll = new Pannel();
        $PannelBook = $getAll->getAll();
        return $PannelBook;
    }

    public function deletePannelProduct(){
        if(isset($_POST['deletePannelProduct'])){
            $id = $_POST['id'];

            $delete = new Pannel();
            $result = $delete->deletePannelProduct($id);

            if($result === 'ok'){
                header("location:Books.php");
            }else{
                echo $result;  
            }
        }
    }
}
?>