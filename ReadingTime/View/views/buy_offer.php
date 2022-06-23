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
require_once '../../Controllers/commandeOfferController.php';
require_once '../../Controllers/offerController.php';

$exitOffer = new OfferController();

if(isset($_POST['submit_offer'])){
    $Offer = $exitOffer->getOneOffer($_POST['offer_id']);
  }


    if(isset($_POST['submit'])){

        $commandeOfferController= new CommandeOfferController();
        $commandeOfferController->AddCommande();

        $exitOffer->UpdateStore();

    }

    if(!isset($Offer)){
        header("location: ./Offers.php");
        return; 
    }
?>
<body>

            <!-- header -->
    <?php require_once 'user_nav_bar.php'; ?>

        <div class="offer" x-data="{value:1}">
            <img src="<?php echo $Offer['image_offer'] ?>" alt="">
            <h5><?php echo $Offer['title_offer'] ?></h5>
            <p><?php echo $Offer['description_offer'] ?></p>
            <p><span style="font-weight:bold;">Price : </span><?php echo $Offer['prix_offer'] ?> $</p>
            <div class="quantity_total" style="margin: 0 auto;">
                <div class="container">
                    <div>
                        <p id="num_of_order">Number: </p>
                    </div>
                    <input type="button" onclick="decrementValue()" class="add_subtract" value="-" />  
                <input type="text" name="quantity" value="1" readonly="readonly" style="margin-left: 10px;"  class="add_subtract" max="<?php echo $Offer['quantity'] ?>" size="1" id="number" />
                <input type="button" onclick="incrementValue()" class="add_subtract" value="+" />
                </div>
                <p><span style="font-weight: bold; margin-left: 20px;">Total : </span><span id="total"><?php echo $Offer['prix_offer'] ?></span> $ </p> 
            </div> 
        </div>

    <h2 class="checkout">Checkout</h2>
    <h3>Ship To Address</h3>

    <div class="pay_form">
        <div class="ship_adress">
            <hr>

            <form action="" method="post">
                <input type="text" name="offer_id" value='<?php echo $Offer['offer_id'] ?>' hidden>
                <input type="text" id="RestInStorage" name="quantity" value='<?php echo $Offer['quantity'] - 1 ?>' hidden>
                <input type="text" id="number_product" name="number_product" value='<?php echo $Offer['quantity'] - 1 ?>' hidden>
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
                        <input type="hidden" name="offer_id" value="<?php echo $Offer['id'] ?>">
                        <input type="hidden" name="made" value="false">
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
        if(value< <?php echo $Offer['quantity'] ?>){
            value++;
                document.getElementById('number').value = value;
                document.getElementById('total').innerHTML = value * <?php echo $Offer['prix_offer'] ?>;
                document.getElementById('RestInStorage').value = <?php echo $Offer['quantity'] ?> - value ;
                document.getElementById('number_product').value = value ;
        }
    }

    function decrementValue()
    {
        value = isNaN(value) ? 0 : value;
        if(value>1){
            value--;
                document.getElementById('number').value = value;
                document.getElementById('total').innerHTML = value * <?php echo $Offer['prix_offer'] ?>;
                document.getElementById('RestInStorage').value = <?php echo $Offer['quantity'] ?> - value ;
                document.getElementById('number_product').value = value ;
        }
    }

    const els = document.querySelectorAll("input[name='paiment']");
    els.forEach(el => {
        el.addEventListener("change" ,(e)=> {
            const inputs = document.querySelectorAll(".paypal_card input");
            inputs.forEach(input => {
                input.required= false;
            })
            el.parentElement.querySelectorAll(".paypal_card input").forEach(input => {
                input.required = true;
            })
        })
    })

</script>
    
</body>
</html>
