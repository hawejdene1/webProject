<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login Agent</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <link rel="stylesheet" href="../res/css/styleForm.css">
  </head>
  <body>


    <form action="" method="post" class="loginForm">
    <div class="form-group">
    <div class="row">
      <label class="col-md-4" id="inputAgentLogin">Login</label>
      <input class="col-md-8 form-control" type="text" name="agentLogin" placeholder="Agent Login" id="inputAgentLogin" required>
    </div>

    <div class="row">
      <label class="col-md-4" id="inputAgentPwd">Mot de passe</label>
      <input class="col-md-8 form-control" type="password" name="agentPwd" placeholder="Agent Password" id="inputAgentPwd" required>
    </div>
    </div>
    <div class="form-group">
      <div class="row">
        <label class="col-md-4">Privilèges</label>
        <div class="form-check col-md-4">
          <input class="form-check-input" type="radio" name="radioPriviledges" id="radioAgent" checked>
          <label class="form-check-label" for="radioAgent"> Agent</label>
        </div>
        <div class="form-check col-md-4">
          <input class="form-check-input" type="radio" name="radioPriviledges" id="radioAdmin">
          <label class="form-check-label" for="radioAdmin"> Admin</label>
        </div>
      </div>

    </div>


    <?php
        echo '
        <div class="alert alert-danger" role="alert">
                  Alert Messages;
        </div>';
    ?>



    </form>





  </body>
</html>


<ul>
    <li><a href="interface/adminDashboard.php">AdminDashboard</a></li>
    <li><a href="interface/allAdminForms.html">AllAdminForms</a></li>
    <li><a href="interface/agentDashboard.php">AgentDashboard</a></li>
    <li><a href="interface/entryButton.php">EntryButton</a></li>
    <li><a href="interface/exitButton.php">ExitButton</a></li>
    <li><a href="interface/login.php">Login</a></li>



</ul>