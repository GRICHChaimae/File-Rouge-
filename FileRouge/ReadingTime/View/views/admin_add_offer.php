<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Libre+Caslon+Text:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../Style/adminProduct.css">
    <title>Offers</title>
</head>

<?php

require_once '../../Controllers/offerController.php';

    if(isset($_POST['submit'])){
        $offer = new OfferController();
        $offer->AddOffer();
    }

?>

<body>

            <!-- header -->
            <?php require_once 'admin_nav_bar.php'; ?>

<dvi class="done_or_not">
    <div class="active">
        <a href="admin_add_offer.php">Add Offer</a> 
    </div>   
    <div class="not-active">
        <a href="admin_management_offer.php">Manage Offers</a> 
    </div>
</dvi>

<h2>Add an Offer</h2>

<div class="fromy">
    <form action="" method="post" enctype="multipart/form-data" class="form-add">
        
            <label for="">Offer title</label>
            <input type="text" name="titre">
       
            <label for="">Description</label>
            <textarea type="text" name="description" style="height:100px"></textarea>
        
            <label for="">Picture</label>
            <input type="file" name="image">
        
            <label for="">Price</label>
            <input type="number" name="prix">
   
            <label for="">Quantity</label>
            <input type="number" name="quantity">

        <input type="submit" name="submit" id="submit">
    </form>
</div>

</body>
</html>