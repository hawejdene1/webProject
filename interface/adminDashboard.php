<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Admin Dashboard</title>

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
     <!-- your page content -->
        <h2>Welcome to the Highway administration page</h2>

        <p>Choose one of the functionnalities</p>
        
        
     <div class="cd-panel cd-panel--from-right js-cd-panel-main">
   <header class="cd-panel__header">
      <h1>Title Goes Here</h1>
      <a href="#0" class="cd-panel__close js-cd-close">Close</a>
   </header>

   <div class="cd-panel__container">
      <div class="cd-panel__content">
         <!-- your side panel content here -->
      </div> <!-- cd-panel__content -->
   </div> <!-- cd-panel__container -->
</div> <!-- cd-panel -->
      

<!-- Options for addind NEW STATIONS OR LINES -->
      <div class="panel panel-default">
        <div class="panel-heading">New Stations/Lines</div>
        <div class="panel-body">
          <div class="btn-group btn-group-justified agentButtons" role="group" aria-label="...">
          <div class="btn-group" role="group">
            <button type="button" class="btn btn-default">Add Line</button>
          </div>
          <div class="btn-group" role="group">
            <button type="button" class="btn btn-default">Add Station</button>
          </div>
          <div class="btn-group" role="group">
            <button type="button" class="btn btn-default">Add Machine</button>
          </div>
        </div>
        </div>
      </div>
     

<!-- Options to manae existing STATIONS OR LINES-->
      <div class="panel panel-default">
        <div class="panel-heading">New Stations/Lines</div>
        <div class="panel-body">
          <div class="btn-group btn-group-justified agentButtons" role="group" aria-label="...">
          <div class="btn-group" role="group">
            <button type="button" class="btn btn-default">Delete Station</button>
          </div>
          <div class="btn-group" role="group">
            <button type="button" class="btn btn-default">Update Distance</button>
          </div>
          <div class="btn-group" role="group">
            <button type="button" class="btn btn-default">Update Price per Station</button>
          </div>
          <div class="btn-group" role="group">
            <button type="button" class="btn btn-default">Update Price for all</button>
          </div>
        </div>
        </div>
      </div>


<!-- Options to manage AGENTS -->
      <div class="panel panel-default">
        <div class="panel-heading">New Stations/Lines</div>
        <div class="panel-body">
          <div class="btn-group btn-group-justified agentButtons" role="group" aria-label="...">
            <div class="btn-group" role="group">
              <button type="button" class="btn btn-default">Add Agent</button>
            </div>
            <div class="btn-group" role="group">
              <button type="button" class="btn btn-default">Update Agent</button>
            </div>
            <div class="btn-group" role="group">
              <button type="button" class="btn btn-default">Delete Agent</button>
            </div>
          </div>
        </div>
      </div>

    

    <script src="../res/js/adminDashboard.js"></script>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="../res/js/bootstrap.min.js"></script> 
    <!-- Include all compiled plugins (below), or include individual files as needed -->
  </body>
</html>
