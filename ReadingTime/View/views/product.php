<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<?php
require_once '../../Controllers/productController.php';

if(isset($_POST['search_ISBN'])){

    $exitBook = new ProductController();
    $Book = $exitBook->getOneISBN($_POST['ISBN']);
    
}

?>

<body>
    <p><?php echo $Book['book_title'] ?></p>
    <p><?php echo $Book['description_book'] ?></p>
    <p><?php echo $Book['book_writer'] ?></p>
    <p><?php echo $Book['prix_book'] ?></p>
    <img src="<?php echo $Book['image_book'] ?>" alt="">
    <p><?php echo $Book['ISBN'] ?></p>
</body>
</html>