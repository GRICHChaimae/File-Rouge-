<?php
    require_once '../../model/account.php';

    class CreateAccountController{
        public function addAccount(){
            if(isset($_POST['submit'])){
                if($_POST['mot_de_passe'] != $_POST['validation_mot_de_passe']){
                    return false;
                }else $result = Account::addAccount();
                if($result === 'ok'){
                    header("location:login.php");
                }else{
                   echo $result; 
                } 
            }
            return true;
        }
    }
?>