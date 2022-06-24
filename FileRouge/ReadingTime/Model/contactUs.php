<?php

    require_once 'dataBase.php';

    class ContactUs{
        public function sendMessage($data){
            $statement = DB::connect()->prepare('INSERT INTO contact_us (email, subject, message, status) VALUES (:email, :subject, :message, :status)');
            $executed = $statement->execute(["email"=> $data['email'],"subject"=> $data['subject'],"message"=> $data['message'],"status"=> $data['status']]);
            return $executed;
            $statement = null;
        }

        public function getAll(){
            $stmt = DB::connect()->prepare('SELECT * FROM contact_us');
            $stmt->execute();
            return $stmt->fetchAll();
            $stmt = null;
        }

        public function updateStatus($data){
            $stmt = DB::connect()->prepare('UPDATE contact_us SET status = :status WHERE id = :id');
            $executed = $stmt->execute(["id"=> $data['id'] ,"status"=> $data['status']]);
            return $executed;
            $stmt = null;
        }

        public function delete($id){
            $stmt = DB::connect()->prepare("DELETE from contact_us where id = $id");
            $stmt->execute();
        }
    }




?>