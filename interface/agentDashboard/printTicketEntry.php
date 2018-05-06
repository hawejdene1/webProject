


<?php


require_once "../../includes/controller/CEntry.php";

if(!isset($_SESSION['SessionType']) || $_SESSION['SessionType']!="Agent") 
  header("location: ../index.php");

?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Print ticket</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
    integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="/webProject/res/css/styleTicket.css">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>




    <div  class="container" id="ticketPrint">
                <div class="panel panel-default">
                  <div class="panel-heading">
                        <h3 class="panel-title">Ticket Details</h3>
                  <div class="modal-body">
                    <div id="page">
                        <?php
                        if($details!=false) {


                            ?>
                            <label>Ticket N°:</label> <?= $details["num"] ?>
                            <br>

                            <label>Entry time:</label><?= $details["dateEntree"] ?>
                            <br>

                            <label>Category:</label>
                            <?= $details["categorie"] ?>

                            <br>

                            <label>Entry station:</label>
                            <?= $details["nomStationDepart"] ?>
                            <br>

                            <label>Line:</label>
                            <?= $nomLigne ?>
                            <br>

                            <?php
                        }
                        else echo "<div class='alert alert-danger'> station does not exist </div>";
                        ?>
                        </div>
                  </div>
                  <div class="modal-footer">
                       <div class="row">
                       <div class="col-md-4"></div> 
                            <button type="button" value="imprimer" onClick="window.print()" class="btn btn-primary">Print</button>
                            <a href="/webProject/interface/adminDashboard.php"><button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button></a>
                       <div class="col-md-4"></div> 
                      </div>
                </div>
                </div>
              </div>
    </div>



  </body>
</html>
