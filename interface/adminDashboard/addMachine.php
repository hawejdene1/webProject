<?php require_once "../../includes/controller/CAddMachine.php"; ?>


    
<!DOCTYPE html>
  <html>
    <head>
        <title>Add Machine</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
        integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" href="../../res/css/myStyle.css">
    </head>
    <body>
    <?php include "../../includes/interface/navbar.php"; ?>

    <div class="container">
            <div class="page-header">
                <h1>Add Machine <small>Adding a machine and associating it to an agent</small></h1>
            </div>
   

            <form id="addMachine" action="" method="POST" class="form-horizontal">
            <div class="panel panel-default">
                <!--This part is for setting wetheir to accept machine requests or not -->
                <div class="panel-heading">
                    <form action="/webProject/includes/controller/CAddMachine.php" method="POST" id="requestsAccepting">
                    <button class="btn btn-danger" name="stopRequests" form="requestsAccepting" value="false">Stop Accepting Requests</button>
                    <button class="btn btn-success" name="startRequests" form="requestsAccepting" value="true">Start Accepting Requests</button></form>
                </div>
                <div class="panel-body">
            
                    
                    <!--Selectionner Ligne-->
                    <!--Selection Station-->
                    <!--Taper id de la machine-->
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

    </body>
</html>

