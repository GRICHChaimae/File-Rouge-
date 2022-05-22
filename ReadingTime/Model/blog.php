<?php
require_once 'dataBase.php';

class Blog{
    static public function AddBlog(){
        
        $image = $_FILES['image']['name'];
        $imgsrc= $_FILES['image']['tmp_name'];
        $folderLocation = "../images";
        $path="$folderLocation/".$image;
        move_uploaded_file($imgsrc,$path);

        $description = $_POST['description'];
        $text = $_POST['text_blog'];
        $title = $_POST['titre'];

        $stmt = DB::connect()->prepare('INSERT INTO blogs (blog_text,blog_image,blog_description,blog_title) VALUES (:blog_text,:blog_image,:blog_description,:blog_title)');

        $executed = $stmt->execute(["blog_text"=> $text,"blog_image"=> $path,"blog_description"=>$description,"blog_title"=>$title]);

        if($executed){
            return 'ok';
        }else{
            return 'error';
        }
        $stmt = null;
    }

    static public function deleteBlog($id){
        $stmt = DB::connect()->prepare("DELETE from blogs where id = $id");
        $stmt->execute();
    }


    static public function getAll(){
        $stmt = DB::connect()->prepare('SELECT * FROM blogs');
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt = null;
    }

    static public function getBlog($id){
        try{
            $stmt = DB::connect()->prepare("SELECT * FROM blogs WHERE id = $id");
            $stmt->execute();
            $blog = $stmt->fetch(PDO::FETCH_ASSOC);
            return $blog;

        }catch(PDOexception $ex)
        {
            echo 'erreur'.$ex->getMessage();
        }
    }

    static public function Update(){

        
        $image = $_FILES['image']['name'];
        $imgsrc= $_FILES['image']['tmp_name'];
        $folderLocation = "../images";
        $path="$folderLocation/".$image;
        move_uploaded_file($imgsrc,$path);

        $picture = $_POST['picture'];
        $id = $_POST['id'];
        $description = $_POST['description'];
        $text = $_POST['text_blog'];
        $title = $_POST['titre'];
    
        $stmt = DB::connect()->prepare('UPDATE blogs SET blog_title = :blog_title , blog_description = :blog_description , blog_image = :blog_image , blog_text = :blog_text WHERE id = :id');
        if(isset($image) && !empty($image)){
            $executed = $stmt->execute(["id"=> $id ,"blog_title"=> $title  ,"blog_description"=> $description ,"blog_image"=> $path ,"blog_text"=> $text]);
        }else{
            $executed = $stmt->execute(["id"=> $id ,"blog_title"=> $title  ,"blog_description"=> $description ,"blog_image"=> $picture ,"blog_text"=> $text]);
        }
        if($executed){
            return 'ok';
        }else{
            return 'error';
        }
        $stmt = null;
        }
}

?>