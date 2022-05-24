<?php

require_once '../../model/blog.php';

class BolgController{
    public function AddBlog(){

        if(!isset($_POST['submit'])) return;
     
        $image = $_FILES['image']['name'];
        $imgsrc= $_FILES['image']['tmp_name'];
        $folderLocation = "../images";
        $path= $folderLocation."/".$image;

        move_uploaded_file($imgsrc,$path);
        
        $data = array(
            'blog_image' => $path,
            'blog_description' => $_POST['description'],
            'blog_text' => $_POST['blog_text'],
            'blog_title' => $_POST['titre']
        );
        
        $result = Blog::AddBlog($data);
        if($result === 'ok'){
            header("location:admin_management_blog.php");
        }else{
            echo $result;
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
        if(!isset($_POST['submit'])) return;

        $image = $_FILES['image']['name'];
        $imgsrc= $_FILES['image']['tmp_name'];
        $folderLocation = "../images";
        $path = $folderLocation."/".$image;
        move_uploaded_file($imgsrc,$path);
        
        $data = array(
            'picture'=> $_POST['picture'],
            'id'=> $_POST['id'],
            'description' => $_POST['description'],
            'text' => $_POST['text_blog'],
            'title'=> $_POST['titre'],
            'image'=> $path,
            'check_image'=> $image
        );

            $result = Blog::Update($data);
            if($result){
                header('location:admin_management_blog.php');
            }else{
                echo $result;  
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