<?php
if (!isset($_SESSION)) {
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
    <link rel="stylesheet" href="../Style/whyUs.css">
    <title>Why Us</title>
</head>

<body>

        <!-- header -->
    <?php require_once 'home_nav_bar.php'; ?>  

    <h2 data-aos="fade-up">Why Choose Us?</h2>

    <h3 data-aos="fade-right">1.We make it easy to find the book that you want.</h3>
    <p data-aos="fade-right" class="why_us">
        &emsp; Buying your book on your own is not an easy task. Not only do you need to compare offers, 
        but you need to evaluate the reliability of buyers and also keep an eye on the buying process until you get paid. 
        Furthermore, in the case that you get paid less than the quote offered to you, it’s quite difficult to solve this issue alone.
        Reading Time makes this easy by solving all these problems and offering everything you need in one place.
    </p>

    <h3 data-aos="fade-right">2. We ensure an easy buying process.</h3>
    <p data-aos="fade-right" class="why_us">
        &emsp; Our Buying  process is extremely easy. Because the value of your book changes every day or even every hour based on buyer needs, 
        book usage in the following semester, and national demand, students need to compare their book value from as many buyers as 
        possible so that they can be but the  lesser price for their book. On  Reading Time, we do all that for you, so all you have 
        to do is type in the ISBN of your book and we rank your offers from high to low along with buyer ratings.
    </p>

    <h3 data-aos="fade-right">3. We provide a wide network of reliable book-buying companies.</h3>
    <p data-aos="fade-right" class="why_us">
        &emsp; To find the most reliable book-buying companies, you would have to search individual buyers’ websites and investigate 
        the reliability of each buyer. How do you even know where to look or who to trust? That’s where we come in. 
        We’ve been in the textbook industry for over 20 years, so we know which book-buying companies are reliable. 
        On Reading Time, we provide a huge network of reputable buyers to get you the best deal in a reliable and easy way.
    </p>

    <h3 data-aos="fade-right">4. We protect you.</h3>
    <p data-aos="fade-right" class="why_us">
        &emsp; Reading Time offers a unique feature called Download Book Photos. In the buying process, 
        you can use this with your mobile device to download photos of our books as evidence that you sent the correct 
        book in the correctly described condition.
    </p>

    <h3 data-aos="fade-right">5. We guarantee you’ll get your book.</h3>
    <p data-aos="fade-right" class="why_us">
        &emsp; Not only have we chosen buyers that we deem are reliable, but we also promise reliability by following up on 
        everything from the moment you type in your ISBN to the moment you get your book. Sometimes, disputes happen 
        between a You and Us usually about the accuracy of the book’s identity or the condition or quality of the book. 
        Reading Time Guarantee protects you when you sell items to buyers if we determine that you’ve followed our Selling Guidelines.
    </p>

        <!-- footer -->
        <?php require_once 'footer.php'; ?>


    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>
</html>