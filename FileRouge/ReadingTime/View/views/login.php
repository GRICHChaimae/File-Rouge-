<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Libre+Caslon+Text:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="../Style/SignUp.css">
    <title>Sign in</title>
</head>

<?php
    require_once '../../Controllers/loginController.php';

    if(isset($_POST['submit'])){
        $logIn = new LoginController();
        $logIn->LogIn();
    }
?>

<body>
    <div id="logo">
        <a href="Home.php"><p>Reading</p><img src="../Images/logobrowny.png" alt="ReadingTime"></a>
    </div>
    <div class="form-border">
        <h2 id="sign_in_title">Sign In</h2>
        <form action="" method="post" class="login_form">
            <input type="email" placeholder="  Email Adress" name="email" required>
            <input type="password" placeholder="  Passowrd" name="mot_de_passe" required>
                <?php if (isset($_SESSION["loginError"])): ?>
                    <p class="text-danger text-center"><?= $_SESSION["loginError"]; ?></p>  
                <?php endif; ?>
            <input type="submit" name="submit" value="Sign Up" id="sign_in">
        </form>
        <p>Already have an account ? <a href="SignUp.php" style="color: #855342;">Sign In</a></p>
        <p class="text-white text-center">
        <?php
            if (isset($_SESSION["loginError"]))
            {
                echo $_SESSION["loginError"];
            }
        ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>