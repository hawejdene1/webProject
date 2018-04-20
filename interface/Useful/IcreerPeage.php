
<!DOCTYPE html>
<html>
<head>
    <title>creer peage</title>
    <meta charset="UTF-8">
</head>
<body>
<h1>creer peage</h1>

<form method="post" action="../controller/creerPeage.php">
    <fieldset>
        <h2>extends line</h2>

            <p>

                <label for="linename">Dans quel ligne ?</label><br />
                <select name="linename" id="linename"
                <?php if (isset($_GET['linename'])){echo 'style="visibility: hidden"';} ?>>


                    <?php
                    if (isset($_GET['linename']))
                    {echo '<input type="text" name="linename" value="'.$_GET['linename'].'" readonly>';
                    echo 'hide';
                    }else{
                    foreach($lines as $line){
                        echo '<option value="'.$line.'">'.$line.'</option>';
                    }}

                    ?>
                 <input type="submit" name="submit" value="ligne">

                </select>
            </p>

        <?php
        if (isset($staionsTerminalName) ){
            ?>
        <label for="old">choisir enceine extrémité</label><br />
        <select name="old" id="old">
            <?php
            foreach($staionsTerminalName  as $staionTerminalName){
                echo '<option value="'.$staionsTerminalName.'">'.$staionTerminalName.'</option>';
            }

            ?>
        </select>
    </fieldset>
<fieldset>
          <h2>nouvelle station</h2>
            <label for="new">station 1<input type="text" name="new"></label>
        <label for="dist">distance de station 2 par rapport enceine extremité<input type="number" name="dist"></label>

        <label for="priceCat1St1" >prix cat 1<input type="number" name="priceCat1St1"></label>
        <label for="priceCat2St1">prix cat 2<input type="number" name="priceCat2St1"></label>
        <label for="priceCat3St1">prix cat 3<input type="number" name="priceCat3St1"></label>

    </fieldset>

    <input type="submit" name="submit" value="peage" name="peage">
    <?php
        }else{}
        ?>

</form>
</body>
</html>