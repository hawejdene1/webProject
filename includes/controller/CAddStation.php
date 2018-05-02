<?php
	
    //Session Check
    
session_start();


if (true/*$_SESSION['SessionType']=="Admin"*/) { 

    $linename =  array('Sfax Tunis' => array('Sfax' ,'Tunis','Sousse'),'Tabarka Tunis2' => array('Tabarka' ,'Tunis2','Beja') ,'Sfax2 Mednine' => array('Sfax2' ,'Mednine','Gabes'));


	$form = "";
	$formButton = "";


    if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['linename'])) {
        // IF the user had already chosen a Line to update


        //Do something to get the station on the line 
        $formButton = '<button class="btn btn-primary" name="station" type="submit">Add Station</button>';
        

        //Input NEW station name
            $form .= formHorizantalInput("New Station Name", "stationName", "stationName", "New Station Name", "text");
        
        //Input Station direction
            $form .= formSelectInput($linename[$_POST['linename']],"stationDirection", "addStation", "Station direction");


        //Input station prices
            $form .= formHorizantalInput("Category 1", "fistPrice", "firstPrice", "Category 1 Price", "number");
            $form .= formHorizantalInput("Category 2", "secondPrice", "secondPrice", "Category 2 Price", "number");
            $form .= formHorizantalInput("Category 3", "thirdPrice", "thirdPrice", "Category 3 Price", "number");

    } else {  
    	
        if(count($linename) == 0) {
            $formButton = "";
            $form .= '<div class="alert alert-warning">No line in database</div>'.
            '<a>Get back to Homepage</a>';

        } else {

            $formButton = '<button class="btn btn-primary" type="submit" name="line">Select Line</button>';
            $form .= formSelectInput($linename, "linename", "addStation");
        }
    }
} else {
    header("location: ../../index.php");
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
        foreach ($list as $key => $value) {
            $string .="<option value='".$key."'>".$value."</option>";
        }     
        $string .="</select></div>";

        return $string;
}