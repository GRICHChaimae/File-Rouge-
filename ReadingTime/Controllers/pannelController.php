<?php

require_once '../../model/pannel.php';

class PannelController{
    public function AddPannelProduct(){

        if(isset($_POST['submit'])){
            $result = Pannel::AddPannelProduct();
            if($result === 'ok'){
                header("location:Books.php");
            }else{
                echo $result;
            }
        }
    }

    public function getPannelProduct(){
        $PannelBook = Pannel::getAll();
        return $PannelBook;
    }

    public function deletePannelProduct(){
        if(isset($_POST['deletePannelProduct'])){
            $book_id = $_POST['book_id'];
            $result = Pannel::deletePannelProduct($book_id);
            if($result === 'ok'){
                header("location:Books.php");
            }else{
                echo $result;  
            }
        }
    }
}
?>