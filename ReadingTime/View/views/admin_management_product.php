<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    <form action="" method="post" enctype="multipart/form-data">
        <input type="file" name="image">
        <input type="text" name="description">
        <input type="number" name="prix">
        <img id="pannel" src="../Images/pannel.png" alt="">
        <input type="submit" name="submit">
    </form>

    <!-- <script>

    const src1 = "http://localhost/FileRouge/ReadingTime/View/Images/pannel.png"
    const src2 = "http://localhost/FileRouge/ReadingTime/View/Images/fullpannel.png"

    const pannel = document.getElementById('pannel')
    console.log(pannel.src)

    pannel.addEventListener('click', ()=>{
        (pannel.src === src1) ? pannel.src = src2 : pannel.src = src1     
    })
  
</script> -->
</body>
</html>