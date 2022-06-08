<?php

require_once '../../model/product.php';

class ProductController {
    public function AddProduct(){

    if(!isset($_POST['submit'])) return;

        $image = $_FILES['image']['name'];
        $imgsrc= $_FILES['image']['tmp_name'];
        $folderLocation = "../images";
        $path = $folderLocation."/".$image;
        move_uploaded_file($imgsrc,$path);


        $data = array(
            'description' => $_POST['description'],
            'prix' => $_POST['prix'],
            'title' => $_POST['titre'],
            'writer' => $_POST['ecrivain'],  
            'path' => $path,
            'ISBN' => $_POST['ISBN'],
            'quantity' => $_POST['quantity']
        );
            $add = new Product();
            $result = $add->Add($data);

            if($result){
                header("location:admin_management_product.php");
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
            'check_image' => $image,
            'quantity' => $_POST['quantity']
        );

        $edit = new Product();
        $result = $edit->Update($data);
        if($result){
            header('location:admin_management_product.php');
        }else{
            echo $result;  
        }
        
    }

    public function UpdateStore(){
        if(!isset($_POST['submit'])) return;

        $data = array(
            'id' => $_POST['id'],
            'quantity' => $_POST['quantity']
        );

        $edit = new Product();
        $result = $edit->UpdateQuantity($data);
        if(!$result){
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