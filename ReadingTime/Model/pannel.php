<?php
require_once 'dataBase.php';

class Pannel{
    static public function AddPannelProduct($data){
   
        $stmt = DB::connect()->prepare('INSERT INTO pannel (user_id,image,description,prix,book_id) VALUES (:user_id,:image,:description,:prix,:book_id)');
        $executed = $stmt->execute(["user_id"=> $data['user_id'],"image"=> $data['image'] ,"description"=> $data['description'],"prix"=>$data['prix'],"book_id" => $data['book_id']]);

        return $executed;

        $stmt = null;
    }

    static public function existeInPannel($user_id , $book_id){
        $stmt = DB::connect()->prepare("SELECT * FROM pannel where book_id = $book_id and user_id = $user_id ");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    static public function getAll(){
        $stmt = DB::connect()->prepare('SELECT * FROM pannel');
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt = null;
    }

    static public function deletePannelProduct($id){
        $stmt = DB::connect()->prepare("DELETE from pannel where id = $id");
        $stmt->execute();
    }

}

?>