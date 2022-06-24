<?php 
    if(!isset($_SESSION)){
        session_start();
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
    <link rel="stylesheet" href="../Style/adminProduct.css">
    <title>Offers</title>
</head>

<?php

require_once '../../Controllers/blogController.php';

    if(isset($_POST['deleteBlog'])){
        $Blog= new BolgController();
        $Blog->deleteBlog();
    }

    $data = new BolgController();
    $Blogs = $data->getAllBlogs();

?>

<body>

            <!-- header -->
            <?php require_once 'admin_nav_bar.php'; ?>

    <div class="done_or_not">
        <div class="not-active">
            <a href="admin_add_blog.php">Add a Blog</a> 
        </div>   
        <div class="active">
            <a href="admin_management_blog.php">Manage Blogs</a> 
        </div>
    </div>

    <div class="parents">
    <table>
        <tr>
            <th>Blog title</th>
            <th>Blog Description</th>
            <th>Action</th>
        </tr>
    <?php foreach($Blogs as $Blog): ?>
            <tr>
                <td><?php echo $Blog['blog_title'] ?></td>
                <td><?php echo $Blog['blog_description'] ?></td>
                <td>
                    <div id="image">
                    <form method="post" action="admin_update_blog.php">
                        <input type="hidden" name="id" value="<?php echo  $Blog['id'] ?>">
                        <button type="submit" class="updateBook"> 
                            <img id="pannel" src="../Images/updateBook.png">
                        </button>
                    </form>
                    <form action="" method="post">
                        <input type="hidden" name="id" value="<?php echo $Blog['id'] ?>">
                        <button class="deleteBook" type="submit" name="deleteBlog">
                            <img id="pannel" src="../Images/deleteBook.png" alt="">
                        </button>
                    </form>
                    </div>
                </td>
            </tr>  
        <?php endforeach;?>             
        </table>
         <div id="result">
            <p>The Book is Deleted<img src="Vector1.png" class="vec1"></p>
        </div>
</div>

    



</body>
</html>