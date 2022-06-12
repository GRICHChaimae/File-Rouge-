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
<?php

require_once '../../Controllers/productController.php';

if(isset($_POST['id'])){
  $exitBook = new ProductController();
  $Book = $exitBook->getOneBook($_POST['id']);
}
else{
  header('location:admin_management_product.php');
}

if(isset($_POST['submit'])){
  $Book= new ProductController();
  $Book->UpdateBook();
}

?>
<body>

            <!-- header -->
    <?php require_once 'admin_nav_bar.php'; ?>
 
    <h1>Edit Book Info</h1>

<div class="fromy">
    <form action="" method="post" enctype="multipart/form-data" class="form-add">
    <input type="text" name="id" value="<?php echo $Book['id'] ?>" hidden>
            <label for="">Book title</label>
            <input type="text" name="titre" value="<?php echo $Book['book_title'] ?>">
       
            <label for="">Description</label>
            <textarea type="text" name="description" style="height:100px"><?php echo $Book['description_book'] ?></textarea>

            <label for="">Writer</label>
            <input type="text" name="ecrivain" value="<?php echo $Book['book_writer'] ?>">
        
            <label for="">Picture</label>
            <img src="<?php echo $Book['image_book'] ?>" alt="" id="img-modify">
            <input type="text" value="<?php echo $Book['image_book'] ?>" name="picture" hidden>
            <input  type="file" name="image" class="mt-3" >
        
            <label for="">Price</label>
            <input type="number" name="prix" step="any" value="<?php echo $Book['prix_book'] ?>">
 
            <label for="">ISBN</label>
            <input type="number" name="ISBN" value="<?php echo $Book['ISBN'] ?>">

            <label for="">Quantity</label>
            <input type="number" name="quantity" value="<?php echo $Book['quantity'] ?>">            

            <input type="submit" name="submit" id="submit" value="to modify">
    </form>
</div>

</body>
</html>