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

        $stmt = DB::connect()->prepare('INSERT INTO books (image_book,description_book,prix_book) VALUES (:image_book,:description_book,:prix_book)');

        $executed = $stmt->execute(["image_book"=> $path,"description_book"=> $description,"prix_book"=>$prix]);

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
}

?>