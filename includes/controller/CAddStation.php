<?php

//Session Check
session_start();

require_once dirname(dirname(__FILE__)) . "/api/StationManagementAPI.php" ;

<<<<<<< HEAD

if(!isset($_SESSION['SessionType']) || $_SESSION['SessionType'] != "Admin") { 
    header("location: ../../index.php");
} else {
    
    //$linename =  array('Sfax Tunis' => array('Sfax' ,'Tunis','Sousse'),'Tabarka Tunis2' => array('Tabarka' ,'Tunis2','Beja') ,'Sfax2 Mednine' => array('Sfax2' ,'Mednine','Gabes'));
=======
if ($_SESSION['SessionType']=="Admin") {


>>>>>>> c99c6d51d02914fca9e91f5a0812812ebddc7bf0


    $form = "";
    $formButton = "";

    $linename=getLines();


    if($linename===true) {

        $form = "<div><h1>" . "empty Data Base" . "</h1></div>";
    }else{

        if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['linename'])) {
            $_SESSION['linename'] = $_POST['linename'];
            // IF the user had already chosen a Line to update


            $formButton = '<button class="btn btn-primary" name="station" type="submit">Add Station</button>';


            //Input NEW station name
            $form .= formHorizantalInput("New Station Name", "stationName", "stationName", "New Station Name", "text");

            //Input Station direction that will be a terminal
            $stations = getTerminalsNames($_POST['linename']);

            $form .= formSelectInput($stations, "stationDirection", "addStation", "Station direction");

            //Input Station that according to the admin will choose distance
            $stations = getStationsInLine($_POST['linename']);
            $_SESSION['linename'] = $_POST['linename'];
            $form .= formSelectInput($stations, "stationReference", "addStation", "Station reference");

            //Input Distance  between new station and reference one
            $form .= formHorizantalInput("Distance", "distance", "distance", "Distance  between new station and reference one", "number");

            //Input station prices
            $form .= formHorizantalInput("Category 1", "firstPrice", "firstPrice", "Category 1 Price", "number");
            $form .= formHorizantalInput("Category 2", "secondPrice", "secondPrice", "Category 2 Price", "number");
            $form .= formHorizantalInput("Category 3", "thirdPrice", "thirdPrice", "Category 3 Price", "number");


        }else if(($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['stationName'])) && isset($_SESSION['linename']))     {
            $name=htmlspecialchars($_POST['stationName']);
            $message=  addStation($name, $_SESSION['linename'],$_POST['stationReference'],$_POST['stationDirection'],$_POST['distance'],$price=array($_POST['firstPrice'],$_POST['secondPrice'],$_POST['thirdPrice']));

            unset($_SESSION['linename']);
            $form = "<div class='alert alert-success'> $message</div>";
        } else {

            if(count($linename) == 0) {
                $formButton = "";
                $form .= '<div class="alert alert-warning">No line in database</div>'.
                    '<a>Get back to Homepage</a>';

            } else {

                $formButton = '<button class="btn btn-primary" type="submit" name="line">Select Line</button>';
                $form .= formSelectInput($linename, "linename", "addStation","Lines");
            }
        }
    }
}




function formHorizantalInput($labelName, $name, $id, $placeholder, $type) { //This function's purpose is to make the code more visible
    $string = '<div class="form_group">';
    $string .='<label class="col-md-2" for="'.$id.'">'.$labelName.'</label>';
    $string .= '<div class="col-md-10"><input type="'.$type.'" class="form-control" name="'.$name.'" id="'.$id.'" placeholder="'.$placeholder.'" ></div></div>';
    return $string;
}

function formSelectInput($list, $name, $formname, $labelName) {
    $string ='<label class="col-md-2" for="'.$name.'">'.$labelName.'</label>';
    $string .="<div class='col-md-10'><select class='form-control' id=".$name." name='".$name."' form='".$formname."'>";
    foreach ($list as  $value) {
        $string .="<option value='".$value."'>".$value."</option>";
    }
    $string .="</select></div>";

    return $string;
}