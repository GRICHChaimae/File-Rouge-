<?php
if (!isset($_SESSION)) {
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
    <?php if (isset($_SESSION["userName"])) : ?>
        <link rel="stylesheet" href="../Style/nav_bar.css">
    <?php else : ?>
        <link rel="stylesheet" href="../Style/home_bar.css">
    <?php endif; ?>
    <link rel="stylesheet" href="../Style/blog.css">
    <title>Home</title>
</head>
<?php

require_once '../../Controllers/paginateController.php';

$BolgController = new BolgController();

$Blogs = $BolgController->getAllBlogs();
$numbers = $BolgController->Paginate($Blogs, 6);
$results = $BolgController->fetchResult();

?>

<body>

    <?php if (isset($_SESSION["userName"])) : ?>
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
                            <?php if (!$_SESSION['pannel_number']) : ?>
                                <img src="../Images/headerPannel.png" alt="">
                                <p class="pannel_number">0</p>

                            <?php else : ?>
                                <img src="../Images/fullpannel_header.png" alt="" id="pannelIcone">
                                <?php if ($_SESSION['pannel_number'] < 10) : ?>
                                    <p class="pannel_number"> <?= $_SESSION['pannel_number']; ?> </p>
                                <?php else : ?>
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
    <?php else : ?>
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

        <div class="blogs_pagenation">
            <div class="one_blog">
                <?php foreach ($results as $r) : ?>
                    <div>
                        <img src="<?php echo $r['blog_image'] ?>" alt="" id="img-modify">
                        <h2><?php echo $r['blog_title'] ?></h2>
                        <p><?php echo $r['blog_description'] ?></p>
                    </div>
                <?php endforeach; ?>
            </div>

            <div class="pagenation">
                <?php
                if (($_GET["page"] ?? 1) != "1") :
                ?>
                    <a href="blog.php?page=<?= intval($_GET["page"] ?? "1") - 1 ?>">previous</a>
                <?php endif?>
                <?php if (($_GET["page"] ?? "1") != count($numbers)) : ?>
                    <a href="blog.php?page=<?= intval($_GET["page"] ?? "1") + 1 ?>">next</a>
                <?php endif; ?>
               
            </div>
        </div>

        <div class="tendance_and_search">
            <div class="tendance_blogs">
                <img src="../Images/livre1.png" alt="">
            </div>
            <div class="search_ISBN">
                <form action="product.php" method="post">
                    <div class="search">
                        <input type="search" name="ISBN" placeholder=" &nbsp Enter ISBN Here">
                        <button name="search_ISBN" type="submit">Search</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

        <!-- footer -->
        <?php require_once 'footer.php'; ?>



    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script>
        AOS.init();
    </script>
</body>

</html>