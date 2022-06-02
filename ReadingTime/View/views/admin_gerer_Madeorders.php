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

    $commandes = $gerercommandeController->getmadecommandes();

    if(isset($_POST['submit'])){
        $gerercommandeController->UpdateMadeTrue();
      }

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
            <li><a href="admin_gerer_orders.php">Orders</a></li>
            <li><a href="admin_management_product.php">Books</a></li>
            <li><a href="admin_management_offer.php">Offers</a></li>
            <li><a href="admin_management_blog.php">Blogs</a></li>
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
    <div class="not-active" >
        <a href="admin_gerer_orders.php">Unfulfilled Orders</a> 
    </div>   
    <div class="active">
        <a href="admin_gerer_Madeorders.php">Order Made</a> 
    </div>
</dvi>

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
                        <input type="hidden" name="made" value="false">
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