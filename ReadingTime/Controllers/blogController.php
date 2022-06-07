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
        
        $add = new Blog();
        $result = $add->Add($data);
        if($result === 'ok'){
            header("location:admin_management_blog.php");
        }else{
            echo $result;
        }
       
    }


    public function getAllBlogs(){
        $getAll = new Blog();
        $Blogs = $getAll->getAll();
        return $Blogs ;
    }

    public function getOneBlog($id){
        $getOne = new Blog();
        $Blogs  = $getOne->getOne($id);
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

            $edit = new Blog();
            $result = $edit ->Update($data);
            if($result){
                header('location:admin_management_blog.php');
            }else{
                echo $result;  
            }
    }

    public function deleteBlog(){
        if(isset($_POST['deleteBlog'])){
            $id = $_POST['id'];

            $delete = new Blog();
            $result = $delete ->delete($id);
            
            if($result === 'ok'){
                header('location:admin_management_blog.php');
            }else{
                echo $result;  
            }
        }
    }

    public function getSixBlogs(){
        $limit = 6;

        $page_number = isset($_GET['page']) ? (int)$_GET['page']: 1;
        $page_number = $page_number < 1 ? 1:$page_number;
        $offset = ($page_number - 1) * $limit;
        $getSixBlogs = new Blog();
        return $getSixBlogs->getSixBlogs($limit , $offset);
        // return array_slice( $SixBlogs , -6);
    }
    
}
?>