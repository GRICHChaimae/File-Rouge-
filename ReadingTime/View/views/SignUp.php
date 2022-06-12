<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Libre+Caslon+Text:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../Style/SignUp.css">
    <title>Register</title>
</head>

<?php
    require_once '../../Controllers/createAccountController.php' ;
    $notConfirmed = false;
    if(isset($_POST['submit'])){
        $newAccount = new CreateAccountController();
        $notConfirmed = !$newAccount->addAccount();
    }
?>

<body>
    <div id="logo">
        <a href="Home.php"><p>Reading</p><img src="../Images/logobrowny.png" alt="ReadingTime"></a>
    </div>
    <div class="form-border">
        <h1>Sign UP</h1>
        <form action="" method="post">
            <input type="text" placeholder="First Name" name="prenom">
            <input type="text" placeholder="Last Name" name="nom">
            <input type="email" placeholder="Email Adress" name="email">
            <input type="password" placeholder="Password" name="mot_de_passe">
            <?php if($notConfirmed): ?>
                <p class="text-danger">Confirmation password does not match</p>
            <?php endif; ?>
            <input type="password" placeholder="Confirm The Password" name="validation_mot_de_passe">
            <div class="checky">
                <input type="checkbox">
                <p> Add me to the email list for exclusive deals and promotions</p>
            </div>
            <input type="submit" placeholder="First Name" name="submit" value="Sign Up">
        </form>
        <p>Already have an account? <span>Sign In</span></p>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>