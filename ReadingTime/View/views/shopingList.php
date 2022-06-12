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
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../Style/nav_bar.css">
    <link rel="stylesheet" href="../Style/shopingList.css">
    <title>Home</title>
</head>

<?php

require_once '../../Controllers/commandeController.php';

    $commandeController = new CommandeController();

    if(isset($_POST['deletecommande'])){
        $commandeController->deleteCommande();
    }

    $commandes = $commandeController->getcommandes();

?>

<body>
    
            <!-- header -->
    <?php require_once 'user_nav_bar.php'; ?>

    <div class="page_content">
        <div class="side_bar">
            <ul>
                <li><a href="#">My Account</a></li>
                <li><a href="user_account.php">Account Informations</a></li>
                <li><a href="shopingList.php" class="active_liste">Your shopping list</a></li>
                <li><a href="user_Messages.php">Your messages</a></li>
                <li><a href="user_Messages_answered.php">Messages answered</a></li>
                <li><a href="SignOut.php">Sign Out</a></li>
            </ul>
        </div>
        
        <div id="Your_shopping_list">

            <p>Your Shopping List</p>

<?php if(empty($commandes)): ?>

<div class="nexistePas">
    <p>You don't any book yet</p>
    <h1>Let's Buy Some Books</h1>
</div>
<?php else: ?>

<?php foreach($commandes as $commande): ?>
    
<div class="searching_book">
    <div class="book_image">
        <img src="<?php echo $commande['image_book'] ?>" alt="">
    </div>    
    <div class="book_info">       
        <h2><?php echo $commande['book_title'] ?></h2>
        <p><span style="font-weight: bold;">written by:&nbsp</span><?php echo $commande['book_writer'] ?></p>
        <p><?php echo $commande['description_book'] ?></p>       
        <p><span style="font-weight: bold;">Price :&nbsp</span><?php echo $commande['prix_book'] ?> $</p>
    </div>
    <div class="remove_book">
        <form action="" method="post">
            <input type = "number" name = "command_id" value = "<?php echo $commande['command_id']?>">
            <button type = "submit" name = "deletecommande">
                <img src="../Images/dop_book.png" alt="">
            </button>
        </form>
    </div>
</div>

<?php endforeach; ?>

<?php endif; ?>

        </div>



    </div>


        <!-- footer -->
        <?php require_once 'footer.php'; ?>
        
        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <script>
            AOS.init();
        </script>
</body>
</html>