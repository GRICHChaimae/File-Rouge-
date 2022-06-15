<?php
if (!isset($_SESSION)) {
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
    <link rel="stylesheet" href="../Style/one_blog.css">
    <title>Update a book Informations</title>
</head>
<?php

require_once '../../Controllers/blogController.php';

if(isset($_POST['id'])){
  $exitBlog = new BolgController();
  $Blog = $exitBlog->getOneBlog($_POST['id']);

  $addVisite = $Blog['visits'] + 1;

  $exitBlog->addVisites($Blog['id'],$addVisite);


}
else{
  header('location:blog.php');
}

?>

<body>
            <!-- header -->
        <?php require_once 'home_nav_bar.php'; ?>  
 
    <h2>Edit a Bolg Info</h2>

<div class="page_content">
    <div class="one_blog">
        <h5><?php echo $Blog['blog_title'] ?></h5>
        <img src="<?php echo $Blog['blog_image'] ?>" alt="" id="img-modify">
        <p><?php echo $Blog['blog_text'] ?></p>
    </div>

    <div class="tendance_and_search">
        
    </div>
</div>
        <!-- footer -->
        <?php require_once 'footer.php'; ?>
</body>
</html>