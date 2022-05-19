<?php

require_once '../../model/account.php';

class LoginController{
    public function LogIn(){
        session_start();
        if(isset($_POST['email'])){
            $data = array(
                'email'=>$_POST['email'],
                'mot_de_passe'=>$_POST['mot_de_passe']
            );
            $login = Account::LogIn($data);
            if($login == 'ok'){
                $_SESSION["loginError"] = null;
                header('Location:Home.php');
            }else{
                $_SESSION["loginError"] = $login;
            }
        }
    }

}
?>