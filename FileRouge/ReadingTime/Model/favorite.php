<?php
require_once 'dataBase.php';

class Favorite{

    public function AddFavorieProduct($data){
   
        $stmt = DB::connect()->prepare('INSERT INTO liste_favorie (user_id,book_id) VALUES (:user_id,:book_id)');
        $executed = $stmt->execute(["user_id"=> $data['user_id'],"book_id" => $data['book_id']]);

        return $executed;

        $stmt = null;
    }

    public function existeInFavorie($user_id , $book_id){
        $stmt = DB::connect()->prepare("SELECT * FROM liste_favorie where book_id = $book_id and user_id = $user_id");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getAll(){   
        $stmt = DB::connect()->prepare('SELECT * FROM `liste_favorie` inner join books on liste_favorie.book_id = books.id WHERE user_id = :user_id');
        $stmt->bindValue(':user_id', $_SESSION["user_id"]);
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt = null;
    }

    public function deleteFavorieProduct($id){
        $stmt = DB::connect()->prepare("DELETE from liste_favorie where favorie_id = $id");
        $stmt->execute();
    }
}

?>