<<<<<<< HEAD
<?php session_start(); ?>

=======
<?php

?>
>>>>>>> c99c6d51d02914fca9e91f5a0812812ebddc7bf0

<!DOCTYPE html>

<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login Agent</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <link rel="stylesheet" href="../res/css/styleForm.css">
  </head>
  <body>
    
    <form action="../includes/controller/Clogin.php" method="POST" class="loginForm">
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
          <input class="form-check-input" type="radio" name="radioPriviledges" id="radioAgent" value="Agent" checked>
          <label class="form-check-label" for="radioAgent"> Agent</label>
        </div>
        <div class="form-check col-md-4">
          <input class="form-check-input" type="radio" name="radioPriviledges" id="radioAdmin" value="Admin">
          <label class="form-check-label" for="radioAdmin"> Admin</label>
        </div>
      </div>
        <div class="panel-footer">
            <div class="text-center"><button class="btn btn-primary" type="submit" value="submit">Sign in</button><br /><br/>
        </div>
    </div>



    <?php
      if(isset($_SESSION['errorMessages'])) {
        echo "
        <div class='alert alert-danger' role='alert'>
                  ".$_SESSION['errorMessages']."
        </div>";
        
      }

      unset($_SESSION['errorMessages']);
    ?>



    </form>





  </body>

</html>