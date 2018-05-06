<?php

//The Navbar Structure depends on weither the user is connected an Admin or an Agent


  if(isset($_SESSION['SessionType'])) {

  echo '
  <nav>  
    <div class="container-fluid navbar">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed btn-hamburger" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand"  id="brand" href="/webProject/index.php"><img style="max-width: 50px; margin: 0;" src="/webProject/res/images/logoIcoWhite.png"></a>
        <p class="navbar-text">Signed in as an '.$_SESSION['SessionType'].'</p>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              
        <ul class="nav navbar-nav navbar-right">
        <li><a id="disconnect" href="/webProject/includes/controller/disconnect.php">Disconnect</a></li>
        </ul>
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </nav> 
 

  <style>

    #brand:hover, #disconnect:hover {
        background: #455A6F;
      }
    #disconnect {
      color: #eee;
    }
  #brand {
      padding: 0 !important;
      padding-right: 25px !important;
      padding-left: 25px !important;
      }

    .navbar-text {
      
      color: #ddd;
    }

    nav {
      background: #34495e !important;
    }

  

    .icon-bar {
      background: #eee;
    }
  </style>


  ';

} else {
  //Don't show anything
}



?>