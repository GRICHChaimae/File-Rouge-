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

    static public function UpdateExistePannel(){
        $id = $_POST['book_id'];
        $ExisteInPannel = $_POST['notExiste'];
    
    
        $stmt = DB::connect()->prepare('UPDATE books SET exisitPannel = :exisitPannel WHERE id = :id');
        $executed = $stmt->execute(["id"=> $id ,"exisitPannel"=> $ExisteInPannel]);


        if($executed){
            return 'ok';
        }else{
            return 'error';
        }
        $stmt = null;

    }
}

?>