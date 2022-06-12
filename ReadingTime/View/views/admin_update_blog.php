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
}
else{
  header('location:admin_management_blog.php');
}
if(isset($_POST['submit'])){
  $Blog= new BolgController();
  $Blog->UpdateBlog();
}

?>

<body>
            <!-- header -->
        <?php require_once 'admin_nav_bar.php'; ?>
 
    <h2>Edit a Bolg Info</h2>

<div class="fromy">
    <form action="" method="post" enctype="multipart/form-data" class="form-add">
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
    </form>
</div>

</body>
</html>