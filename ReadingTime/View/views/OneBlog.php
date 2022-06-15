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
    <link rel="stylesheet" href="../Style/adminProduct.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Libre+Caslon+Text:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../Style/adminProduct.css">
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
 
        <p><?php echo $addVisite ?></p>
        <p><?php echo $Blog['id'] ?></p>

    <h2>Edit a Bolg Info</h2>

<div class="fromy">
    <input type="text" name="id" value="<?php echo $Blog['id'] ?>" hidden>
            <label for="">Blog title</label>
            <input type="text" name="titre" value="<?php echo $Blog['blog_title'] ?>">
       
            <label for="">Blog Description</label>
            <textarea type="text" name="description" style="height:100px"><?php echo $Blog['blog_description'] ?></textarea>
        
            <label for="">Picture</label>
            <img src="<?php echo $Blog['blog_image'] ?>" alt="" id="img-modify">
            <input type="text" value="<?php echo $Blog['blog_image'] ?>" name="picture" hidden>
            <input  type="file" name="image" class="mt-3" >
        
            <label for="">Blog text</label>
            <textarea type="text" name="text_blog" style="height:100px"><?php echo $Blog['blog_text'] ?></textarea>
      
            <input type="submit" name="submit" id="submit" value="to modify">
</div>
        <!-- footer -->
        <?php require_once 'footer.php'; ?>
</body>
</html>