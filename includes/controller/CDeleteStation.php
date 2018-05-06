<?php
require_once dirname(dirname(__FILE__)) . "/api/StationManagementAPI.php" ;
    //Session check
    
session_start();

if ($_SESSION['SessionType']=="Admin") {


if(!isset($_SESSION['SessionType']) || $_SESSION['SessionType'] != "Admin") { 
    header("location: ../../index.php");
} else {

        //To make sure that we were in this page ulterierly, we 
        // will use a SESSION variable to test the last page 

    $form = "";
    $formButton = "";

    $linename=getLines();


    if($linename===true) {

        $form = "<div><h1>" . "empty Data Base" . "</h1></div>";
    }else{


    if($_SERVER['REQUEST_METHOD']=='POST') {


        // IF the user had already chosen a Line to update
        //Do something to get the station on the line 
        if(isset($_POST['linename'])) {

            $_SESSION['linename']=$_POST['linename'];

            $formButton = '<button class="btn btn-primary" name="deleteStationBtn" type="submit">Delete Station</button>';
            $form .= "<div class='radio'>";

            $stations=getStationsInLine($_POST['linename']);
            foreach ($stations as $value) {
                $form .= "<label class='checkbox list-group-item'>
                      <input name='optionsStation' type='radio' value='{$value}'> {$value}
                      </label>";
                  }
            $form .="</div>";
        } else if (isset($_POST['optionsStation'])) {


                //Write down weither the deleting succeeded or failed

        if(isset($_SESSION['linename'])) {
        $message = deleteStation($_POST['optionsStation'], $_SESSION['linename']);

        unset($_SESSION['linename']);

            $form .= '<div class="alert alert-warning">' . $message . '</div>';


    }

        } else {
            header("location: ../../interface/errorPage.php");
        }

    } else {
        //IF the user access the page for the first time (the line was not chosen)


            $formButton = '<button class="btn btn-primary" type="submit" name="selectLineBtn">Select Line</button>';
            $form .='<select class="form-control" name="linename" form="deleteStation">';
            foreach ($linename as $value) {
                $form .="<option value='{$value}'>{$value}</option>";
            }     
            $form .="</select>";


    }}

    
}
} else {
    header("location: ../../index.php");}
