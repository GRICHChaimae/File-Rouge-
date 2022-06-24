<?php 
    if(!isset($_SESSION)){
        session_start();    
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Libre+Caslon+Text:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../Style/changePassword.css">
    <title>Home</title>
</head>

<?php

require_once '../../Controllers/createAccountController.php';

    $CreateAccountController = new CreateAccountController();

    if(isset($_POST['changePassword'])){
        $checkPassword = $CreateAccountController->changePassword();

        return $checkPassword;
    }

?>

<body>

            <!-- header -->
    <?php require_once 'user_nav_bar.php'; ?>

    <div class="page_content">
        <div class="side_bar">
            <ul>
                <li><a href="#">My Account</a></li>
                <li><a href="shopingList.php">Your shopping list</a></li>
                <li><a href="user_Messages.php">Contact Us</a></li>
                <li><a href="change_password.php" class="active_liste">Change your password</a></li>
                <li><a href="SignOut.php">Sign Out</a></li>
            </ul>
        </div>
        <div class="change_password">
            <form method="post">
                <label for="">Enter Your Old Password</label>
                <input type="password" name="mot_de_passe">
                <label for="">Enter The New Password</label>
                <input type="password" name="newPassword">
                <label for="">Confirme The New Password</label>
                <input type="password" name="ConfirmPassword"> 
                <input type="number" name="id" value="<?php echo $_SESSION["user_id"] ?>" hidden>
                <input type="submit" name="changePassword" value="submit" id="submit_change">  
                <input type="text" name="admin_user" value="user" hidden>                            
            </form>
            <?php if (isset($_SESSION['changePasswordError'])): ?>
                <p style="color: red; padding-left: 15px;"><?=  $_SESSION['changePasswordError'];?></p>
            <?php endif; ?>    
        </div>

    </div>

        <!-- footer -->
        <?php require_once 'footer.php'; ?>
        
        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <script>
            AOS.init();
        </script>
</body>
</html>