<?php


session_start();


require_once dirname(dirname(__FILE__)) . "/api/AgentAPI.php" ;
require_once dirname(dirname(__FILE__)) . "/API/MachineRequestAPI.php";
require_once dirname(dirname(__FILE__)) . "/api/StationManagementAPI.php" ;
    //Session check
    
if(!isset($_SESSION['SessionType']) || $_SESSION['SessionType'] != "Admin") { 
    header("location: ../../index.php");
} else {

    //To make sure that we were in this page ulterierly, we 
    // will use a SESSION variable to test the last page 

$form = "";
$formButton = "";

$linename=getLines();

if(!isset($_SESSION['SessionType']) || $_SESSION['SessionType'] != 'Admin') {
    header("location: ../../index.php");
} else {

    if($linename===true) {

        $form = "<div><h1>" . "empty Data Base" . "</h1></div>";
    }else{


            if ($_SERVER['REQUEST_METHOD'] == 'POST') {


                // IF the user had already chosen a Line to update
                //Do something to get the station on the line
                if (isset($_POST['linename'])) {


                    deleteAgentInLine($_POST['linename']);
                    deleteComputerInLine($_POST['linename']);
                    $message = deleteLine($_POST['linename']);
                    $form = "<div class='alert alert-success'> $message</div>";

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
}
}