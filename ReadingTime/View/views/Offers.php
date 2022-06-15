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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="../Style/offer.css">
    <title>Offers</title>
</head>

<?php

require_once '../../Controllers/offerController.php';

if (isset($_POST['submit'])) {
    $offer = new OfferController();
    $offer->AddOffer();
}

if (isset($_POST['deleteOffer'])) {
    $Offer = new OfferController();
    $Offer->deleteOffer();
}

$data = new OfferController();
$Offers = $data->getAllOffers();

?>

<body>
            <!-- header -->
    <?php require_once 'user_nav_bar.php'; ?>

    <div class="offer">
        
            <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner" style="padding: 0 70px; margin-top: 0;" >

                    <?php foreach ($Offers as $index => $item) : ?>
                    <div class="carousel-item <?= !$index ? 'active' : '' ?>">
                        <img src="<?php echo $item['image_offer'] ?>" alt="">
                        <h5 class="title_p"><?php echo $item['title_offer'] ?></h5>
                        <p class="title_p"><?php echo $item['description_offer'] ?></p>
                        <p class="title_p"><span style="font-weight:bold;">Price : </span><?php echo $item['prix_offer'] ?> $</p>
                        <form action="buy_offer.php" method="post" id="buy-form">
                            <input type="number" name="offer_id" value="<?php echo $item['id'] ?>" hidden>
                            <button name="submit_offer" type="submit"  id="buy_offer">
                                Buy Now
                            </button>
                        </form>
                    </div>
                <?php endforeach; ?>

                </div>
                <button class="carousel-control-prev" style="width:70px; background-color:#E6DAD5;" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" style="width:70px; background-color:#E6DAD5;" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
    </div>

            <!-- footer -->
        <?php require_once 'footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>

</html>