<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Style/adminProduct.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Libre+Caslon+Text:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../Style/adminProduct.css">
    <title>Update a book Informations</title>
</head>
<body>

<?php

require_once '../../Controllers/offerController.php';

if(isset($_POST['id'])){
  $exitOffer = new OfferController();
  $Offer = $exitOffer->getOneOffer($_POST['id']);
}
else{
  header('location:admin_management_offer.php');
}
if(isset($_POST['submit'])){
  $Offer= new OfferController();
  $Offer->UpdateOffer();
}

?>
<header>
    <div id="logo">
        <a href="Home.php"><p>Reading</p><img src="../Images/logobrowny.png" alt="ReadingTime"></a>
    </div>

    <input type="checkbox" id="menu-bar">
    <label for="menu-bar">Menu</label>

    <nav class="navbary">
        <ul>
            <li><a href="admin_gerer_orders.php">Orders</a></li>
            <li><a href="admin_management_product.php">Books</a></li>
            <li><a href="admin_management_offer.php">Offers</a></li>
            <li><a href="admin_management_blog.php">Blogs</a></li>
            <li><a href="#">Your Account+</a> 
                <ul>
                    <li><a href="admin_account.php">My Account</a></li>
                    <li><a href="admin_Account_Informations.php">Account Informations</a></li>
                    <li><a href="admin_Messages.php">Messages</a></li>
                    <li><a href="admin_Sign_Out">Sign Out</a></li>
                </ul>
            </li>
        </ul>
    </nav>
</header>
 
    <h1>Edit an Offer Info</h1>

<div class="fromy">
    <form action="" method="post" enctype="multipart/form-data" class="form-add">
    <input type="text" name="id" value="<?php echo $Offer['id'] ?>" hidden>
            <label for="">Offer title</label>
            <input type="text" name="titre" value="<?php echo $Offer['title_offer'] ?>">
       
            <label for="">Description</label>
            <textarea type="text" name="description" style="height:100px"><?php echo $Offer['description_offer'] ?></textarea>
        
            <label for="">Picture</label>
            <img src="<?php echo $Offer['image_offer'] ?>" alt="" id="img-modify">
            <input type="text" value="<?php echo $Offer['image_offer'] ?>" name="picture" hidden>
            <input  type="file" name="image" class="mt-3" >
        
            <label for="">Price</label>
            <input type="number" name="prix" value="<?php echo $Offer['prix_offer'] ?>">

            <label for="">Quantity</label>
            <input type="number" name="quantity" value="<?php echo $Offer['quantity'] ?>">
      
            <input type="submit" name="submit" id="submit" value="to modify">
    </form>
</div>

</body>
</html>