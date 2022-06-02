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
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="../Style/nav_bar.css">
    <link rel="stylesheet" href="../Style/book.css">
    <title>Books</title>
</head>

<?php

require_once '../../Controllers/productController.php';
require_once '../../Controllers/pannelController.php';
require_once '../../Controllers/favoriteController.php';

$data = new ProductController();
$Books = $data->getAllProducts();

if (isset($_POST['submit'])) {

    $pannelController = new PannelController();
    $existe = $pannelController->existeInPannel();

    if (!$existe) {
        $pannelController->AddPannelProduct();
    }
}

if (isset($_POST['submit_favorite'])) {

    $favoriteController = new FavoriteController();
    $existe = $favoriteController->ExisteInFavorie();

    if (!$existe) {
        $favoriteController->AddFavorieProduct();
    }
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
        <div class="little_head"></div>
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

    <h2>Our Library</h2>

    <div class="card2" >

<?php 


    
?>

        <?php foreach ($Books as $Book) : ?>

                <div class="one-card">
                    <img src="<?php echo $Book['image_book'] ?>" alt="" id="our-library-image">
                    <h4><?php echo $Book['book_title'] ?></h4>

                    <div class="prix-pannel">
                    <p><span>Price : </span><?php echo $Book['prix_book'] ?> $</p>

                    <div class="icon-pannel-favorite">
                    <form action="" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="book_id" value="<?php echo $Book['id'] ?>">
                        <input type="hidden" name="user_id" value="<?php echo $_SESSION["user_id"] ?>">
                        <button name="submit">
                            <img id="pannel" src="../Images/pannel.png" alt="">
                            <img id="fullpannel" src="../Images/fullpannel.png" alt="">
                        </button>
                    </form>
                    <form action="" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="book_id" value="<?php echo $Book['id'] ?>">
                        <input type="hidden" name="user_id" value="<?php echo $_SESSION["user_id"] ?>">
                        <button name="submit_favorite">
                            <img id="favorite" src="../Images/favorite.png" alt="">
                            <img id="fullfavorite" src="../Images/fullfavorite.png" alt="">
                        </button>
                    </form>
                    </div>
                    </div>
                </div>
        <?php endforeach; ?>
    </div>

            <!-- footer -->
            <footer>
            <div class="menue-links">
                <p>USEFUL LINKS</p>
                <ul>
                    <li>
                        <a href="Home.php">Home</a>
                    </li>
                    <li>
                        <a href="Books.php">Books</a>
                    </li>
                    <li>
                        <a href="Offers.php">Offers</a>
                    </li>
                    <li>
                        <a href="Blog.php">Blog</a>
                    </li>
                    <li>
                        <a href="WhyUs.php">Why Us</a>
                    </li>
                    <li>
                        <a href="Login.php">Login</a>
                    </li>
                    <li>
                        <a href="SignUp.php">Register</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="privacy">
            <p>Terms and Conditions | Privacy | Cookie Statement</p>
            <p>Copyright © 2020 ReadingTime.  &nbsp All rights reserved.</p>
        </div>
        <div class="searshAndSocialMeadia">
            <div class="searchandText">
                <p>SUBSCRIBE TO OUR NEWSLETTER</p>
                <div class="search">
                    <input type="search">
                    <button>Sign Up</button>
                </div>
            </div>
            <div class="socialMedia">
                <ul>
                    <li>
                        <a href="https://www.instagram.com/?hl=fr">
                            <img src="../Images/insta.png" alt="instagram-icone">
                        </a>
                    </li>
                    <li>
                        <a href="https://fr-fr.facebook.com/">
                            <img src="../Images/fb.png" alt="facebook-icone">
                        </a>
                    </li>
                    <li>
                        <a href="https://twitter.com/?lang=fr">
                            <img src="../Images/twitter.png" alt="tiwitter-icone">
                        </a>
                    </li>
                    <li>
                        <a href="https://mail.google.com/">
                            <img src="../Images/email.png" alt="email.icone" class="mail">
                        </a>
                    </li>
                </ul>
            </div>
            <div class="privacy-responsive">
            <p>Terms and Conditions | Privacy | Cookie Statement</p>
            <p>Copyright © 2020 ReadingTime.  &nbsp All rights reserved.</p>
        </div>
        </div>    
        </footer>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <!-- <script>
        AOS.init();
    </script> -->
</body>

</html>