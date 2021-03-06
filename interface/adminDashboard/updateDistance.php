<?php require_once "../../includes/controller/CUpdateDistance.php"; ?>


    
<!DOCTYPE html>
  <html>
    <head>
        <title>Update Distance</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
        integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    </head>
    <body>
    <?php include "../../includes/interface/navbar.php"; ?>

    <div class="container">
            <div class="page-header">
                <h1>Update Distance<small>Updating Distance between two stations of the same line</small></h1>
            </div>
   

            <form id="updateDistance" action="" method="POST" class="form-horizontal">
            <div class="panel panel-default">
              
                <div class="panel-body">
                
                    <!--Selectionner Ligne-->
                    <!--Selectionner 2 stations-->
                    <!--Submission-->

                    <?=$form?>


                    <?php if(isset($_SESSION['errorMessage'])) 
                        echo '<div class="alert alert-warning">'.$_SESSION['errorMessage'].'</div>';
                        if(isset($_SESSION['message'])) 
                        echo '<div class="alert alert-warning">'.$_SESSION['errorMessage'].'</div>';
                    ?>
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

