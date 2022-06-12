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
    <link rel="stylesheet" href="../Style/product.css">
    <title>Book</title>
</head>

<?php

require_once '../../Controllers/productController.php';

if(isset($_POST['search_ISBN'])){
    $exitBook = new ProductController();
    $Book = $exitBook->getOneISBN($_POST['ISBN']);
}

?>

<body>

            <!-- header -->
    <?php require_once 'user_nav_bar.php'; ?>

<div class="header_content">
    <div class="image_title">
        <img src="../Images/headerSearch.png" alt="books">
        <h1 class="ser">Search for a book by ISBN</h1>
    </div>
    <form action="product.php" method="post">
        <div class="search">
            <input type="search" name="ISBN" placeholder=" &nbsp Enter ISBN Here">
            <button name="search_ISBN" type="submit" >Search</button>
        </div>
    </form>
</div>



<?php if(empty($Book)): ?>

    <div class="nexistePas">
        <p>This Book Does Not Exist</p>
        <h1>You Can Search For Another One</h1>
    </div>
    <?php else: ?>
    
    <div class="searching_book">
        <div class="book_image">
            <img src="<?php echo $Book['image_book'] ?>" alt="">
        </div>    
        <div class="book_info">
            <h2><?php echo $Book['book_title'] ?></h2>
            <p><span style="font-weight: bold;">written by:&nbsp</span><?php echo $Book['book_writer'] ?></p>
            <p><?php echo $Book['description_book'] ?></p>       
            <p><span style="font-weight: bold;">Prix :&nbsp</span><?php echo $Book['prix_book'] ?> $</p>
            <form action="buy_book.php" method="get">
                <input type="number" name="book_id" value="<?php echo $Book['id'] ?>" hidden>
                <button name="buy_now" type="submit" ><span style="font-weight: bold;">Buy &nbsp Now</span></button>
            </form>
        </div>
    </div>

<?php endif; ?>

        <!-- footer -->
        <?php require_once 'footer.php'; ?>

</body>
</html>