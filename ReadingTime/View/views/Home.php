<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
                <h3>Read Books and  Enjoy With Us:</h3>
                <h4>Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxim mollitia,molestiae quas vel sint commodi</h4>
                <button onclick="window.location.href='/FileRouge/ReadingTime/View/views/SignUp.php'" >Register Now</button>
            </div>

            <div class="picture-galary">

            </div>
        </div>
    </div>

    <script>
        function toggleMobileMenu(menu) {
         menu.classList.toggle('open');
        }

        const slider = document.querySelector(".picture-galary");
        const images = ["../Images/home1.png", "../Images/home2.png"];

        let currentImage = 0;
        const setImage = () => {
            slider.style.backgroundImage = `url(${images[currentImage]})`;
            currentImage++;
            if(currentImage === images.length)(currentImage = 0);
        }
        setImage();
        setInterval(setImage, 5000);
    </script>
</body>
</html>