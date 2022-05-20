<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Style/books.css">
    <title>test</title>
</head>
<body>
     

    <div>
        <button name="submit" id="pannelCrud">        
            <img id="pannel" src="../Images/pannel.png" alt="" >
        </button>
    </div>



<script>
    const src1 = "http://localhost/FileRouge/ReadingTime/View/Images/pannel.png"
    const src2 = "http://localhost/FileRouge/ReadingTime/View/Images/fullpannel.png"

    const pannel = document.getElementById('pannel')
    console.log(pannel.src)

    pannel.addEventListener('click', ()=>{
        (pannel.src === src1) ? pannel.src = src2 : pannel.src = src1     
    })


    const name1 = "submit"
    const name2 = "deletePannelProduct"

    const pannelCrud = document.getElementById('pannelCrud')
    console.log(pannelCrud.name)

    pannelCrud.addEventListener('click', ()=>{
        (pannelCrud.name === name1) ? pannelCrud.name = name1 : pannelCrud.name = name2    
    })
    



</script>
    
</body>
</html>