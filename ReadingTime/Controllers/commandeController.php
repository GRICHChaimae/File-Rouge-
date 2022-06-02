<?php

require_once '../../model/commande.php';

class CommandeController{
    public function AddCommande(){

    if(!isset($_POST['submit'])) return;

        $data = array(
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
            'user_id' => $_POST['user_id']
        );

            $add = new Commande();
            $result = $add->Add($data);

            // if($result){
            //     header("location:buy_book.php");
            // }else{
            //     echo $result;
            // }
            
        }
    
    // public function getOneISBN($ISBN){
    //     $Book_ISBN = new product();
    //     $ISBN = $Book_ISBN->getOneISBN($ISBN);
    //     return $ISBN;
    // }

    public function getAllProducts(){
        $getAll = new Product();
        $Posts = $getAll->getAll();
        return $Posts;
    }

    // public function getOneBook($id){
    //     $getOne = new Product();
    //     $Book = $getOne->getOne($id);
    //     return $Book;
    // }

    public function deleteProduct(){
        if(isset($_POST['deleteProduct'])){

            $id = $_POST['id'];

            $delete = new Product();
            $result = $delete->delete($id);
            
            if($result === 'ok'){
                header('location:admin_management_product.php');
            }else{
                echo $result;  
            }
        }
    }   
}

?>