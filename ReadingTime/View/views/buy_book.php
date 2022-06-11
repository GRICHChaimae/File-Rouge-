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
    <link rel="stylesheet" href="../Style/nav_bar.css">
    <link rel="stylesheet" href="../Style/buy_book.css">
    <link rel="stylesheet" href="../Style/offer.css">
    <title>Document</title>
</head>

<?php 
require_once '../../Controllers/productController.php';
require_once '../../Controllers/commandeController.php';
require_once '../../Controllers/offerController.php';

if(isset($_POST['submit_offer'])){
    $exitOffer = new OfferController();
    $Offer = $exitOffer->getOneOffer($_POST['offer_id']);
  }

if(isset($_GET['book_id'])){
    $exitBook = new ProductController();
    $Book = $exitBook->getOneBook($_GET['book_id']);
}


    if(isset($_POST['submit'])){

        $commandeController = new CommandeController();
        $commandeController->AddCommande();

        $BookStore= new ProductController();
        $BookStore->UpdateStore();

    }


?>
<body>

<header>
        <div id="logo">
            <a href="Home.php">
                <p>Reading</p><img src="../Images/logobrowny.png" alt="ReadingTime">
            </a>
        </div>

        <input type="checkbox" id="menu-bar">
        <label for="menu-bar" class="menu-bar-text"><img src="../Images/berger_menu.png" alt=""> </label>

        <nav class="navbary">
            <ul>
                <li><a href="Home.php">Home</a></li>
                <li><a href="Books.php">Books</a></li>
                <li><a href="Offers.php">Offers</a></li>
                <li><a href="Blog.php">Blog</a></li>
                <li><a href="WhyUs.php">Why Us</a></li>
                <li>
                    <a href="#">
                        Hello <?php echo $_SESSION["userName"] ?> +
                    </a>
                    <ul>
                        <li><a href="user_account.php">Account Informations</a></li>
                        <li><a href="shopingList.php">Your shopping list</a></li>
                        <li><a href="user_Messages.php">Your messages</a></li>
                        <li><a href="user_Messages_answered.php">Messages answered</a></li>
                        <li><a href="SignOut.php">Sign Out</a></li>
                    </ul>
                </li>
            </ul>

        </nav>

        <div class="right-nav">
            <ul>
                <li>
                    <a href="#">
                        Hello <?php echo $_SESSION["userName"] ?> +
                    </a>
                    <ul>
                    <li><a href="user_account.php">Account Informations</a></li>
                        <li><a href="shopingList.php">Your shopping list</a></li>
                        <li><a href="user_Messages.php">Your messages</a></li>
                        <li><a href="user_Messages_answered.php">Messages answered</a></li>
                        <li><a href="SignOut.php">Sign Out</a></li>
                    </ul>
                </li>
                <li id="headerPannel">
                <a href="Pannel.php">
                        <?php if(!$_SESSION['pannel_number']): ?>
                            <img src="../Images/headerPannel.png" alt="">
                            <p class="pannel_number">0</p> 
                            
                        <?php else: ?>
                            <img src="../Images/fullpannel_header.png" alt="" id="pannelIcone">
                        <?php if($_SESSION['pannel_number'] < 10): ?>
                        <p class="pannel_number"> <?= $_SESSION['pannel_number'] ; ?> </p> 
                        <?php else: ?>
                            <p class="pannel_number">+9</p>
                        <?php endif; ?>
                        <?php endif; ?>
                    </a>
                </li>
                <li id="headerFavorite">
                    <a href="Favorite.php">
                        <img src="../Images/headerFavorite.png" alt="">
                    </a>
                </li>
            </ul>
        </div>
</header>

    <?php if(isset($Book)): ?>
        <div class="searching_book">
            <div class="book_image">
                <img src="<?php echo $Book['image_book'] ?>" alt="">
            </div>    
            <div class="book_info">
                <h2><?php echo $Book['book_title'] ?></h2>
                <p><span style="font-weight: bold;">written by:&nbsp</span><?php echo $Book['book_writer'] ?></p>
                <p><?php echo $Book['description_book'] ?></p>       
                <p><span style="font-weight: bold;">Price :&nbsp</span><?php echo $Book['prix_book'] ?> $</p>
                <div class="container">
                    <input type="button" onclick="decrementValue()" value="-" />  
                    <input type="text" name="quantity" value="1" readonly="readonly" maxlength="2" max="10" size="1" id="number" />
                    <input type="button" onclick="incrementValue()" value="+" />
                </div>
                <p><span style="font-weight: bold;">Total : </span><span id="total"><?php echo $Book['prix_book'] ?></span> $ </p>                     
            </div>
        </div>
    <?php elseif(isset($Offer)): ?>
        <div class="offer">
            <img src="<?php echo $Offer['image_offer'] ?>" alt="">
            <h5><?php echo $Offer['title_offer'] ?></h5>
            <p><?php echo $Offer['description_offer'] ?></p>
            <p><span style="font-weight:bold;">Price : </span><?php echo $Offer['prix_offer'] ?> $</p>
        </div>
    <?php endif; ?>  

<h2 class="checkout">Checkout</h2>
<h3>Ship To Address</h3>

<div class="pay_form">
  <div class="ship_adress">
    <hr>

    <form action="" method="post">

      <input type="text" name="id" value='<?php echo $Book['id'] ?>' hidden>
      <input type="text" id="RestInStorage" name="quantity" value='<?php echo $Book['quantity'] - 1 ?>' hidden>
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
            <button type="submit" name="submit">Confirm</button>
        </div>
    </div>
  </div>

<div class="master_paypal">

  <div class="method_paiment">
  <input type="radio" name="paiment">
    <img src="../Images/paypal.png" alt="">
    <div class="paypal_card">
        <input type="text" placeholder="  Paypal email address" >
        <input type="text" placeholder="  Confirm paypal email address" >
    </div>         
  </div>

  <div class="method_paiment master_card">
  <input type="radio" name="paiment">
    <img src="../Images/master_card.png" alt="">
    <div class="paypal_card">
        <input type="text" placeholder="  Card number" >
        <input type="text" placeholder="  Cardholder Name" >
        <div class="date_card">
            <input type="text" placeholder=" MM" >
            <input type="text" placeholder="  YY" >
        </div>
        <input type="text" placeholder="  CVV" >
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
    if(value<10){
        value++;
            document.getElementById('number').value = value;
            document.getElementById('total').innerHTML = value * <?php echo $Book['prix_book'] ?>;
            document.getElementById('RestInStorage').value = <?php echo $Book['quantity'] ?> - value ;
    }
}
function decrementValue()
{
    // var value = parseInt(document.getElementById('number').value, 10);
    value = isNaN(value) ? 0 : value;
    if(value>1){
        value--;
            document.getElementById('number').value = value;
            document.getElementById('total').innerHTML = value * <?php echo $Book['prix_book'] ?>;
            document.getElementById('RestInStorage').value = <?php echo $Book['quantity'] ?> - value ;
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
