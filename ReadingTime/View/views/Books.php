<?php 
if(!isset($_SESSION)){
  session_start();
}
if(!isset($_SESSION["userName"])){
  header("location: ./login.php");
  return;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="../Style/books.css"> -->
    <title>Books</title>
</head>

<h1>Bienvenue <?php if(isset($_SESSION["userName"])){ echo ' '.$_SESSION["userName"];}?></h1>
<h1>id of user <?php if(isset($_SESSION["userName"])){ echo ' '.$_SESSION["user_id"];}?></h1>

<?php 

require_once '../../Controllers/pannelController.php';
require_once '../../Controllers/productController.php';

$data = new ProductController();
$Books = $data->getAllProducts();

$pannelData = new PannelController();
$Pannels = $pannelData->getPannelProduct();

if(isset($_POST['deletePannelProduct'])){
    $pannelProduct= new PannelController();
    $pannelProduct->deletePannelProduct();
}

if(isset($_POST['submit'])){
    $pannelProduct = new PannelController();
    $pannelProduct->AddPannelProduct();
}


?>
<body>



<?php foreach($Books as $Book): ?>

 
        <img src="<?php echo $Book['image_book']?>" alt="">
        <p><?php echo $Book['description_book'] ?></p>
        <p><?php echo $Book['prix_book'] ?></p>

<div>
  
        <form action="" method="post" enctype="multipart/form-data">
        <input type="hidden" name="image" value="<?php echo $Book['image_book']?>">
        <input type="hidden" name="description" value="<?php echo $Book['description_book'] ?>">
        <input type="hidden" name="prix" value="<?php echo $Book['prix_book'] ?>">
        <input type="hidden" name="book_id" value="<?php echo $Book['id'] ?>">
        <input type="hidden" name="user_id" value="<?php echo $_SESSION["user_id"] ?>">
        <button name="submit">        
            <img id="pannel" src="../Images/pannel.png" alt="" >
        </button>
    </form>

    <form action="" method="post">
        <input type="hidden" name="book_id" value="<?php echo $Book['id'] ?>">
        <button class="btn btn-outline-danger" type="submit" name="deletePannelProduct">
            <img id="pannel" src="../Images/fullpannel.png" alt="" class="fullPannel">
        </button>
    </form>
     
</div>

<?php endforeach;?>  


<script>

    // function toggleMobileMenu(pannelIcone) {
    //     pannelIcone.classList.toggle('playPannel');
    // }

    // const src1 = "http://localhost/FileRouge/ReadingTime/View/Images/pannel.png"
    // const src2 = "http://localhost/FileRouge/ReadingTime/View/Images/fullpannel.png"

    // const pannel = document.getElementById('pannel')
    // console.log(pannel.src)

    // pannel.addEventListener('click', ()=>{
    //     (pannel.src === src1) ? pannel.src = src2 : pannel.src = src1     
    // })

    // const name1 = "submit"
    // const name2 = "deletePannelProduct"

    // const pannelCrud = document.getElementById('pannelCrud')
    // console.log(pannelCrud.name)

    // pannelCrud.addEventListener('click', ()=>{
    //     (pannelCrud.name === name1) ? pannelCrud.name = name1 : pannelCrud.name = name2    
    // })
       
</script>

</body>
</html>