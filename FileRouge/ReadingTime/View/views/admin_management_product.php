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

    if(isset($_POST['deleteProduct'])){
        $pannelProduct= new ProductController();
        $pannelProduct->deleteProduct();
    }

    $data = new ProductController();
    $Books = $data->getAllProducts();

?>

<body>

            <!-- header -->
    <?php require_once 'admin_nav_bar.php'; ?>

<dvi class="done_or_not">
    <div class="not-active">
        <a href="admin_add_book.php">Add a Book</a> 
    </div>   
    <div class="active">
        <a href="admin_management_product.php">Manage Books</a> 
    </div>
</dvi>

    <div class="parents">
    <table>
        <tr>
            <th>ISBN</th>
            <th>Book title</th>
            <th>Writer</th>
            <th>Price</th>
            <th>Storage</th>
            <th>Action</th>
        </tr>
    <?php foreach($Books as $Book): ?>
            <tr>
                <td><?php echo $Book['ISBN'] ?></td>
                <td><?php echo $Book['book_title'] ?></td>
                <td><?php echo $Book['book_writer'] ?></td>
                <td><?php echo $Book['prix_book'] ?></td>
                <td><?php echo $Book['quantity'] ?></td>
                <td>
                    <div id="image">
                    <form method="post" action="admin_update_book.php">
                        <input type="hidden" name="id" value="<?php echo  $Book['id'] ?>">
                        <button type="submit" class="updateBook"> 
                            <img id="pannel" src="../Images/updateBook.png">
                        </button>
                    </form>
                    <form action="" method="post">
                        <input type="hidden" name="id" value="<?php echo $Book['id'] ?>">
                        <button class="deleteBook" type="submit" name="deleteProduct">
                            <img id="pannel" src="../Images/deleteBook.png" alt="">
                        </button>
                    </form>
                    </div>
                </td>
            </tr>  
        <?php endforeach;?>             
        </table>
</div>

    



</body>
</html>