<?php
    require_once '../../model/account.php';

    class CreateAccountController{
        public function addAccount(){
            if(!isset($_POST['submit'])) return;

            $data = array(
                'prenom' => $_POST['prenom'],
                'nom' => $_POST['nom'],
                'email' => $_POST['email'],
                'mot_de_passe' => password_hash($_POST['mot_de_passe'], PASSWORD_BCRYPT)
            );

            if($_POST['mot_de_passe'] != $_POST['validation_mot_de_passe']){
                return false; 
            }else $result = Account::addAccount($data);
            if($result){
                header("location:login.php");
            }else{
                echo $result; 
            } 
        }
    }
?>