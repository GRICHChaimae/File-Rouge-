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
    <link rel="stylesheet" href="../Style/blog.css">
    <title>Home</title>
</head>
<?php

require_once '../../Controllers/blogController.php';
require_once '../../Controllers/paginateController.php';

$BolgController = new BolgController();
$PaginateController = new PaginateController();

$Blogs = $BolgController->getAllBlogs();
$numbers = $PaginateController->Paginate($Blogs, 6);
$results = $PaginateController->fetchResult();

$TendanceBlogs = $BolgController->tendanceBlogs();

?>

<body>

        <!-- header -->
    <?php require_once 'home_nav_bar.php'; ?>

    <h2 id="blogs_title">Blog</h2>

    <div class="page_content">
        <div class="blogs_pagenation">
            <div class="blogS">
                <?php foreach ($results as $r) : ?>
                    <div class="one_blog">
                        <form action="OneBlog.php" method="post">
                            <button class="blog_img" name="this_blog">
                                <img src="<?php echo $r['blog_image'] ?>" alt="" id="img-modify">
                            </button>
                            <h2>
                                <button class="blog_title" name="this_blog">
                                    <?php echo $r['blog_title'] ?>
                                </button> 
                            </h2>
                            <input type="text" name="id" value="<?php echo $r['id'] ?>" hidden>
                        </form>
                        <p><?php echo $r['blog_description'] ?></p>
                        <?php if (isset($_SESSION["userName"])): ?>
                            <p style="color: rgba(0,0,0,.5);">views (<?php echo $r['visits'] ?>)</p>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>

            <div class="pagenation">
                <?php
                    if (($_GET["page"] ?? 1) != "1") :
                ?>
                    <a class="previous" href="blog.php?page=<?= intval($_GET["page"] ?? "1") - 1 ?>" class="prev_page"> <<  previous</a>
                <?php endif?>
                <?php if (($_GET["page"] ?? "1") != count($numbers)) : ?>
                    <a class="next" href="blog.php?page=<?= intval($_GET["page"] ?? "1") + 1 ?>" class="next_page">next  >> </a>
                <?php endif; ?>
            </div>
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

            <!-- footer -->
    <?php require_once 'footer.php'; ?>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script>
        AOS.init();
    </script>
</body>

</html>