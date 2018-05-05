<?php

//The Navbar Structure depends on weither the user is connected an Admin or an Agent


  if(isset($_SESSION['SessionType'])) {

  echo '
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
        <a class="navbar-brand" href="/webProject/index.php">Brand</a>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              
        <ul class="nav navbar-nav navbar-right">';
        if($_SESSION["SessionType"] == "Agent")
               echo  '<li><a href="#">User Profile</a></li>';
        else if($_SESSION['SessionType'] == "Admin")
               echo  '<li><a href="#">Admin configs</a></li>';
        echo  '<li><a href="/webProject/includes/controller/disconnect.php">Disconnect</a></li>
        </ul>
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </nav> ';

} else {
  //Don't show anything
}



?>