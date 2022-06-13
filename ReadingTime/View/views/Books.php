<?php
if (!isset($_SESSION)) {
    session_start();
}
if (!isset($_SESSION["userName"])) {
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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Libre+Caslon+Text:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="../Style/book.css">
    <title>Books</title>
</head>

<?php

require_once '../../Controllers/productController.php';
require_once '../../Controllers/pannelController.php';
require_once '../../Controllers/favoriteController.php';

$data = new ProductController();
$Books = $data->getProducts();

if (isset($_POST['submit'])) {

    $pannelController = new PannelController();
    $existe = $pannelController->existeInPannel();

    if (!$existe) {
        $pannelController->AddPannelProduct();
    }
}

if (isset($_POST['submit_favorite'])) {

    $favoriteController = new FavoriteController();
    $existe = $favoriteController->ExisteInFavorie();

    if (!$existe) {
        $favoriteController->AddFavorieProduct();
    }
}

?>

<body>

            <!-- header -->
    <?php require_once 'user_nav_bar.php'; ?>

    <div class="header_content">
        <div class="little_head"></div>
    <div class="image_title">
        <img src="../Images/headerSearch.png" alt="books">
        <h1 class="ser">Search for a book by ISBN</h1>
    </div>
    <form action="product.php" method="post">
        <div class="search">
            <input type="search" name="ISBN" placeholder=" &nbsp Enter ISBN Here">
            <button name="search_ISBN" type="submit" >Search</button>
        </div>
    </form>
    </div>

    <h2 id="ourLibrary">Our Library</h2>

    <div class="card2" >


        <?php foreach ($Books as $Book) : ?>
                <div class="one-card">
                    <img src="<?php echo $Book['image_book'] ?>" alt="" id="our-library-image">
                    <h4><?php echo $Book['book_title'] ?></h4>

                    <div class="prix-pannel">
                    <p><span>Price : </span><?php echo $Book['prix_book'] ?> $</p>

                    <div class="icon-pannel-favorite">
                    <form action="" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="book_id" value="<?php echo $Book['id'] ?>">
                        <input type="hidden" name="user_id" value="<?php echo $_SESSION["user_id"] ?>">
                        <button name="submit" class="pannel-icone">
                            <img id="pannel" src="../Images/pannel.png" alt="">
                            <img id="fullpannel" src="../Images/fullpannel.png" alt="">
                        </button>
                    </form>
                    <form action="" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="book_id" value="<?php echo $Book['id'] ?>">
                        <input type="hidden" name="user_id" value="<?php echo $_SESSION["user_id"] ?>">
                        <button name="submit_favorite">
                            <img id="favorite" src="../Images/favorite.png" alt="">
                            <img id="fullfavorite" src="../Images/fullfavorite.png" alt="">
                        </button>
                    </form>
                    </div>
                    </div>
                </div>
        <?php endforeach; ?>
    </div>

        <!-- footer -->
        <?php require_once 'footer.php'; ?>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <!-- <script>
        AOS.init();
    </script> -->
</body>

</html>