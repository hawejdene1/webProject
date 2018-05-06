<?php


require_once "../includes/controller/Cout.php";

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
    <title>Agent Dashboard</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
    integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="../res/css/styleDashboard.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>


<?php include "..\includes\interface\\navbar.php"; ?>
   

    <div class="container-fluid">
      
      <div class="row">
      <div class="col-sm-3 col-lg-2">
         <?php include "..\includes\interface\\sideNavAgentInfo.php"; ?>     
      </div>
      <div class="col-sm-9 col-lg-10 ">
      <!-- your page content -->
        <h2>Welcome to the Highway Station</h2>
        <h1><?=$_SESSION['Station']?> </h1>

        <p>Choose one of the functionnalities</p>
        <div class="btn-group btn-group-justified agentButtons" role="group" aria-label="..." >
        <div class="btn-group" role="group">  
          <button type="button" class="btn btn-danger" href="#exitPanel" id="exitBtn">Station Exit</button>
        </div>
        <div class="btn-group" role="group">
          <button type="button" class="btn btn-success" id="entryBtn">Get Ticket</button>
        </div>
        </div>
      </div>
      </div>
     



  <div class="container-fluid row">
        <div class="col-md-4"></div>
        <!--This panel is for creating and printing a ticket-->
        <div class="col-md-4">
        <div class="panel panel-default hidden" id="exitPanel">          
          <div class="panel-heading"></div>
          <div class="panel-body">
                <form action=" " method="post" class="exitForm">
                  <div class="form-group">
                  <label for="ticketNum">Ticket Number</label>
                  <input type="text" name="ticketNum" class="form-control" id="ticketNum" placeholder="Ticket N°" required/>
                  <button type="submit" class="btn btn-success" name="entry">Check Ticket</button>

                  <!--<button type="reset" class="btn btn-default">Reset</button>-->

                  </div>
                </form>
          </div>
         </div>
         <!--The Panel for entring the ticket number and exiting the station-->
          <div class="panel panel-default hidden" id="entryPanel">          
          <div class="panel-heading"> </div>
          <div class="panel-body">
                <form action="../includes/controller/CEntry.php" method="post" class="entryForm">
                  <div class="form-group">
                  <label for="selectCarType">Car Category</label>
                  <select name="carType" id="selectCarType" class="form-control">
                    <option value="Motos">Motos</option>
                    <option value="twoAxles">Vehicles with 2 axles</option>
                    <option value="treeAxles">Vehicles with 3 axles</option>
                  </select>
                  <button type="submit" class="btn btn-default" name="exit">Station Exit</button>
                  </div>
                </form>
          </div>
        </div>
        <!--The Panel is for displaying the final price-->
        <div class="panel panel-default" >          
          
          <div class="panel-body" id="infosTable">

                      <?php
                        if(isset($form))
                            echo $form;
                      ?>
                
          </div>
         </div>
        <div class="col-md-4"></div>
        </div>
    </div>  


</div>


      
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
  Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade">
  <div id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
</div>




</div>





    <script src="../res/js/bootstrap.min.js"></script> 
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!--script src="../res/js/agentDashboard.js"></script-->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed --> 
  </body>
</html>
