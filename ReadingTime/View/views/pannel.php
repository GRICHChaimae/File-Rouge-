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
    <link rel="stylesheet" href="../Style/pannel.css">
    <link rel="stylesheet" href="../Style/nav_bar.css">
    <title>Your pannel</title>
</head>

<?php

require_once '../../Controllers/pannelController.php';

$pannelController = new PannelController();

if(isset($_POST['deletefrompannel'])){
    $pannelController->deletePannelProduct();
}

$Pannels = $pannelController->getPannelProduct();

$_SESSION['pannel_number'] = count($Pannels);

?>

<body>

            <!-- header -->
    <?php require_once 'user_nav_bar.php'; ?>  

<h2 class="mypannel">My Pannel</h2>

<?php if(empty($Pannels)): ?>

<div class="nexistePas">
    <p>Your Pannel is empty</p>
    <h1>Let's Go To Add Some Books In Your Pannel</h1>
</div>
<?php else: ?>

<?php foreach($Pannels as $Pannel): ?>
    
<div class="searching_book">
    <div class="book_image">
        <img src="<?php echo $Pannel['image_book'] ?>" alt="">
    </div>    
    <div class="book_info">       
        <h2><?php echo $Pannel['book_title'] ?></h2>
        <p><span style="font-weight: bold;">written by:&nbsp</span><?php echo $Pannel['book_writer'] ?></p>
        <p><?php echo $Pannel['description_book'] ?></p>       
        <p><span style="font-weight: bold;">Price :&nbsp</span><?php echo $Pannel['prix_book'] ?> $</p>
        <form action="buy_book.php" method="post">
            <input type="numeber" name="book_id" value="<?php echo $Pannel['book_id'] ?>" hidden>
            <button name="buy_now" type="submit" ><span style="font-weight: bold;">Buy &nbsp Now</span></button>
        </form>
    </div>
    <div class="remove_book">
        <form action="" method="post">
            <input type = "hidden" name = "pannel_id" value = "<?php echo $Pannel['pannel_id']?>">
            <button type = "submit" name = "deletefrompannel">
                <img src="../Images/dop_book.png" alt="">
            </button>
        </form>
    </div>
</div>

<?php endforeach; ?>

<?php endif; ?>

        <!-- footer -->
        <?php require_once 'footer.php'; ?>


</body>
</html>