<?php
require_once 'dataBase.php';

class Commande{
    public function Add($data){

        $stmt = DB::connect()->prepare('INSERT INTO commands (book_id,first_name,second_name,adress_1,adress_2,city,states,country,phone_number,zip_code,user_id) VALUES (:book_id,:first_name,:second_name,:adress_1,:adress_2,:city,:states,:country,:phone_number,:zip_code,:user_id)');

        $executed = $stmt->execute(["book_id"=> $data['book_id'],"first_name"=> $data['first_name'],"second_name"=> $data['second_name'],"adress_1"=> $data['adress_1'],"adress_2"=> $data['adress_2'],"city"=> $data['city'],"states"=> $data['states'],"country"=> $data['country'],"phone_number"=> $data['phone_number'],"zip_code"=> $data['zip_code'], "user_id"=> $data['user_id']]);

        return $executed;

        $stmt = null;
    }

    public function getOneISBN($ISBN){
        try{
            $stmt = DB::connect()->prepare("SELECT * FROM books WHERE ISBN = $ISBN");
            $stmt->execute();
            $post = $stmt->fetch(PDO::FETCH_ASSOC);
            return $post;

        }catch(PDOexception $ex)
        {
            echo 'erreur'.$ex->getMessage();
        }  
    }

    public function delete($id){
        $stmt = DB::connect()->prepare("DELETE from books where id = $id");
        $stmt->execute();
    }


    public function getAll(){
        $stmt = DB::connect()->prepare('SELECT * FROM books');
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt = null;
    }

    public function getOne($id){
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

    public function Update($data){
    
        $stmt = DB::connect()->prepare('UPDATE books SET book_title = :book_title , description_book = :description_book , book_writer = :book_writer , image_book = :image_book , prix_book = :prix_book WHERE id = :id');
        if(isset($data['check_image']) && !empty($data['check_image'])){
            $executed = $stmt->execute(["id"=> $data['id'] ,"book_title"=> $data['title']  ,"description_book"=> $data['description'] ,"book_writer"=> $data['writer'] ,"image_book"=> $data['path'] ,"prix_book"=> $data['prix']]);
        }else{
            $executed = $stmt->execute(["id"=> $data['id'] ,"book_title"=> $data['title']  ,"description_book"=> $data['description'] ,"book_writer"=> $data['writer'] ,"image_book"=> $data['picture'] ,"prix_book"=> $data['prix']]);
        }
        
        return $executed ;
      
        $stmt = null;
    }
}

?>