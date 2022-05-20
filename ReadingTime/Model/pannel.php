<?php
require_once 'dataBase.php';

class Pannel{
    static public function AddPannelProduct(){
        // session_start();
        
        $book_id = $_POST['book_id'];
        $testing = $_POST['image'];
        $user_id = $_POST['user_id'];
        $image = $_FILES['image']['name'];
        $imgsrc= $_FILES['image']['tmp_name'];
        $folderLocation = "../images";
        $path="$folderLocation/".$testing;
        move_uploaded_file($imgsrc,$path);

        var_dump($image);

        $description = $_POST['description'];
        $prix = $_POST['prix'];

        $stmt = DB::connect()->prepare('INSERT INTO pannel (user_id,image,description,prix,book_id) VALUES (:user_id,:image,:description,:prix,:book_id)');

        $executed = $stmt->execute(["user_id"=> $user_id,"image"=> $testing,"description"=> $description,"prix"=>$prix,"book_id"=>$book_id]);


        // $stmt->bindValue(':image_book', $image);
        // $stmt->bindValue(':description_book', $description);
        // $stmt->bindValue(':prix_book', $prix);
        // $executed = $stmt->execute();

        if($executed){
            return 'ok';
        }else{
            return 'error';
        }
        $stmt = null;
    }

    static public function getAll(){
        $stmt = DB::connect()->prepare('SELECT * FROM pannel');
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt = null;
    }

    static public function deletePannelProduct($book_id){
        $stmt = DB::connect()->prepare("DELETE from pannel where book_id = $book_id");
        $stmt->execute();
    }


    // static public function getAll(){

    //     $stmt = DB::connect()->prepare('SELECT * FROM books');
    //     $stmt->execute();
    //     return $stmt->fetchAll();
    //     $stmt = null;
    // }
}

?>