<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Style/books.css">
    <title>Books</title>
</head>
<body>

<div class="OurLibrary">
    <div class="OurLibrary-element">
        <img src="../Images/livre1.png" alt="">
        <p></p>
        <div class="prix-icone">
            <p>Prix: 12$</p>
            <div onclick="toggleMobilePannel(this)">
            <img src="../Images/pannel.png" alt=""  class="Pannel">
            <img src="../Images/fullpannel.png" alt="" class="fullPannel">
            </div>
        </div>
    </div>
</div>
    

<script>
        function toggleMobilePannel(Pannel) {
            Pannel.classList.toggle('playPannel');
        }
</script>

</body>
</html>