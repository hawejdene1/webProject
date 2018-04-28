<?php
require_once dirname(dirname(__FILE__)) . "/api/StationManagementAPI.php" ;
    //Session check
    

    //array of line names




    //To make sure that we were in this page ulterierly, we 
    // will use a SESSION variable to test the last page 

$form = "";
$formButton = "";

$linename=getLines();


if($linename===true) {

    $form = "<div><h1>" . "empty Data Base" . "</h1></div>";
}else{

    $message = deleteLine($_POST['linename']);
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {


            // IF the user had already chosen a Line to update
            //Do something to get the station on the line
            if (isset($_POST['linename'])) {

<<<<<<< HEAD
                $message = deleteLine($_POST['linename']);
                $form = "<div><h1>" . $message . "</h1></div>";
=======
    // IF the user had already chosen a Line to update
    //Do something to get the station on the line 
    
    if(isset($_POST['linename'])) 
            $form="<div><h1>Result of Line deletion</h1></div>";
>>>>>>> 96c1fae99a209ed8d73e65a93efcd6f25a99afdc

            }
        } else {
            //IF the user access the page for the first time (the line was not chosen yet)


            $formButton = '<button class="btn btn-primary" type="submit" name="selectLineBtn">Delete Line</button>';
            $form .= '<select class="form-control" name="linename" form="deleteLine">';
            foreach ($linename as $value) {
                $form .= "<option value='{$value}'>{$value}</option>";
            }
            $form .= "</select>";


        }
    }