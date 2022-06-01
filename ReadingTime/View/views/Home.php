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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <?php if(isset($_SESSION["userName"])):?>
        <link rel="stylesheet" href="../Style/nav_bar.css">
    <?php else: ?>
        <link rel="stylesheet" href="../Style/home_bar.css">
    <?php endif; ?>  
    <link rel="stylesheet" href="../Style/Home.css">
    <title>Home</title>
</head>

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

    <div class="header-bg-color">
        <div id="header-bg">
            <div class="header-content">
                <div class="text-content">
                    <h1>Buy Books Now and Enjoy
                        <br>
                        Reading Them
                    </h1>
                    <div class="tablette">
                        <div class="text-tablette">
                            <p id="Guarantee">We <span>GUARANTEE</span> You'll Get Your Book</p>
                            <p>
                                you can create an account now to join to us to visit our library
                                and to see our special offers or you can read our blogs about books
                            </p>

                        <?php if(isset($_SESSION["userName"])):?>
                            <form action="product.php" method="post">
                            <div class="search">
                                    <input type="search" name="ISBN" placeholder=" &nbsp Enter ISBN Here">
                                    <button name="search_ISBN" type="submit" >Search</button>
                            </div>
                            </form>
                        <?php else: ?>
                            <button onclick="window.location.href='/FileRouge/ReadingTime/View/views/login.php'" id="register">Register Now</button>
                        <?php endif; ?>  
                        </div>
                        <div class="slide-container" id="tablette-image">
                        <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="../Images/home1.png" class="d-block img-item-1" alt="woman read a book">
                            </div>
                            <div class="carousel-item">
                                <img  src="../Images/home2.png" class="d-block w-fit" alt="man read a book">
                            </div>
                            <div class="carousel-item">
                                <img src="../Images/home3.png" class="d-block w-fit" alt="children read stories">
                            </div>
                        </div>
                    </div>
                </div>
                    </div>
                </div>
       
                <div class="slide-container" id="desk-slide">
                    <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="../Images/home1.png" class="d-block img-item-1" alt="woman read a book">
                            </div>
                            <div class="carousel-item">
                                <img  src="../Images/home2.png" class="d-block w-fit" alt="man read a book">
                            </div>
                            <div class="carousel-item">
                                <img src="../Images/home3.png" class="d-block w-fit" alt="children read stories">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="about">
        <h2>ABOUT</h2>
        <P>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime mollitia,
            molestiae quas vel sint commodi repudiandae consequuntur voluptatum laborum
            numquam blanditiis harum quisquam eius sed odit fugiat iusto
            sint commodi repudiandae consequuntur voluptatum laborum
            numquam blanditiis harum quisquam eius sed odit fugiat iusto
        </P>
    </div>

    <div class="best-books">
        <img src="../Images/content1.png" alt="">
        <div class="best-book-text">
            <h2>
                15 best selling books of decade
            </h2>
            <p>&emsp; Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime mollitia,
            molestiae quas vel sint commodi repudiandae consequuntur voluptatum laborum
            numquam blanditiis harum quisquam eius sed odit fugiat iusto
            sint commodi repudiandae consequuntur voluptatum laborum
            numquam blanditiis harum quisquam eius sed odit fugiat iusto
            </p>
        </div>
    </div>

    <div class="best-books ex2">
        <img src="../Images/content2.png" alt="">
        <div class="best-book-text">
            <h2>
                15 best selling books of decade
            </h2>
            <p>&emsp; Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime mollitia,
            molestiae quas vel sint commodi repudiandae consequuntur voluptatum laborum
            numquam blanditiis harum quisquam eius sed odit fugiat iusto
            sint commodi repudiandae consequuntur voluptatum laborum
            numquam blanditiis harum quisquam eius sed odit fugiat iusto
            </p>
        </div>
    </div>

    <div class="newBooks-content">    
        <h2 class="newBoks-header">New Books</h2>
        <div class="newBooks">
            <div class="book">
                <img src="../Images/livre1.png" alt="milk and honey">
                <p class="description">Milk and honey created by ...</p>
                <p id="price"><span class="prix">Prix</span> : 123 $</p>
            </div>
            <div class="book">
                <img src="../Images/livre2.png" alt="PSALMS">
                <p class="description">Milk and honey created by ...</p>
                <p id="price"><span class="prix">Prix</span> : 113 $</p>
            </div>
            <div class="book">
                <img src="../Images/livre3.png" alt="mTHINKIG , FAST AND SLOW">
                <p class="description">Milk and honey created by ...</p>
                <p id="price"><span class="prix">Prix</span> : 120 $</p>
            </div>
            <div class="book">
                <img src="../Images/livre4.png" alt="101 ESSAYS THAT WILL CHANGE THE WAY YOU THINK">
                <p class="description">Milk and honey created by ...</p>
                <p id="price"><span class="prix">Prix</span> : 80 $</p>
            </div>
        </div>
    </div>

        <h2 class="newBoks-header howItWorks-header">How It Works</h2>
        <div class="newBooks howItWorks">
            <div class="book">
                <img src="../Images/ISBN.png" alt="milk and honey">
                <h4>1.Find the book by its ISBN</h4>
                <p>Le lorem ipsum est, en une suite de mots sans signification </p>
            </div>
            <div class="book">
                <img src="../Images/payer.png" alt="PSALMS">
                <h4>2.Pay safely</h4>
                <p>Le lorem ipsum est, en une suite de mots sans signification </p>
            </div>
            <div class="book">
                <img src="../Images/pack.png" alt="mTHINKIG , FAST AND SLOW">
                <h4>3.We pack your order
                    <br>
                    professionally
                </h4>
                    <p>Le lorem ipsum est, en une suite de mots sans signification </p>            </div>
            <div class="book">
                <img src="../Images/livrer.png" alt="101 ESSAYS THAT WILL CHANGE THE WAY YOU THINK">
                <h4>4.We deliver your order quickly</h4>
                <p>Le lorem ipsum est, en une suite de mots sans signification </p>
            </div>
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

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html>