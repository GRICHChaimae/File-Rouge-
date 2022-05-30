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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="../Style/nav_bar.css">
    <link rel="stylesheet" href="../Style/offer.css">
    <title>Offers</title>
</head>

<?php

require_once '../../Controllers/offerController.php';

    if(isset($_POST['submit'])){
        $offer = new OfferController();
        $offer->AddOffer();
    }

    if(isset($_POST['deleteOffer'])){
        $Offer= new OfferController();
        $Offer->deleteOffer();
    }

    $data = new OfferController();
    $Offers = $data->getAllOffers();

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

<div class="offer">

    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <?php foreach($Offers as $Offer): ?>  

    <div class="carousel-item active">
        <img src="<?php echo $Offer['image_offer']?>" alt="">
        <p><?php echo $Offer['title_offer'] ?></p>
        <p><?php echo $Offer['description_offer'] ?></p>              
        <p><?php echo $Offer['prix_offer'] ?></p>      
        <form action="buy_offer.php">
            <input type="int" name="offer_id" hidden>
            <button type="submit" name="submit">
                Buy Now
            </button>
    </form>
    </div>
    <?php endforeach; ?>    

  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden text-dark">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

    <!-- <img src="<?php echo $Offer['image_offer']?>" alt="">
    <p><?php echo $Offer['title_offer'] ?></p>
    <p><?php echo $Offer['description_offer'] ?></p>              
    <p><?php echo $Offer['prix_offer'] ?></p>      
    <form action="buy_offer.php">
        <input type="int" name="offer_id" hidden>
        <button type="submit" name="submit">
            Buy Now
        </button>
    </form> -->


</div>
  


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>