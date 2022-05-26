<?php

require_once '../../model/account.php';

class LoginController{
    public function LogIn(){
        
        session_start();

        if(!isset($_POST['email'])) return;

        $data = array(
            'email'=>$_POST['email'],
            'mot_de_passe'=>$_POST['mot_de_passe']
        );
        
        $loginIn = new Account();
        $login = $loginIn->LogIn($data);

        if(isset($login) && !empty($login)){
            if($login['email'] === 'admin@email.com'){
                if(password_verify($data['mot_de_passe'],$login['mot_de_passe'])){
                    $_SESSION["admin_id"] = $login['id'];
                        $_SESSION["loginError"] = null;
                        header('Location:admin_gerer_orders.php');
                    }else{
                    return $_SESSION["loginError"] = "Password is not valid";
                    }
                }else if(password_verify($data['mot_de_passe'],$login['mot_de_passe'])){

                    $_SESSION["user_id"] = $login['id'];
                    $_SESSION["userName"] = $login['pernom'].' '.$login['nom'];

                    $_SESSION["loginError"] = null;
                    header('Location:Home.php');
                   
                }else{
                    return $_SESSION["loginError"] = "Password is not valid";
                }
            }else{
                return $_SESSION["loginError"] = "No account with this email";
            }
    }

}
?>