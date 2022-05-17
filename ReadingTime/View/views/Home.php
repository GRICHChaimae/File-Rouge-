<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Libre+Caslon+Text:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../Style/Home.css">
    <title>Document</title>
</head>

<body>
    <div class="header">
        <nav>
            <div id="logo">
                <a href="Home.html"><p>Reading</p><img src="../Images/logobrowny.png" alt="ReadingTime"></a>
            </div>

            <div id="menue-content">
                <div class="centerMenu">
                    <ul>
                        <li><a href="Home.php">Home</a></li>
                        <li><a href="Blog.php">Blog</a></li>
                        <li><a href="WhyUs.php">Why Us</a></li>
                    </ul>
                </div>
                <div class="rightMenu">
                <ul>
                    <li><a href="LogIn.php">login</a></li>
                    <li id="slash-menue">/</li>
                    <li><a href="SignUp.php">Register</a></li>
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
                    <li><a href="LogIn.php">login</a></li>
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
            <img src="../Images/home1.png" alt="aaaaaaaa" id="desktop-image">
        </div>
        
    </div>

    <!-- <div class="about">
        <h2>ABOUT</h2>
        <P>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime mollitia,
            molestiae quas vel sint commodi repudiandae consequuntur voluptatum laborum
            numquam blanditiis harum quisquam eius sed odit fugiat iusto
            sint commodi repudiandae consequuntur voluptatum laborum
            numquam blanditiis harum quisquam eius sed odit fugiat iusto
        </P>
    </div> -->

    <!-- <div class="best-books">
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
    </div> -->

    <!-- <div class="best-books ex2">
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
    </div> -->

    <!-- <div class="newBooks-content">
        <h2>New Books</h2>
        <div class="newBooks">
            <div class="book">
                <img src="../Images/livre1.png" alt="milk and honey">
                <p class="description">Milk and honey created by ...</p>
                <p><span class="prix">Prix</span> : 123 $</p>
            </div>
            <div class="book">
                <img src="../Images/livre2.png" alt="PSALMS">
                <p class="description">Milk and honey created by ...</p>
                <p><span class="prix">Prix</span> : 113 $</p>
            </div>
            <div class="book">
                <img src="../Images/livre3.png" alt="mTHINKIG , FAST AND SLOW">
                <p class="description">Milk and honey created by ...</p>
                <p><span class="prix">Prix</span> : 120 $</p>
            </div>
            <div class="book">
                <img src="../Images/livre4.png" alt="101 ESSAYS THAT WILL CHANGE THE WAY YOU THINK">
                <p class="description">Milk and honey created by ...</p>
                <p><span class="prix">Prix</span> : 80 $</p>
            </div>
        </div>
    </div> -->

    <script>
        function toggleMobileMenu(menu) {
         menu.classList.toggle('open');
        }

        // const slider = document.querySelector(".picture-galary");
        // const images = ["../Images/home1.png", "../Images/home2.png"];

        // let currentImage = 0;
        // const setImage = () => {
        //     slider.style.backgroundImage = `url(${images[currentImage]})`;
        //     currentImage++;
        //     if(currentImage === images.length)(currentImage = 0);
        // }
        // setImage();
        // setInterval(setImage, 5000);

    </script>
</body>
</html>