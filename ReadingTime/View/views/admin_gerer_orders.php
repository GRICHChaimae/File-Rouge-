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
    <title>Orders</title>
</head>

<?php

require_once '../../Controllers/blogController.php';

    if(isset($_POST['submit'])){
        $blog = new BolgController();
        $blog->AddBlog();
    }

    if(isset($_POST['deleteBlog'])){
        $Blog= new BolgController();
        $Blog->deleteBlog();
    }

    $data = new BolgController();
    $Blogs = $data->getAllBlogs();

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
            <li><a href="admin_gérer_orders.php">Orders</a></li>
            <li><a href="admin_management_product.php">Books</a></li>
            <li><a href="admin_gérer_offers.php">Offers</a></li>
            <li><a href="admin_gérer_blogs.php">Blogs</a></li>
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
    <div class="active" >
        <a href="admin_gerer_orders.php">Unfulfilled Orders</a> 
    </div>   
    <div class="not-active">
        <a href="admin_gerer_Madeorders.php">Order Made</a> 
    </div>
</dvi>

<div class="parents">
    <table>
        <tr>
            <th>Blog title</th>
            <th>Blog Description</th>
            <th>Picture</th>
            <th>Action</th>
        </tr>
    <?php foreach($Blogs as $Blog): ?>
            <tr>
                <td><?php echo $Blog['blog_title'] ?></td>
                <td><?php echo $Blog['blog_description'] ?></td>
                <td><?php echo $Blog['blog_image']?></td>
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
            <p>Le patient est supprimer <img src="Vector1.png" class="vec1"></p>
        </div>
</div>

</body>
</html>