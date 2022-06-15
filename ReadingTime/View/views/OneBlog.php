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
    <link rel="stylesheet" href="../Style/one_blog.css">
    <title>Update a book Informations</title>
</head>
<?php

require_once '../../Controllers/blogController.php';

    $exitBlog = new BolgController();

    if(isset($_POST['id'])){
        $Blog = $exitBlog->getOneBlog($_POST['id']);
        $addVisite = $Blog['visits'] + 1;
        $exitBlog->addVisites($Blog['id'],$addVisite);
    }
    else{
        header('location:blog.php');
    }

    $TendanceBlogs = $exitBlog ->tendanceBlogs();

?>

<body>
            <!-- header -->
        <?php require_once 'home_nav_bar.php'; ?>  
 
        <h2><?php echo $Blog['blog_title'] ?></h2>

<div class="page_content">
    <div class="one_blog">
        <img src="<?php echo $Blog['blog_image'] ?>" alt="" id="img-modify">
        <p><?php echo $Blog['blog_text'] ?></p>
    </div>

    <div class="tendance_and_search">
        <div class="tendance_blogs">
            <h4>Trending Blogs</h4>
            <hr style="width: 100%; height: 3px; color: black;">
                <?php foreach ($TendanceBlogs as $TendanceBlog) : ?>
                    <form action="OneBlog.php" method="post">
                    <div class="one_tendance">
                        <button id="tendance_blog_img">
                            <img src="<?php echo $TendanceBlog['blog_image'] ?>" alt="">
                        </button>
                        <h6>
                            <button id="tendance_blog_title">
                                <?php echo $TendanceBlog['blog_title'] ?>
                            </button>
                        </h6>
                        <input type="text" name="id" value="<?php echo $TendanceBlog['id'] ?>" hidden>
                    </div>
                    </form>
                <?php endforeach; ?>                            
        </div>
        <div class="search_ISBN">
            <h3>Buy Your <br>
                paper book <br>
                Now!</h3>
            <p>We guarantee you'll get your book</p>
            <?php  if (isset($_SESSION["userName"])): ?>
            <form action="product.php" method="post">
                <div class="search">
                    <input type="search" name="ISBN" placeholder=" &nbsp Enter ISBN Here">
                    <button name="search_ISBN" type="submit">Search</button>
                </div>
            </form>
            <?php else: ?>
                <p>You don't have an account !
                    <br> Register Now!!
                </p>
                <div class="reg">
                    <button onclick="window.location.href='/FileRouge/ReadingTime/View/views/login.php'" id="register_blog">
                        Register Now
                    </button>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>


    <!-- <div class="one_blog">
        <h5><?php echo $Blog['blog_title'] ?></h5>
        <img src="<?php echo $Blog['blog_image'] ?>" alt="" id="img-modify">
        <p><?php echo $Blog['blog_text'] ?></p>
    </div> -->


        <!-- footer -->
        <?php require_once 'footer.php'; ?>
</body>
</html>