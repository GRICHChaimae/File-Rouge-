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
            'zip_code' => $_POST['zip_code']
        );

            $add = new Commande();
            $result = $add->Add($data);

            if($result){
                header("location:buy_book.php");
            }else{
                echo $result;
            }
        }
    
    public function getOneISBN($ISBN){
        $Book_ISBN = new product();
        $ISBN = $Book_ISBN->getOneISBN($ISBN);
        return $ISBN;
    }

    public function getAllProducts(){
        $getAll = new Product();
        $Posts = $getAll->getAll();
        return $Posts;
    }

    public function getOneBook($id){
        $getOne = new Product();
        $Book = $getOne->getOne($id);
        return $Book;
    }

    public function UpdateBook(){
        if(!isset($_POST['submit'])) return;


        $image = $_FILES['image']['name'];
        $imgsrc= $_FILES['image']['tmp_name'];
        $folderLocation = "../images";
        $path ="$folderLocation/".$image;
        move_uploaded_file($imgsrc,$path);

        $data = array(
            'title' => $_POST['titre'],
            'picture' => $_POST['picture'],
            'writer' => $_POST['ecrivain'],
            'description' => $_POST['description'],
            'prix' => $_POST['prix'],
            'id' => $_POST['id'],
            'path' => $path,
            'check_image' => $image 
        );

        $edit = new Product();
        $result = $edit->Update($data);
        if($result){
            header('location:admin_management_product.php');
        }else{
            echo $result;  
        }
        
    }

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