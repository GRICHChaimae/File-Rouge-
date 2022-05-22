<?php

require_once '../../model/blog.php';

class BolgController{
    public function AddBlog(){

        if(isset($_POST['submit'])){
            $result = Blog::AddBlog();
            if($result === 'ok'){
                header("location:admin_management_blog.php");
            }else{
                echo $result;
            }
        }
    }


    public function getAllBlogs(){
        $Blogs = Blog::getAll();
        return $Blogs ;
    }

    public function getOneBlog($id){
        $Blogs  = Blog::getBlog($id);
        return $Blogs;
    }

    public function UpdateBlog(){
        if(isset($_POST['submit'])){
            $result = Blog::Update();
            if($result === 'ok'){
                header('location:admin_management_blog.php');
            }else{
                echo $result;  
            }
        }
    }

    public function deleteBlog(){
        if(isset($_POST['deleteBlog'])){
            $id = $_POST['id'];
            $result = Blog::deleteBlog($id);
            if($result === 'ok'){
                header('location:admin_management_blog.php');
            }else{
                echo $result;  
            }
        }
    }
    
}
?>