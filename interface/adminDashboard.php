<?php 
session_start();

if($_SESSION['SessionType']!="Admin")
  header("location: ../index.php");
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Admin Dashboard</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="/webProject/res/css/styleDashboard.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
    integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style type="text/css">
    
    </style>
  </head>
  <body>



    <?php include "..\includes\interface\\navbar.php"; ?>

<?php 
if(!isset($_SESSION['SessionType']) || $_SESSION['SessionType']!="Admin") 
  header("location: ../index.php");
?>
    <div class="container">
    <div class="jumbotron" id="adminJumbotron" style="background: url('/webProject/res/css/images/highway_bg2.jpg') center no-repeat stretch">
      <h1>Welcome to the Highway Administration system</h1>
      <p>     </p>
    </div> 


     <!-- your page content -->
        
     
   
<!-- Options for addind NEW STATIONS OR LINES -->
      <div class="panel panel-default adminPanel">
        <div class="panel-heading">Stations' Management</div>
        <div class="panel-body">
          <div class="btn-group btn-group-justified agentButtons" role="group" aria-label="...">
          <div class="btn-group" role="group">
            <a href="adminDashboard/addStation.php"><button type="button" class="btn btn-default choiceBtn" id="addStation">Add Station</button></a>
          </div>
          <div class="btn-group" role="group">
              <a href="adminDashboard/deleteStation.php"><button type="button" class="btn btn-default choiceBtn" id="deleteStation">Delete Station</button></a>
          </div>
        </div>
        </div>
      </div>
     

<!-- Options to manae existing STATIONS OR LINES-->
      <div class="panel panel-default adminPanel">
        <div class="panel-heading">Lines' Management</div>
        <div class="panel-body">
          <div class="btn-group btn-group-justified agentButtons" role="group" aria-label="...">
          <div class="btn-group" role="group">
           <a href="adminDashboard/addLine.php"> <button type="button" class="btn btn-default choiceBtn" id="addLine">Add Line</button></a>
          </div>
          <div class="btn-group" role="group">
            <a href="adminDashboard/deleteLine.php"><button type="button" class="btn btn-default choiceBtn" id="deleteLine">Delete Line</button></a>
          </div>
                  </div>
        </div>
      </div>


<!-- Options to manage the prices-->
<div class="panel panel-default adminPanel">
        <div class="panel-heading">Machines' management</div>
        <div class="panel-body">
          <div class="btn-group btn-group-justified agentButtons" role="group" aria-label="...">
            <div class="btn-group" role="group">
              <a href="adminDashboard/addMachine.php"><button type="button" class="btn btn-default choiceBtn" id="addMachine">Add Machine</button></a>
            </div>     
        </div>
        </div>
</div>
      

<!-- Options to update prices -->
<div class="panel panel-default adminPanel">
        <div class="panel-heading">Prices' management</div>
        <div class="panel-body">
          <div class="btn-group btn-group-justified agentButtons" role="group" aria-label="...">
          <div class="btn-group" role="group">
           <a href="adminDashboard/updatePrice.php"> <button type="button" class="btn btn-default choiceBtn" id="updatePrice">Update Price</button></a>
          </div>
          <div class="btn-group" role="group">
            <a href="adminDashboard/updateGPrice.php"><button type="button" class="btn btn-default choiceBtn" id="updateGPrice">Update General Price</button></a>
          </div>
        </div>
        </div>
      </div>

<!-- Options to manage AGENTS -->
      <div class="panel panel-default adminPanel">
        <div class="panel-heading">Agents' Management</div>
        <div class="panel-body">
          <div class="btn-group btn-group-justified agentButtons" role="group" aria-label="...">
            <div class="btn-group" role="group">
              <a href="adminDashboard/addAgent.php"><button type="button" class="btn btn-default choiceBtn" id="addAgent">Add Agent</button></a>
            </div>
            <div class="btn-group" role="group">
              <a href="adminDashboard/updateAgent.php"><button type="button" class="btn btn-default choiceBtn" id="updateAgent">Update Agent</button></a>
            </div>
            <div class="btn-group" role="group">
              <a href="adminDashboard/deleteAgent.php"><button type="button" class="btn btn-default choiceBtn" id="deleteAgent">Delete Agent</button></a>
            </div>
          </div>
        </div>
      </div>




<!-- This is a one Page Website -->



      <div class="modal">
        <div class="modal-content">
        <span class="close">&times</span>
        <!-- The forms that are going to be charged-->
        <div class="model-content-main">
          
        
        </div>
        



        </div>
      </div>

    

    <script src="../res/js/adminDashboard.js"></script>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="/webProject/res/js/bootstrap.min.js"></script> -->
    <!-- Include all compiled plugins (below), or include individual files as needed -->
  </body>
</html>
