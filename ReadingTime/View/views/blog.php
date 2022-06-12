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

require_once '../../Controllers/paginateController.php';

$BolgController = new BolgController();

$Blogs = $BolgController->getAllBlogs();
$numbers = $BolgController->Paginate($Blogs, 6);
$results = $BolgController->fetchResult();

?>

<body>

        <!-- header -->
    <?php require_once 'home_nav_bar.php'; ?>  

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