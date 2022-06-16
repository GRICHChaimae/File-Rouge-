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


            
            if($_POST['mot_de_passe'] !== $_POST['validation_mot_de_passe']){
                return "The Password is not valid"; 
            }else{
                try{
                    $add = new Account();
                    $add->addAccount($data);
                    header('location:login.php');
                }catch(PDOException $e){
                    if(str_contains($e->getMessage(),"Duplicate")){
                        return  "An account with this email already exists";
                    }else{
                        die($e->getMessage());
                    }
                }
            } 
        }

        public function changePassword(){
            if(!isset($_POST['changePassword'])) return;

            $data = array(
                'mot_de_passe' => $_POST['mot_de_passe'],
                'newPassword' => $_POST['newPassword'],
                'ConfirmPassword' => $_POST['ConfirmPassword'],
                'id' => $_POST['id']
            );

            $changepassword = new Account();
            $checkOldPassword = $changepassword->checkPassword($data);
            
            if(password_verify($data['mot_de_passe'],$checkOldPassword['mot_de_passe'])){
                if($data['newPassword'] == $data['ConfirmPassword']){
                    $newPassword = password_hash($data['newPassword'], PASSWORD_BCRYPT);
                    $result = $changepassword->updatePasword($newPassword, $data);
                    if($result){
                        echo "Your Password is change Succefuly";
                        header('Location:user_account.php');
                    }else{
                        echo $result;
                    }
                }else{
                    header('Location:user_account.php');

                    return $_SESSION['changePasswordError'] = "New Password is not valid";
                }
            }else{
                header('Location:user_account.php');

                return $_SESSION['changePasswordError'] = "The Old password is incorrect";

            } 
        }
    }
?>