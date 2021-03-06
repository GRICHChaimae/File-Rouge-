<?php

require_once 'parentClass.php';
require_once 'dataBase.php';

class Blog extends ParentClass{

    public function add($data){
        
        $stmt = DB::connect()->prepare('INSERT INTO blogs(blog_text,blog_image,blog_description,blog_title) VALUES (:blog_text,:blog_image,:blog_description,:blog_title)');
        $executed = $stmt->execute(["blog_text"=> $data["blog_text"],"blog_image"=> $data["blog_image"],"blog_description"=> $data["blog_description"],"blog_title"=> $data["blog_title"]]);

        return $executed;

        $stmt = null;
    }

    public function getAll(){
        $stmt = DB::connect()->prepare('SELECT * FROM blogs');
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt = null;
    }

    public function getOne($id){
        try{
            $stmt = DB::connect()->prepare("SELECT * FROM blogs WHERE id = $id");
            $stmt->execute();
            $blog = $stmt->fetch(PDO::FETCH_ASSOC);
            return $blog;

        }catch(PDOexception $ex)
        {
            echo 'erreur'.$ex->getMessage();
        }
    }

    public function update($data){
    
        $stmt = DB::connect()->prepare('UPDATE blogs SET blog_title = :blog_title , blog_description = :blog_description , blog_image = :blog_image , blog_text = :blog_text WHERE id = :id');
        if(isset($data['check_image']) && !empty($data['check_image'])){
            $executed = $stmt->execute(["id"=> $data['id'] ,"blog_title"=> $data['title'] ,"blog_description"=> $data['description'],"blog_image"=> $data['image'] ,"blog_text"=> $data['text']]);
        }else{
            $executed = $stmt->execute(["id"=> $data['id'] ,"blog_title"=> $data['title'] ,"blog_description"=> $data['description'],"blog_image"=> $data['picture'] ,"blog_text"=> $data['text']]);
        }
        
        return $executed;

        $stmt = null;

    }

    public function delete($id){
        $stmt = DB::connect()->prepare("DELETE from blogs where id = $id");
        $stmt->execute();
    }

    public function getAllTendances(){
        $stmt = DB::connect()->prepare("SELECT * FROM blogs order by visits desc LIMIT 4");
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt = null;
    }

    public function checkVisites($id){
        $stmt = DB::connect()->prepare("SELECT user_id FROM visits WHERE blog_id = $id and user_id = :user_id");
        $stmt->execute(["user_id"=> $_SESSION["user_id"]]);
        return $stmt->fetchAll();
        $stmt = null;
    }
     
    public function updateVistes($id,$addVisite){
        $stmt = DB::connect()->prepare("UPDATE blogs SET visits = :visits WHERE id = :id");
        $executed = $stmt->execute(["id"=> $id ,"visits"=> $addVisite]);
        return $executed;
        $stmt = null;
    }

    public function addVisiste($id){
        $stmt = DB::connect()->prepare("INSERT INTO visits(user_id,blog_id) VALUES (:user_id,:blog_id)");
        $executed = $stmt->execute(["blog_id"=> $id ,"user_id"=> $_SESSION["user_id"]]);
        return $executed;
        $stmt = null;
    }
    
}

?>