
<?php include "../../includes/controller/CAddStation.php" ?>


<!DOCTYPE html>
  <html>
    <head>
        <title>Add Line</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
        integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    </head>
    <body>
    <?php include "../../includes/interface/navbar.php"; ?>

    <div class="container">
            <div class="page-header">
                <h1>Add Station <small>adding a station to an existing line</small></h1>
            </div>
   

            <form id="addStation" action="" method="POST">
            <div class="panel panel-default">
              
                <div class="panel-body">
                
                    <!--Selectionner Ligne-->
                    <!--Afficher les anciens peages possibles  POUR SELECTIONNER UN -->
                    <!--Saisir distance avec cette station -->
                    <!--Définir prix des différentes catégories  -->
                    <!--Submission-->

                    <?=$form?>
                </div>

                <div class="panel-footer">
                    <div class="text-center">
                    <button class="btn btn-primary" type="submit"><?=$formButton?></button>
                    <br /><br />
                    <a class="text-center" href="../adminDashboard.php">Get back to the Homepage</a></div>
                </div>
            </div>
            </form>
    </div>

    </body>
</html>

