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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Libre+Caslon+Text:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet"> 
    <link rel="stylesheet" href="../Style/Home.css">
    <title>Home</title>
</head>

<body>

         <!-- header -->
    <?php require_once 'home_nav_bar.php'; ?>  

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

    <div class="about" data-aos="zoom-in">
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
        <img src="../Images/content1.png" alt="" data-aos="fade-right">
        <div class="best-book-text">
            <h2 data-aos="fade-right" style="max-width: 100wh; overflow: hidden;">
                15 best selling books of decade
            </h2>
            <p data-aos="fade-right">&emsp; Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime mollitia,
            molestiae quas vel sint commodi repudiandae consequuntur voluptatum laborum
            numquam blanditiis harum quisquam eius sed odit fugiat iusto
            sint commodi repudiandae consequuntur voluptatum laborum
            numquam blanditiis harum quisquam eius sed odit fugiat iusto
            </p>
        </div>
    </div>

    <div class="best-books ex2">
        <img src="../Images/content2.png" alt="" data-aos="fade-right">
        <div class="best-book-text">
            <h2 data-aos="fade-right">
                15 best selling books of decade
            </h2>
            <p data-aos="fade-right">&emsp; Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime mollitia,
            molestiae quas vel sint commodi repudiandae consequuntur voluptatum laborum
            numquam blanditiis harum quisquam eius sed odit fugiat iusto
            sint commodi repudiandae consequuntur voluptatum laborum
            numquam blanditiis harum quisquam eius sed odit fugiat iusto
            </p>
        </div>
    </div>

    <div class="newBooks-content">    
        <h2 class="newBoks-header" data-aos="zoom-in">New Books</h2>
        <div class="newBooks">
            <div class="book" data-aos="flip-left">
                <img src="../Images/livre1.png" alt="milk and honey">
                <p class="description">Milk and honey created by ...</p>
                <p id="price"><span class="prix">Prix</span> : 123 $</p>
            </div>
            <div class="book" data-aos="flip-left">
                <img src="../Images/livre2.png" alt="PSALMS">
                <p class="description">Milk and honey created by ...</p>
                <p id="price"><span class="prix">Prix</span> : 113 $</p>
            </div>
            <div class="book" data-aos="flip-left">
                <img src="../Images/livre3.png" alt="mTHINKIG , FAST AND SLOW">
                <p class="description">Milk and honey created by ...</p>
                <p id="price"><span class="prix">Prix</span> : 120 $</p>
            </div>
            <div class="book" data-aos="flip-left">
                <img src="../Images/livre4.png" alt="101 ESSAYS THAT WILL CHANGE THE WAY YOU THINK">
                <p class="description">Milk and honey created by ...</p>
                <p id="price"><span class="prix">Prix</span> : 80 $</p>
            </div>
        </div>
    </div>

    <h2 class="newBoks-header howItWorks-header" data-aos="zoom-in">How It Works</h2>
      <div class="newBooks howItWorks">
            <div class="howItWorks1">
            <div class="how_works" data-aos="fade-up">
                <img src="../Images/ISBN.png" alt="milk and honey">
                <h4>1.Find the book by its ISBN</h4>
                <p>Le lorem ipsum est, en une suite de mots sans signification </p>
            </div>
            <div class="how_works" data-aos="fade-up">
                <img src="../Images/payer.png" alt="PSALMS">
                <h4>2.Pay safely</h4>
                <p>Le lorem ipsum est, en une suite de mots sans signification </p>
            </div>
            </div>
            <div class="howItWorks2">
            <div class="how_works" data-aos="fade-down">
                <img src="../Images/pack.png" alt="mTHINKIG , FAST AND SLOW">
                <h4>3.We pack your order
                    <br>
                    professionally
                </h4>
                    <p>Le lorem ipsum est, en une suite de mots sans signification </p>           
            </div>
            <div class="how_works" data-aos="fade-down">
                <img src="../Images/livrer.png" alt="101 ESSAYS THAT WILL CHANGE THE WAY YOU THINK">
                <h4>4.We deliver your order quickly</h4>
                <p>Le lorem ipsum est, en une suite de mots sans signification </p>
            </div>
            </div>
        </div>

        <!-- footer -->
        <?php require_once 'footer.php'; ?>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
        
        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
        <script>
            AOS.init();
        </script>
</body>
</html>