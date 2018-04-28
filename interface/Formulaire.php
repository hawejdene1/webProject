<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" >
    <title>Title</title>
    <style>

        #monForm{
            position:absolute;
            top:50%;
            left:50%;
            width:400px;
            height:400px;
            margin-left:-150px;
            margin-top:-100px;
            backface-visibility:visible;

        }



    </style>
</head>





<body >

<form method="post" action="../includes/controller/CEntry.php" id="monForm"> <br>

    choisir la catégorie : <br>
    <input type="radio" name="categorie" value="categ1" required>Véhicules légers <br>
    <input type="radio" name="categorie" value="categ2" required>categ2<br>
    <input type="radio" name="categorie" value="categ3" required>categ3<br>
    <button type="submit" value="submit" href="Imprimer.php">submit</button>

</form>

</body>
</html>