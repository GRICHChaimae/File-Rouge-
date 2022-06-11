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
    <link rel="stylesheet" href="../Style/nav_bar.css">
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

<header>
        <div id="logo">
            <a href="Home.php">
                <p>Reading</p><img src="../Images/logobrowny.png" alt="ReadingTime">
            </a>
        </div>

        <input type="checkbox" id="menu-bar">
        <label for="menu-bar" class="menu-bar-text"><img src="../Images/berger_menu.png" alt=""> </label>

        <nav class="navbary">
            <ul>
                <li><a href="Home.php">Home</a></li>
                <li><a href="Books.php">Books</a></li>
                <li><a href="Offers.php">Offers</a></li>
                <li><a href="Blog.php">Blog</a></li>
                <li><a href="WhyUs.php">Why Us</a></li>
                <li>
                    <a href="#">
                        Hello <?php echo $_SESSION["userName"] ?> +
                    </a>
                    <ul>
                        <li><a href="user_account.php">Account Informations</a></li>
                        <li><a href="shopingList.php">Your shopping list</a></li>
                        <li><a href="user_Messages.php">Your messages</a></li>
                        <li><a href="user_Messages_answered.php">Messages answered</a></li>
                        <li><a href="SignOut.php">Sign Out</a></li>
                    </ul>
                </li>
            </ul>

        </nav>

        <div class="right-nav">
            <ul>
                <li>
                    <a href="#">
                        Hello <?php echo $_SESSION["userName"] ?> +
                    </a>
                    <ul>
                    <li><a href="user_account.php">Account Informations</a></li>
                        <li><a href="shopingList.php">Your shopping list</a></li>
                        <li><a href="user_Messages.php">Your messages</a></li>
                        <li><a href="user_Messages_answered.php">Messages answered</a></li>
                        <li><a href="SignOut.php">Sign Out</a></li>
                    </ul>
                </li>
                <li id="headerPannel">
                <a href="Pannel.php">
                        <?php if(!$_SESSION['pannel_number']): ?>
                            <img src="../Images/headerPannel.png" alt="">
                            <p class="pannel_number">0</p> 
                            
                        <?php else: ?>
                            <img src="../Images/fullpannel_header.png" alt="" id="pannelIcone">
                        <?php if($_SESSION['pannel_number'] < 10): ?>
                        <p class="pannel_number"> <?= $_SESSION['pannel_number'] ; ?> </p> 
                        <?php else: ?>
                            <p class="pannel_number">+9</p>
                        <?php endif; ?>
                        <?php endif; ?>
                    </a>
                </li>
                <li id="headerFavorite">
                    <a href="Favorite.php">
                        <img src="../Images/headerFavorite.png" alt="">
                    </a>
                </li>
            </ul>
        </div>
</header>

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