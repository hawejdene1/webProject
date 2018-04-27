<?php

    //Session check
    
    //This array is just for testing purposes 
     $linename =  array('Sfax Tunis' => array('Sfax' ,'Tunis','Sousse'),'Tabarka Tunis2' => array('Tabarka' ,'Tunis2','Beja') ,'Sfax2 Mednine' => array('Sfax2' ,'Mednine','Gabes'));



    //To make sure that we were in this page ulterierly, we 
    // will use a SESSION variable to test the last page 

$form = "";
$formButton = "";

if($_SERVER['REQUEST_METHOD']=='POST') {


    // IF the user had already chosen a Line to update
    //Do something to get the station on the line 
    if(isset($_POST['linename'])) {
        
        $formButton = '<button class="btn btn-primary" name="deleteStationBtn" type="submit">Delete Station</button>';
        $form .= "<div class='radio'>";
        var_dump($_POST['linename']);
        foreach ($linename[$_POST['linename']] as $value) {
            $form .= "<label class='checkbox list-group-item'>
                  <input name='optionsStation' type='radio' value='{$value}'> {$value}
                  </label>";
              }
        $form .="</div>";
    } else if (isset($_POST['optionsStation'])) {
            //Write down weither the deleting succeeded or failed

            $form="<div><h1>Result of Station deletion</h1>";
    } else {
        header("location: ../../interface/errorPage.php");
    }

} else {
    //IF the user access the page for the first time (the line was not chosen)


        $formButton = '<button class="btn btn-primary" type="submit" name="selectLineBtn">Select Line</button>';
        $form .='<select class="form-control" name="linename" form="deleteStation">';
        foreach ($linename as $key => $value) {
            $form .="<option value='{$key}'>{$key}</option>";
        }     
        $form .="</select>";


}