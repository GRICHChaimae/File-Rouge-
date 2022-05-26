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
    <link rel="stylesheet" href="../Style/buy_book.css">
    <title>Document</title>
</head>

<?php 
require_once '../../Controllers/productController.php';

if(isset($_POST['book_id'])){
  $exitBook = new ProductController();
  $Book = $exitBook->getOneBook($_POST['book_id']);
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
                        <li><a href="admin_Sign_Out.php">Sign Out</a></li>
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
                        <li><a href="admin_Sign_Out.php">Sign Out</a></li>
                    </ul>
                </li>
                <li id="headerPannel">
                    <a href="Pannel.php">
                        <img src="../Images/headerPannel.png" alt="">
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

<div class="searching_book">
        <div class="book_image">
            <img src="<?php echo $Book['image_book'] ?>" alt="">
        </div>    
        <div class="book_info">
            <h2><?php echo $Book['book_title'] ?></h2>
            <p><span style="font-weight: bold;">written by:&nbsp</span><?php echo $Book['book_writer'] ?></p>
            <p><?php echo $Book['description_book'] ?></p>       
            <p><span style="font-weight: bold;">Prix :&nbsp</span><?php echo $Book['prix_book'] ?> $</p>
        </div>
</div>

<h2>Checkout</h2>

<div class="pay_form">
  <div class="ship_adress">
    <h4>Ship To Address</h4>
    <hr>
    <!-- hnaaaaaaa lfoooooorm  -->
    <!-- hnaaaaaaa lfoooooorm  -->
    <!-- hnaaaaaaa lfoooooorm  -->
    <!-- hnaaaaaaa lfoooooorm  -->
    <!-- hnaaaaaaa lfoooooorm  -->

    <form action="" method="post">
     <div>
        <h1>Ajouter un patient</h1>

    <div class="first_row">
        <div class="div1">
            <p>Last Name</p>
            <input type="text">
        </div>
        <div class="div2">
            <p>Last Name</p>
            <input type="text">
        </div>
    </div>

    <div class="second_row">
        <div class="div1">
            <p>Address 1</p>
            <input type="text">
        </div>
        <div class="div2">
            <p>Address 2</p>
            <input type="text">
        </div>
    </div>

    <div class="third_row">
        <div class="div1">
            <p>City</p>
            <input type="text">
        </div>
        <div class="div2">
            <p>State</p>
            <input type="text">
        </div>
    </div>

    <div class="third_row">
        <div class="div1">
            <p>Country</p>
            <input type="text">
        </div>
        <div class="div2">
            <p>Phone Number</p>
            <input type="text">
        </div>
    </div>

    <div class="div1">
        <p>Zip Code (5 Digits)</p>
        <input type="text">
    </div>

    <button type="submit" value="submit">Confirm</button>

    </div>
    </form>
  </div>
</div>

    
</body>
</html>