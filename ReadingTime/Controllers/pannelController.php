<?php

require_once '../../model/pannel.php';

class PannelController{
    public function AddPannelProduct(){

        if(!isset($_POST['submit'])) return;  
    
        $data = array(
            'book_id' => $_POST['book_id'],
            'user_id' => $_POST['user_id']
        );
        
        $add = new Pannel();
        $result = $add->AddPannelProduct($data);

        if($result){
            $_SESSION["pannel_number"]++;
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
        // $user_id = (isset($_SESSION["user_id"])) ? $_SESSION["user_id"] : 0;
        $getAll = new Pannel();
        $PannelBook = $getAll->getAll();
        return $PannelBook;
    }

    public function 
    deletePannelProduct(){
        if(!isset($_POST['deletefrompannel'])) return;

            $id = $_POST['pannel_id'];

            $delete = new Pannel();
            $result = $delete->deletePannelProduct($id);

            if($result === 'ok'){
                header("location:pannel.php");
            }else{
                echo $result;  
            }
    }
}
?>