<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Admin Dashboard</title>

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



    <nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Brand</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#">User Profile</a></li>
        <li><a href="#">Disconnect</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

    <div class="container-fluid">
     <!-- your page content -->
        <h2>Welcome to the Highway Station</h2>

        <p>Choose one of the functionnalities</p>
        
        
          

      

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

    

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="../res/js/bootstrap.min.js"></script> 
    <!-- Include all compiled plugins (below), or include individual files as needed -->
  </body>
</html>
