<?php
require_once 'dataBase.php';

class Product{
    static public function AddProduct(){
        
        $image = $_FILES['image']['name'];
        $imgsrc= $_FILES['image']['tmp_name'];
        $folderLocation = "../images";
        $path="$folderLocation/".$image;
        move_uploaded_file($imgsrc,$path);

        $description = $_POST['description'];
        $prix = $_POST['prix'];
        $title = $_POST['titre'];
        $writer = $_POST['ecrivain'];

        $stmt = DB::connect()->prepare('INSERT INTO books (image_book,description_book,prix_book,book_title,book_writer) VALUES (:image_book,:description_book,:prix_book,:book_title,:book_writer)');

        $executed = $stmt->execute(["image_book"=> $path,"description_book"=> $description,"prix_book"=>$prix,"book_title"=>$title,"book_writer"=>$writer]);

        if($executed){
            return 'ok';
        }else{
            return 'error';
        }
        $stmt = null;
    }

    static public function deleteBook($id){
        $stmt = DB::connect()->prepare("DELETE from books where id = $id");
        $stmt->execute();
    }


    static public function getAll(){
        $stmt = DB::connect()->prepare('SELECT * FROM books');
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt = null;
    }

    static public function getBook($id){
        try{
            $stmt = DB::connect()->prepare("SELECT * FROM books WHERE id = $id");
            $stmt->execute();
            $post = $stmt->fetch(PDO::FETCH_ASSOC);
            return $post;

        }catch(PDOexception $ex)
        {
            echo 'erreur'.$ex->getMessage();
        }
    }

    static public function Update(){

        $title = $_POST['titre'];
        $picture = $_POST['picture'];
        $writer = $_POST['ecrivain'];
        $description = $_POST['description'];
        $prix = $_POST['prix'];
        $id = $_POST['id'];
        $image = $_FILES['image']['name'];
        $imgsrc= $_FILES['image']['tmp_name'];
        $folderLocation = "../images";
        $path ="$folderLocation/".$image;
        move_uploaded_file($imgsrc,$path);
    
        $stmt = DB::connect()->prepare('UPDATE books SET book_title = :book_title , description_book = :description_book , book_writer = :book_writer , image_book = :image_book , prix_book = :prix_book WHERE id = :id');
        if(isset($image) && !empty($image)){
            $executed = $stmt->execute(["id"=> $id ,"book_title"=> $title  ,"description_book"=> $description ,"book_writer"=> $writer ,"image_book"=> $path ,"prix_book"=> $prix]);
        }else{
            $executed = $stmt->execute(["id"=> $id ,"book_title"=> $title  ,"description_book"=> $description ,"book_writer"=> $writer ,"image_book"=> $picture ,"prix_book"=> $prix]);
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