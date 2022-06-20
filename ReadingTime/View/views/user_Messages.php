<?php
if (!isset($_SESSION)) {
    session_start();
}
if (!isset($_SESSION["userName"])) {
    header("location: ./login.php");
    return;
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../Style/contactUs.css">
    <title>Contact Us</title>
</head>

<?php

    require_once '../../Controllers/contactUsController.php';

    if(isset($_POST['submit'])){
        $contactUsController = new ContactUsController();
        $contactUsController->sendMessage();
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
            <li><a href="user_change_password.php"  class="active_liste">Change your password</a></li>
            <li><a href="SignOut.php">Sign Out</a></li>
        </ul>
    </div>
    <div class="contact_form">
        <form action="" method="post">
            <label>Your email</label>
            <input type="email" name="email">
            <label>Subject</label>
            <textarea name="subject" id="" cols="40" rows="2"></textarea>
            <label>Message</label>
            <textarea name="message" id="" cols="40" rows="10"></textarea>
            <input type="submit" name="submit" id="send">
            <input type="text" name="status" value="not_done" hidden>
        </form>
    </div>

</div>

        <!-- footer -->
    <?php require_once 'footer.php'; ?>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html>