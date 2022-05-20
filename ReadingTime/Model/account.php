<?php
    require_once 'dataBase.php';

    class Account {
        static public function addAccount(){ 
            $prenom = $_POST['prenom'];
            $nom = $_POST['nom'];
            $email = $_POST['email'];
            $mot_de_passe = password_hash($_POST['mot_de_passe'], PASSWORD_BCRYPT);

            $statement = DB::connect()->prepare('INSERT INTO accounts (nom, prenom, email, mot_de_passe) VALUES (:nom, :prenom, :email, :mot_de_passe)');
            $executed = $statement->execute(["prenom"=> $prenom,"nom"=> $nom,"email"=> $email,"mot_de_passe"=> $mot_de_passe]);

            if($executed){
                return 'ok';
            }else{
                return 'error';
            }

            $statement = null;
        }

        static function LogIn($data){

            $response = DB::connect()->query("SELECT * FROM accounts WHERE email LIKE '".$data['email']."'");

            if($row=$response->fetch(PDO::FETCH_ASSOC)){

                if(password_verify($data['mot_de_passe'],$row['mot_de_passe'])){
                    $_SESSION["user_id"] = $row['id'];
                    $_SESSION["userName"] = $row['pernom'].' '.$row['nom'];
                    return 'ok';
                }else{
                    return "Password is not valid";
                }
            }else{
                return "No account with this email";
            }
        }
    }
?>