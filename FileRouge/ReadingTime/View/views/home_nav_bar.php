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
    <?php if(!isset($_SESSION["userName"])):?>
    <link rel="stylesheet" href="../Style/home_bar.css">
    <?php endif; ?>
    <title>Home</title>
</head>
<body>
    <?php if(isset($_SESSION["userName"])):?>

                <!-- header -->
        <?php require_once 'user_nav_bar.php'; ?>   

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
</body>
</html>