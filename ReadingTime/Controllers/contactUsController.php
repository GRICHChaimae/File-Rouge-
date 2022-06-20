<?php

    require_once '../../model/contactUs.php';

    class contactUsController{

        public function sendMessage(){

            if(!isset($_POST['submit'])) return;

            $data = array(
                'email' =>$_POST['email'],
                'subject' =>$_POST['subject'],
                'message' =>$_POST['message'],
                'status' =>$_POST['status']
            );

            $contactUs = new ContactUs();
            $result = $contactUs->sendMessage($data);

            if($result){
                header("location:user_Messages.php");
            }else{
                echo $result;
            }

        }

        public function getAllContatcts(){
            $getAll = new ContactUs();
            $Messages = $getAll->getAll();
            return $Messages;
        }

        public function updateStatus(){
            if(!isset($_POST['status'])) return;
            
            $data = array(
                'status'=> $_POST['status'],
                'id'=> $_POST['id']
            );
    
                $edit = new ContactUs();
                $result = $edit ->updateStatus($data);
                if($result){
                    header('location:admin_Messages.php');
                }else{
                    echo $result;  
                }

        }

        public function deleteMessage(){
            if(!isset($_POST['deleteContact'])) return;

                $id = $_POST['id'];
    
                $delete = new ContactUs();
                $result = $delete->delete($id);
                
                if($result){
                    header('location:admin_Messages.php');
                }else{
                    echo $result;  
                }
        }
    }
?>