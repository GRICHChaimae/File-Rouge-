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
    <title>admin</title>
</head>

<?php

require_once '../../Controllers/productController.php';

    if(isset($_POST['submit'])){
        $product = new ProductController();
        $product->AddProduct();
    }


?>

<body>

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
                    <li><a href="admin_Sign_Out.php">Sign Out</a></li>
                </ul>
            </li>
        </ul>
    </nav>
</header>

<dvi class="done_or_not">
    <div class="active">
        <a href="admin_add_book.php">Add a Book</a> 
    </div>   
    <div class="not-active">
        <a href="admin_management_product.php">Manage Books</a> 
    </div>
</dvi>

<h2>Add a Book</h2>

<div class="fromy">
    <form action="" method="post" enctype="multipart/form-data" class="form-add">
        
            <label for="">Book title</label>
            <input type="text" name="titre">
       
            <label for="">Description</label>
            <textarea type="text" name="description" style="height:100px"></textarea>
       
            <label for="">Writer</label>
            <input type="text" name="ecrivain">
        
            <label for="">Picture</label>
            <input type="file" name="image">
        
            <label for="">Price</label>
            <input type="number" name="prix">

            <label for="">ISBN</label>
            <input type="number" name="ISBN">
      
        <input type="submit" name="submit" id="submit">
    </form>
</div>

</body>
</html>