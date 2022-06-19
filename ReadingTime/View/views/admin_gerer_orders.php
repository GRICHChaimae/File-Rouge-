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

require_once '../../Controllers/gererCommandsController.php';

    $gerercommandeController = new GererCommandsController();

    $commandes = $gerercommandeController->getcommandes();

    if(isset($_POST['submit'])){
        $gerercommandeController->UpdateMade();
      }

?>

<body>

            <!-- header -->
            <?php require_once 'admin_nav_bar.php'; ?>

<dvi class="done_or_not">
    <div class="active" >
        <a href="admin_gerer_orders.php">Unfulfilled Orders</a> 
    </div>   
    <div class="not-active">
        <a href="admin_gerer_Madeorders.php">Order Made</a> 
    </div>
</dvi>

<div class="made_not">
    <a href="admin_gerer_orders.php" class="active_page">Book Orders</a>
    <a href="admin_gerer_offer_orders.php">Offer Orders</a>
</div>

<div class="parents">
    <table>
        <tr>
            <th>ISBN</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Counrty</th>
            <th>State</th>
            <th>City</th>
            <th>Zip Code</th>
            <th>Address 1</th>
            <th>Address 2</th>
            <th>Phone Number</th>
            <th>Action</th>
        </tr>
    <?php foreach($commandes  as $commande): ?>
            <tr>
                <td><?php echo $commande['ISBN']?></td>
                <td><?php echo $commande['first_name'] ?></td>
                <td><?php echo $commande['second_name'] ?></td>
                <td><?php echo $commande['country']?></td>
                <td><?php echo $commande['states'] ?></td>
                <td><?php echo $commande['city'] ?></td>
                <td><?php echo $commande['zip_code']?></td>                
                <td><?php echo $commande['adress_1'] ?></td>
                <td><?php echo $commande['adress_2']?></td>
                <td><?php echo $commande['phone_number']?></td>
                <td>
                    <div id="image">
                    <form action="" method="post">
                        <input type="hidden" name="made" value="true">
                        <input type="hidden" name="command_id" value="<?php echo $commande['command_id']?>">
                        <button class="deleteBook" type="submit" name="submit">
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