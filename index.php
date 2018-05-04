
<?php 
  session_start();

  
  if(!isset($_SESSION['SessionType'])){
      header('location: interface/login.php');
  } else {
    if($_SESSION['SessionType'] == "Admin")
      header('location: interface/adminDashboard.php');
    else if($_SESSION['SessionType'] == "Agent")
      header('location: interface/agentDashboard.php');
    else 
      header('location: interface/login.php');
  }

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>


<div class ="panel panel-default">
  


  <p class="panel-header"></p>
  <ul class="panel-body">
      <li><a href="interface/adminDashboard.php">AdminDashboard</a></li>
      <li><a href="interface/agentDashboard.php">AgentDashboard</a></li>
  </ul>
</div>
  </body>
</html>
