<?php require_once "../../includes/controller/CAddAgent.php"; ?>


    
<!DOCTYPE html>
  <html>
    <head>
        <title>Add Agent</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
        integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    </head>
    <body>
    <?php include "../../includes/interface/navbar.php"; ?>

    <div class="container">
            <div class="page-header">
                <h1>Add Agent <small>Adding an agent to the system</small></h1>
            </div>
   

            <form id="addAgent" action=" " method="POST" class="form-horizontal">
            <div class="panel panel-default">
              
                <div class="panel-body">
                
                    <!--Selectionner Ligne-->
                    <!--Submission-->

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


    <script src="showstaion.js"></script>
    </body>
</html>

