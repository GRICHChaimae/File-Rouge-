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

            <!-- header -->
            <?php require_once 'admin_nav_bar.php'; ?>

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
            <input type="text" name="titre" required>
       
            <label for="">Description</label>
            <textarea type="text" name="description" style="height:100px" required></textarea>
       
            <label for="">Writer</label>
            <input type="text" name="ecrivain" required>
        
            <label for="">Picture</label>
            <input type="file" name="image" required>
        
            <label for="">Price</label>
            <input type="number" name="prix" step="any" required>

            <label for="">ISBN</label>
            <input type="number" name="ISBN" required>

            <label for="">quantity</label>
            <input type="number" name="quantity"  required>

        <input type="submit" name="submit" id="submit">
    </form>
</div>

</body>
</html>