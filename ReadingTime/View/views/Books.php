<?php 
if(!isset($_SESSION)){
  session_start();
}
if(!isset($_SESSION["userName"])){
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
    <link rel="stylesheet" href="../Style/books.css">
    <link rel="stylesheet" href="../Style/Home.css">
    <title>Books</title>
</head>

<?php 

require_once '../../Controllers/productController.php';
require_once '../../Controllers/pannelController.php';

$data = new ProductController();
$Books = $data->getAllProducts();

// $pannelData = new PannelController();
// $Pannels = $pannelData->getPannelProduct();

if(isset($_POST['submit'])){

    $existeInPannel = new PannelController();
    $existe = $existeInPannel->existeInPannel();

    if(!$existe){
          $pannelProduct = new PannelController();
        $pannelProduct->AddPannelProduct(); 
    }

}

?>

<body>

<div class="header">
            <nav>
                <div id="logo">
                    <a href="Home.php"><p>Reading</p><img src="../Images/logobrowny.png" alt="ReadingTime"></a>
                </div>

                <div id="menue-content">
                    <div class="centerMenu">
                        <ul>
                            <li><a href="Home.php">Home</a></li>
                            <li><a href="Books.php">Books</a></li>
                            <li><a href="Offers.php">Offers</a></li>
                            <li><a href="Blog.php">Blog</a></li>
                            <li><a href="WhyUs.php">Why Us</a></li>
                        </ul>
                    </div>
                    <div class="rightMenu">
                    <ul>
                        <li>
                            <a href="UserAccount.php">
                                Hello <?php echo $_SESSION["userName"] ?> 
                                <img src="../Images/arrow-down.png" alt="updown">
                            </a>
                        </li>
                        <li id="headerPannel">
                            <a href="Pannel.php">
                                <?php if(true): ?>
                                    <img src="../Images/headerPannel.png" alt="">
                                <?php else: ?>
                                    <img src="../Images/fullHeaderPannel.png" alt="">
                                <?php endif; ?>
                            </a>
                        </li>
                        <li>
                            <a href="Favorite.php">
                                <?php if(true): ?>
                                    <img src="../Images/headerFavorite.png" alt="">
                                <?php else: ?>
                                    <img src="../Images/FullHeaderFavorite.png" alt="">
                                <?php endif; ?>
                            </a>
                        </li>
                    </ul>
                    </div>
                </div>

                <div id="hamburger-icon" onclick="toggleMobileMenu(this)">
                    <div class="bar1"></div>
                    <div class="bar2"></div>
                    <div class="bar3"></div>
                    <ul class="mobile-menu">
                        <li><a href="Home.php">Home</a></li>
                        <li><a href="Blog.php">Blog</a></li>
                        <li><a href="WhyUs.php">Why Us</a></li>
                        <li><a href="Login.php">login</a></li>
                        <li><a href="SignUp.php">Register</a></li>
                    </ul>
                </div>
            </nav>

        <div class="header-content">
            <div class="text-content">
                <h1>Buy Books Now and Enjoy 
                    <br> 
                Reading Them</h1>
                <div class="tablette">
                    <div class="text-tablette">
                        <p id="Guarantee" >We <span>GUARANTEE</span> You'll Get Your Book</p>
                        <p>
                            you can create an account now to join to us to visit our library 
                            and to see our special offers or you can read our blogs about books 
                        </p>
                        <button onclick="window.location.href='/FileRouge/ReadingTime/View/views/SignUp.php'" >Register  Now</button>
                    </div>
                    <img src="../Images/home1.png" alt="" id="tablette-image">
                </div>
            </div>
            <img src="../Images/home1.png" alt="woman read a book" id="desktop-image">
        </div>
        
    </div>


    <?php foreach($Books as $Book): ?>

        <img src="<?php echo $Book['image_book']?>" alt="">
        <p><?php echo $Book['description_book'] ?></p>
        <p><?php echo $Book['prix_book'] ?></p>
        <p><?php echo $Book['id'] ?></p>

            <form action="" method="post" enctype="multipart/form-data">
                <input type="hidden" name="image" value="<?php echo $Book['image_book']?>">
                <input type="hidden" name="description" value="<?php echo $Book['description_book'] ?>">
                <input type="hidden" name="prix" value="<?php echo $Book['prix_book'] ?>">
                <input type="hidden" name="book_id" value="<?php echo $Book['id'] ?>">
                <input type="hidden" name="user_id" value="<?php echo $_SESSION["user_id"] ?>">
                <input type="hidden" name="notExiste" value="true">
                <button name="submit">        
                    <img id="pannel" src="../Images/pannel.png" alt="" >
                </button>
            </form>

    <?php endforeach;?>   

</body>
</html>