
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

<ul>
    <li><a href="interface/adminDashboard.php">AdminDashboard</a></li>
    <li><a href="interface/allAdminForms.html">AllAdminForms</a></li>
    <li><a href="interface/agentDashboard.php">AgentDashboard</a></li>
    <li><a href="interface/entryButton.php">EntryButton</a></li>
    <li><a href="interface/exitButton.php">ExitButton</a></li>
    <li><a href="interface/login.php">Login</a></li>



</ul>
  </body>
</html>
