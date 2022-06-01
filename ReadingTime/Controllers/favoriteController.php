<?php

require_once '../../model/favorite.php';

class FavoriteController{

    public function AddFavorieProduct(){
        
        if(!isset($_POST['submit_favorite'])) return;  

        $data = array(
            'book_id' => $_POST['book_id'],
            'user_id' => $_POST['user_id']
        );
        
        $add = new Favorite();
        $result = $add->AddFavorieProduct($data);

        if($result){
            header("location:Books.php");
        }else{
            echo $result;
        }
        
    }

    public function ExisteInFavorie(){
        if(!isset($_POST['submit_favorite'])) return;

            $user_id = $_POST['user_id'];
            $book_id = $_POST['book_id'];
            $existe = new Favorite();
            $result = $existe->existeInFavorie($user_id , $book_id);
       
        if(isset($result) and !empty($result)){
            return true;
        }else {
            return false;
        }
        
    }

    public function getFavorieProduct(){
        $getAll = new Favorite();
        $FavorieBook = $getAll->getAll();
        return $FavorieBook;
    }

    public function 
    deleteFavoriteProduct(){
        if(!isset($_POST['deletefromfavorite'])) return;

            $id = $_POST['favorie_id'];

            $delete = new Favorite();
            $result = $delete->deleteFavorieProduct($id);

            if($result === 'ok'){
                header("location:favorite.php");
            }else{
                echo $result;  
            }
    }
}
?>