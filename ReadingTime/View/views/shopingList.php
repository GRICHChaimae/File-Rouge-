<?php 
    if(!isset($_SESSION)){
        session_start();
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
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../Style/nav_bar.css">
    <link rel="stylesheet" href="../Style/shopingList.css">
    <title>Home</title>
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

<?php if(isset($_SESSION["userName"])):?>
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
    <?php else: ?>
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
                <li><a href="Blog.php">Blog</a></li>
                <li><a href="WhyUs.php">Why Us</a></li>
                <li><a href="login.php">Login</a></li>
                <li><a href="SignUp.php">Register</a></li>
            </ul>

        </nav>

        <div class="right-nav">
            <ul>
                <li><a href="login.php">Login</a></li>
                <li>/</li>
                <li><a href="SignUp.php">Register</a></li>
            </ul>
        </div>
    </header>

    <?php endif; ?>  

    <div class="page_content">
        <div class="side_bar">
            <ul>
                <li><a href="#">My Account</a></li>
                <li><a href="user_account.php">Account Informations</a></li>
                <li><a href="shopingList.php" class="active_liste">Your shopping list</a></li>
                <li><a href="user_Messages.php">Your messages</a></li>
                <li><a href="user_Messages_answered.php">Messages answered</a></li>
                <li><a href="SignOut.php">Sign Out</a></li>
            </ul>
        </div>
        
        <div id="Your_shopping_list">

            <p>Your Shopping List</p>

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

        </div>



    </div>


        <!-- footer -->

        
        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <script>
            AOS.init();
        </script>
</body>
</html>