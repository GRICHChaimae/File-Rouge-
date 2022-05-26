<?php
require_once 'dataBase.php';

class Product{
    static public function AddProduct($data){

        $stmt = DB::connect()->prepare('INSERT INTO books (image_book,description_book,prix_book,book_title,book_writer,ISBN) VALUES (:image_book,:description_book,:prix_book,:book_title,:book_writer,:ISBN)');

        $executed = $stmt->execute(["image_book"=> $data['path'],"description_book"=> $data['description'],"prix_book"=> $data['prix'],"book_title"=> $data['title'],"book_writer"=> $data['writer'],"ISBN"=> $data['ISBN']]);

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

    static public function Update($data){
    
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