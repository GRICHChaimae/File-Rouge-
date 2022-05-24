<?php

require_once '../../model/product.php';

class ProductController{
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
            'path' => $path
        );

        {
            $result = Product::AddProduct($data);
            if($result){
                header("location:admin_management_product.php");
            }else{
                echo $result;
            }
        }
    }


    public function getAllProducts(){
        $Posts = Product::getAll();
        return $Posts;
    }

    public function getOneBook($id){
        $Book = Product::getBook($id);
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

        $result = Product::Update($data);
        if($result){
            header('location:admin_management_product.php');
        }else{
            echo $result;  
        }
        
    }

    public function deleteProduct(){
        if(isset($_POST['deleteProduct'])){
            $id = $_POST['id'];
            $result = Product::deleteBook($id);
            if($result === 'ok'){
                header('location:admin_management_product.php');
            }else{
                echo $result;  
            }
        }
    }
    
}
?>