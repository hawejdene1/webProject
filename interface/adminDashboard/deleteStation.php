
<?php require_once "../../includes/controller/CDeleteStation.php" ?>


<!DOCTYPE html>
  <html>
    <head>
        <title>delete station</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
        integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    </head>
    <body>
    <?php include "../../includes/interface/navbar.php"; ?>

    <div class="container">
            <div class="page-header">
                <h1>Deleting Station <small>deleting a station from an existing line</small></h1>
            </div>
   

            <form id="deleteStation" action="" method="POST">
            <div class="panel panel-default">
              
                <div class="panel-body">
                
                    <!-- Selectionner la ligne concernée -->
                    <!-- Selectionner la station concernée-->
                    <!-- Submit response -->

                    <?=$form?>
                </div>

                <div class="panel-footer">
                    <div class="text-center">
                    <?=$formButton?>
                    <br /><br />
                    <a class="text-center" href="../adminDashboard.php">Get back to the Homepage</a></div>
                </div>
            </div>
            </form>
    </div>

    </body>
</html>
