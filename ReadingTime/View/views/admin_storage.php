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
    <title>Document</title>
</head>
<?php

require_once '../../Controllers/productController.php';

        $product = new ProductController();
        $Books =  $product->getVoidStorage();
?>
<body>

            <!-- header -->
            <?php require_once 'admin_nav_bar.php'; ?>


<dvi class="done_or_not">
    <div class="active">
        <a href="admin_storage.php">Books Storage</a> 
    </div>   
    <div class="not-active">
        <a href="admin_offer_storage.php">Offers Storage</a> 
    </div>
</dvi>

<div class="parents">
    <table>
        <tr>
            <th>Book ISBN</th>
            <th>Book title</th>
            <th>Book Writer</th>
            <th>Book Description</th>
            <th>Action</th>
        </tr>
    <?php foreach($Books as $Book): ?>
            <tr>
                <td><?php echo $Book['ISBN'] ?></td>
                <td><?php echo $Book['book_title'] ?></td>
                <td><?php echo $Book['book_writer']?></td>
                <td><?php echo $Book['description_book'] ?></td>
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
                        <button class="deleteBook" type="submit" name="deleteOffer">
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