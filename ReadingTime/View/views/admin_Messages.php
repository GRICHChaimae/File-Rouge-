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
    <title>Contacts</title>
</head>

<?php

require_once '../../Controllers/contactUsController.php';

    $contactUsController = new ContactUsController();

    if(isset($_POST['deleteContact'])){
        $contactUsController->deleteMessage();
    }

    if(isset($_POST['status'])){
        $contactUsController->updateStatus();
    }

    $Messages = $contactUsController->getAllContatcts();

?>

<body>

            <!-- header -->
            <?php require_once 'admin_nav_bar.php'; ?>

    <h2>Your Contacts</h2>

    <div class="parents">
    <table>
        <tr>
            <th>Email</th>
            <th>Subject</th>
            <th>Message</th>
            <th>Action</th>
        </tr>
    <?php foreach($Messages as $Message): ?>
            <tr>
                <td><?php echo $Message['email'] ?></td>
                <td><?php echo $Message['subject'] ?></td>
                <td><?php echo $Message['message']?></td>
                <td>
                    <div id="image">
                    <?php if( $Message['status'] == 'not_done' ): ?>
                        <form method="post">
                            <input type="hidden" name="id" value="<?php echo  $Message['id'] ?>">
                            <button type="submit" class="updateBook" name="status" value="done"> 
                                <img id="pannel" src="../Images/notDone.png" style="margin-top: 6.5px;">
                            </button>
                        </form>
                    <?php else: ?>
                        <form method="post">
                            <input type="hidden" name="id" value="<?php echo  $Message['id'] ?>">
                            <button type="submit" class="updateBook" name="status" value="not_done"> 
                                <img id="pannel" src="../Images/done.png" style="margin-top: 6.5px;"> 
                            </button>
                        </form>
                    <?php endif; ?>

                    <form action="" method="post">
                        <input type="hidden" name="id" value="<?php echo $Message['id'] ?>">
                        <button class="deleteBook" type="submit" name="deleteContact">
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