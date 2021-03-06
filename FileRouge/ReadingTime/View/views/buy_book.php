<?php
if (!isset($_SESSION)) {
    session_start();
}
if (!isset($_SESSION["userName"])) {
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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Libre+Caslon+Text:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../Style/buy_book.css">
    <link rel="stylesheet" href="../Style/offer.css">
    <title>Document</title>
</head>

<?php
require_once '../../Controllers/productController.php';
require_once '../../Controllers/commandeController.php';

if (isset($_GET['book_id'])) {
    $exitBook = new ProductController();
    $Book = $exitBook->getOneBook($_GET['book_id']);
}

if (isset($_POST['submit'])) {

    $commandeController = new CommandeController();
    $commandeController->AddCommande();

    $BookStore = new ProductController();
    $BookStore->UpdateStore();
}

if (!isset($Book)) {
    header("location: ./Books.php");
    return;
}

?>

<body>

    <!-- header -->
    <?php
    require_once 'user_nav_bar.php';
    ?>

    <div class="searching_book">
        <div class="book_image">
            <img src="<?php echo $Book['image_book'] ?>" alt="">
        </div>
        <div class="book_info">
            <h2><?php echo $Book['book_title'] ?></h2>
            <p><span style="font-weight: bold;">written by:&nbsp</span><?php echo $Book['book_writer'] ?></p>
            <p><?php echo $Book['description_book'] ?></p>
            <p><span style="font-weight: bold;">Price :&nbsp</span><?php echo $Book['prix_book'] ?> $</p>
            <div class="container" style="padding: 0; margin-right: 20px;">
                <div>
                    <p id="num_of_order">Number: </p>
                </div>
                <input type="button" onclick="decrementValue()" class="add_subtract" value="-" />  
                <input type="text" name="quantity" value="1" readonly="readonly" style="margin-left: 10px;"  class="add_subtract" max="<?php echo $Book['quantity'] ?>" size="1" id="number" />
                <input type="button" onclick="incrementValue()" class="add_subtract" value="+" />
                <p><span style="font-weight: bold; margin-left: 20px;">Total : </span><span id="total"><?php echo $Book['prix_book'] ?></span> $ </p> 
            </div>
        </div>
    </div>

    <h2 class="checkout">Checkout</h2>
    <h3>Ship To Address</h3>

    <div class="pay_form">
        <div class="ship_adress">
            <hr>

            <form action="" method="post">
                <input type="text" name="id" value='<?php echo $Book['id'] ?>' hidden>
                <input type="text" id="RestInStorage" name="quantity" value="<?php echo  $Book['quantity'] - 1 ?>" hidden> 
                <input type="text" id="number_product" name="number_product" value="<?php echo  $Book['quantity'] - 1 ?>" hidden> 
                <div class="first_row">
                    <div class="div1">
                        <p>First Name</p>
                        <input type="text" name="first_name" required>
                    </div>
                    <div class="div2">
                        <p>Last Name</p>
                        <input type="text" name="second_name" required>
                    </div>
                </div>

                <div class="second_row">
                    <div class="div1">
                        <p>Address 1</p>
                        <input type="text" name="adress_1" required>
                    </div>
                    <div class="div2">
                        <p>Address 2 <span style="color: rgba(255, 0, 0, 0.578);">(optional)</span></p>
                        <input type="text" name="adress_2">
                    </div>
                </div>

                <div class="first_row">
                    <div class="div1">
                        <p>City</p>
                        <input type="text" name="city" required>
                    </div>
                    <div class="div2">
                        <p>State</p>
                        <input type="text" name="states" required>
                    </div>
                </div>

                <div class="second_row">
                    <div class="div1">
                        <p>Country</p>
                        <input type="country" name="country" required>
                    </div>
                    <div class="div2">
                        <p>Phone Number</p>
                        <input type="tel" name="phone_number" required>
                    </div>
                </div>
                <div class="first_row row_submit">
                    <div class="div1">
                        <p>Zip Code (5 Digits)</p>
                        <input type="text" name="zip_code" required>
                    </div>
                    <div class="div2">
                        <input type="hidden" name="user_id" value="<?php echo $_SESSION["user_id"] ?>">
                        <input type="hidden" name="book_id" value="<?php echo $Book['id'] ?>">
                        <input type="hidden" name="made" value="false">
                        <input type="text" name="status" value="in_shope_liste" hidden>
                        <button type="submit" name="submit">Confirm</button>
                    </div>
                </div>
        </div>

        <div class="master_paypal">

            <div class="method_paiment">
            <input type="radio" name="paiment" checked>
                <img src="../Images/paypal.png" alt="" id="paypal_logo">
                <div class="paypal_card">
                    <input type="text" placeholder="  Paypal email address">
                    <input type="text" placeholder="  Confirm paypal email address">
                </div>
            </div>

            <div class="method_paiment master_card">
                <input type="radio" name="paiment">
                <img src="../Images/master_card.png" alt="" id="card_logo">
                <div class="paypal_card">
                    <input type="text" placeholder="  Card number">
                    <input type="text" placeholder="  Cardholder Name">
                    <div class="date_card">
                        <input type="text" placeholder=" MM">
                        <input type="text" placeholder="  YY">
                    </div>
                    <input type="text" placeholder="  CVV">
                </div>
            </div>
        </div>

        </form>

    </div>
    <!-- footer -->
    <?php require_once 'footer.php'; ?>

    <script type="text/javascript">
 
        var value = parseInt(document.getElementById('number').value, 10);

            
        function incrementValue()
        {
            value = isNaN(value) ? 0 : value;
            if(value< <?php echo $Book['quantity'] ?>){
                value++;
                    document.getElementById('number').value = value;
                    document.getElementById('total').innerHTML = value * <?php echo $Book['prix_book'] ?>;
                    document.getElementById('RestInStorage').value = <?php echo $Book['quantity'] ?> - value ;
                    document.getElementById('number_product').value = value ;
            }
        }

        function decrementValue()
        {
            value = isNaN(value) ? 0 : value;
            if(value>1){
                value--;
                    document.getElementById('number').value = value;
                    document.getElementById('total').innerHTML = value * <?php echo $Book['prix_book'] ?>;
                    document.getElementById('RestInStorage').value = <?php echo $Book['quantity'] ?> - value ;
                    document.getElementById('number_product').value = value ;
            }
        }

        const els = document.querySelectorAll("input[name='paiment']");

        els.forEach(el => {
            el.addEventListener("change", (e) => {
                const inputs = document.querySelectorAll(".paypal_card input");
                inputs.forEach(input => {
                    input.required = false;
                })
                el.parentElement.querySelectorAll(".paypal_card input").forEach(input => {
                    input.required = true;
                })
            })
        })
    </script>

</body>

</html>