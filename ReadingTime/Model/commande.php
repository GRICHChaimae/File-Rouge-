<?php
require_once 'dataBase.php';

class Commande{
    public function Add($data){
        $stmt = DB::connect()->prepare('INSERT INTO commands (book_id,first_name,second_name,adress_1,adress_2,city,states,country,phone_number,zip_code,user_id,made,status) VALUES (:book_id,:first_name,:second_name,:adress_1,:adress_2,:city,:states,:country,:phone_number,:zip_code,:user_id,:made,:status)');
        $executed = $stmt->execute(["book_id"=> $data['book_id'],"first_name"=> $data['first_name'],"second_name"=> $data['second_name'],"adress_1"=> $data['adress_1'],"adress_2"=> $data['adress_2'],"city"=> $data['city'],"states"=> $data['states'],"country"=> $data['country'],"phone_number"=> $data['phone_number'],"zip_code"=> $data['zip_code'], "user_id"=> $data['user_id'] , "made"=> $data['made'] , "status"=> $data['status']]);
        return $executed;
        $stmt = null;
    }


    public function getAll(){

        $stmt = DB::connect()->prepare('SELECT * FROM `commands` inner join books on commands.book_id = books.id WHERE user_id = :user_id');
        $stmt->bindValue(':user_id', $_SESSION["user_id"]);
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt = null;
    }

    public function getShopListe(){
        $stmt = DB::connect()->prepare('SELECT * FROM `commands` inner join books on commands.book_id = books.id WHERE user_id = :user_id AND status = "in_shope_liste"');
        $stmt->bindValue(':user_id', $_SESSION["user_id"]);
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt = null;
    }

    public function updateStatus($id,$status){
        $stmt = DB::connect()->prepare('UPDATE commands SET status = :status WHERE command_id = :command_id');
        $executed = $stmt->execute(["status"=> $status,"command_id"=> $id]);
        return $executed;
        $stmt = null;
    }

}

?>