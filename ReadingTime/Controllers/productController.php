<?php

require_once '../../model/product.php';

class ProductController{
    public function AddProduct(){

        if(isset($_POST['submit'])){
            $result = Product::AddProduct();
            if($result === 'ok'){
                header("location:admin_management_product.php");
            }else{
                echo $result;
            }
        }
    }


    public function deletePost(){
        if(isset($_POST['deletePost'])){
            $id = $_POST['id'];
            $result = Product::deleteBook($id);
            if($result === 'ok'){
                header('location:admin_management_product.php');
            }else{
                echo $result;  
            }
        }
    }

    public function getAllProducts(){
        $Posts = Product::getAll();
        return $Posts;
    }
}
?>