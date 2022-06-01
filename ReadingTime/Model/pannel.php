<?php
require_once 'dataBase.php';

class Pannel{

    public function AddPannelProduct($data){
   
        $stmt = DB::connect()->prepare('INSERT INTO pannel (user_id,book_id) VALUES (:user_id,:book_id)');
        $executed = $stmt->execute(["user_id"=> $data['user_id'],"book_id" => $data['book_id']]);

        return $executed;

        $stmt = null;
    }

    public function existeInPannel($user_id , $book_id){
        $stmt = DB::connect()->prepare("SELECT * FROM pannel where book_id = $book_id and user_id = $user_id ");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getAll(){   
        $stmt = DB::connect()->prepare('SELECT * FROM `pannel` inner join books on pannel.book_id = books.id WHERE user_id = :user_id');
        // $stmt = DB::connect()->prepare('SELECT * FROM `pannel` inner join books on pannel.book_id = books.id');
        $stmt->bindValue(':user_id', $_SESSION["user_id"]);
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt = null;
    }

    public function deletePannelProduct($id){
        $stmt = DB::connect()->prepare("DELETE from pannel where pannel_id = $id");
        $stmt->execute();
    }
}

?>