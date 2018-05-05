<?php

include "../../includes/controller/creerLigne.php" ?>


<!DOCTYPE html>
  <html>
    <head>
        <title>Add Line</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="../../res/css/styleForm.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" 
        integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    </head>
    <body>
    <?php include "../../includes/interface/navbar.php"; ?>

    <div class="container">
            <div class="page-header">
                <?php if (isset($message)) echo $message ; ?>
                <h1>Add line <small>adding the initial stations that constitute the line</small></h1>
            </div>
   
    <form method="post" action=" "> <!-- action="../controller/creerLigne.php" -->
    <div class="panel panel-default">
            
            <div class="panel-body">
                    <div class="form-group panel-primary">
                        <div class="panel-body">
                         <label class="control-label col-sm-8" for="linename">linename</label>
                         <div class="col-sm-4 input-group"> 
                            <input class="form-control" type="text" name="linename">
                         </div> 
                        
                         <label class="control-label col-sm-8" for="name1">station 1</label>
                         <div class="col-sm-4 input-group"> 
                            <input class="form-control" type="text" name="name1"> 
                        </div>
                        
                         <label class="control-label col-sm-8" for="name2">station 2</label>
                         <div class="col-sm-4 input-group"> 
                            <input class="form-control" type="text" name="name2"> 
                        </div>
                        
                         <label class="control-label col-sm-8" for="dist">distance de station 2 par rapport station 1</label>
                         <div class="col-sm-4 input-group"> 
                            <input class="form-control" type="text" name="dist"> 
                        </div>
                    </div>
                    </div>
                    
                    <div class="form-group panel-primary">
                        <div class="panel-heading">station 1 detaille</div>
                        <div class="panel-body">
                            <label class="control-label col-sm-8" for="priceCat1St1">prix cat 1</label>
                            <div class="col-sm-4 input-group"> 
                                <input class="form-control" type="number" name="priceCat1St1"> 
                                <span class="input-group-addon">TND</span>
                            </div>
                            
                            <label class="control-label col-sm-8" for="priceCat2St1">prix cat 2</label>
                            <div class="col-sm-4 input-group"> 
                                <input class="form-control" type="number" name="priceCat2St1"> 
                                <span class="input-group-addon">TND</span>
                            </div>
                            
                            <label class="control-label col-sm-8" for="priceCat3St1">prix cat 3</label>
                            <div class="col-sm-4 input-group"> 
                                <input class="form-control" type="number" name="priceCat3St1"> 
                                <span class="input-group-addon">TND</span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group panel-primary">
                        <div class="panel-heading">station 2 detaille</div>
                        <div class="panel-body">
                            
                             <label class="control-label col-sm-8" for="priceCat1St2">prix cat 1</label>
                             <div class="col-sm-4 input-group"> 
                                <input class="form-control" type="text" name="priceCat1St2"> 
                                <span class="input-group-addon">TND</span>
                            </div>
                            
                             <label class="control-label col-sm-8" for="priceCat2St2">prix cat 2</label>
                             <div class="col-sm-4 input-group"> 
                                <input class="form-control" type="text" name="priceCat2St2"> 
                                <span class="input-group-addon">TND</span>
                            </div>
                            
                             <label class="control-label col-sm-8" for="priceCat3St2">prix cat 3</label>
                             <div class="col-sm-4 input-group"> 
                                <input class="form-control" type="text" name="priceCat3St2">
                                <span class="input-group-addon">TND</span> 
                            </div>
                        </div>
                     </div>
            </div>
            <div class="panel-footer">

                <div class="text-center"><button class="btn btn-primary" type="submit" value="addLine">Add line</button><br /><br />

                <a class="text-center" href="../adminDashboard.php">Get back to the Homepage</a></div>
            </div>
    </div>
    </form>
    </div>

    </body>
</html>