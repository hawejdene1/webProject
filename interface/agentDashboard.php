<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Agent Dashboard</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="../res/css/styleDashboard.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
    integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

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
        <nav class="navbar navbar-default navbar-fixed-side">
         <?php include "..\includes\interface\\sideNavAgentInfo.php"; ?>     
        </nav>
      </div>
      <div class="col-sm-9 col-lg-10 ">
      <!-- your page content -->
        <h2>Welcome to the Highway Station</h2>
        <h1><!-- getNomPeage()--> Sousse </h1>

        <p>Choose one of the functionnalities</p>
        <div class="btn-group btn-group-justified agentButtons" role="group" aria-label="...">
        <div class="btn-group" role="group">  
          <button type="button" class="btn btn-default" id="entryBtn">Station Entry</button>
        </div>
        <div class="btn-group" role="group">
          <button type="button" class="btn btn-default" id="exitBtn">Station Exit</button>
        </div>
        </div>
      </div>
      </div>
    </div>

    <div class="container-fluid inputPanel row hidden" id="entryPanel">
      <!--Form that's going to be here-->
      <div class="col-md-4"></div>
      <div class="entryForm col-md-4">
      </div>
      <div class="col-md-4"></div> 
    </div>


  <div class="container-fluid row">
        <div class="col-md-4"></div>
        <!--Form that's going to be here-->
        <div class="col-md-4 panel">
                <form action="" method="post" class="exitForm">
                  <div class="form-group">
                  <label for="ticketNum">Ticket Number</label>
                  <input type="text" name="ticketNum" class="form-control" id="ticketNum" placeholder="Ticket N°" />
                  <button type="submit" class="btn btn-default">Check Ticket</button>
                </form>

                <form action="" method="post" class="entryForm hidden">
                  <select name="carType" id="selectCarType">
                    <option value="touristic">Touristic</option>
                    <option value="van">Van</option>
                    <option value="truck">Truck</option>
                    <option value="bus">Bus</option>
                    <option value="personal">Personal</option>
                  </select>
                  <button type="submit" class="btn btn-default">Get Ticket</button>
                </form>
          </div>
        </div> 
        <div class="col-md-4"></div>
      </div>


      
     

    

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="../res/js/bootstrap.min.js"></script> 
    <script src="../res/js/dashboard.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
  </body>
</html>
