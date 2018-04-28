<style>
    #page
    {
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
<html>
<div id="page">



    num ticket :

    <?php
    echo $details["num"];
    ?>
    <br>

    heure d'enregistrement :
    <?php
    echo $details["dateEntree"];
    ?>
    <br>

    catégorie :
    <?php
    echo $details["categorie"]
    ?><br>

    station d'entrée :
    <?php
    echo $details["nomStationDepart"]
    ?>
    <br>

    <button type="submit" value="imprimer" onClick="window.print()">imprimer</button>
</div>
