<?php
require_once 'dataBase.php';

class CommandeOffer{
    public function Add($data){

        $stmt = DB::connect()->prepare('INSERT INTO commandoffer (offer_id,first_name,second_name,adress_1,adress_2,city,states,country,phone_number,zip_code,user_id,made) VALUES (:offer_id,:first_name,:second_name,:adress_1,:adress_2,:city,:states,:country,:phone_number,:zip_code,:user_id,:made)');

        $executed = $stmt->execute(["offer_id"=> $data['offer_id'],"first_name"=> $data['first_name'],"second_name"=> $data['second_name'],"adress_1"=> $data['adress_1'],"adress_2"=> $data['adress_2'],"city"=> $data['city'],"states"=> $data['states'],"country"=> $data['country'],"phone_number"=> $data['phone_number'],"zip_code"=> $data['zip_code'], "user_id"=> $data['user_id'] , "made"=> $data['made']]);

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

    // public function delete($id){
    //     $stmt = DB::connect()->prepare("DELETE from commands where command_id = $id");
    //     $stmt->execute();
    // }

}

?>