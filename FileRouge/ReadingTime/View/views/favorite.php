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
    <title>Your pannel</title>
</head>

<?php

require_once '../../Controllers/favoriteController.php';

$favoriteController = new FavoriteController();

if(isset($_POST['deletefromfavorite'])){
    $favoriteController->deleteFavoriteProduct();
}

$Favorites = $favoriteController->getFavorieProduct();

?>

<body>
    
            <!-- header -->
    <?php require_once 'user_nav_bar.php'; ?>

<h2 class="mypannel">My Favorites</h2>

<?php if(empty($Favorites)): ?>

<div class="nexistePas">
    <p>Your Wishlist is empty</p>
    <h1>Let's Go To Add Some Books In Your Wishlist</h1>
</div>
<?php else: ?>

<?php foreach($Favorites as $Favorite): ?>
    
<div class="searching_book">
    <div class="book_image">
        <img src="<?php echo $Favorite['image_book'] ?>" alt="">
    </div>    
    <div class="book_info">       
        <h2><?php echo $Favorite['book_title'] ?></h2>
        <p><span style="font-weight: bold;">written by:&nbsp</span><?php echo $Favorite['book_writer'] ?></p>
        <p><?php echo $Favorite['description_book'] ?></p>       
        <p><span style="font-weight: bold;">Price :&nbsp</span><?php echo $Favorite['prix_book'] ?> $</p>
        <form action="buy_book.php" method="post">
            <input type="numeber" name="book_id" value="<?php echo $Favorite['book_id'] ?>" hidden>
            <button name="buy_now" type="submit" ><span style="font-weight: bold;">Buy &nbsp Now</span></button>
        </form>
    </div>
    <div class="remove_book">
        <form action="" method="post">
            <input type = "hidden" name = "favorie_id" value = "<?php echo $Favorite['favorie_id']?>">
            <button type = "submit" name = "deletefromfavorite">
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