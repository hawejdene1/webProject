<!DOCTYPE html>
  <html>
    <head>
        <title>creer ligne</title>
        <meta charset="UTF-8">
    </head>
    <body>
    <h1>creer ligne</h1>
     <form method="post" action="../controller/creerLigne.php">
        <fieldset>
         <label for="linename">linename<input type="text" name="linename"></label>
         <label for="name1">station 1<input type="text" name="name1"></label>
         <label for="name2">station 2<input type="text" name="name2"></label>
         <label for="dist">distance de station 2 par rapport station 1<input type="text" name="dist"></label>
        </fieldset>
        <fieldset>
            <p>station 1 detaille</p>
            <label for="priceCat1St1">prix cat 1<input type="number" name="priceCat1St1"></label>
            <label for="priceCat2St1">prix cat 2<input type="number" name="priceCat2St1"></label>
            <label for="priceCat3St1">prix cat 3<input type="number" name="priceCat3St1"></label>

        </fieldset>
         <fieldset>
             <p>station 2 detaille</p>
             <label for="priceCat1St2">prix cat 1<input type="text" name="priceCat1St2"></label>
             <label for="priceCat2St2">prix cat 2<input type="text" name="priceCat2St2"></label>
             <label for="priceCat3St2">prix cat 3<input type="text" name="priceCat3St2"></label>

         </fieldset>
       <input type="submit" value="creer ligne">
     </form>
    </body>
</html>