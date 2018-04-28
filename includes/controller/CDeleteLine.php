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
    if(isset($_POST['linename'])) 
            $form="<div><h1>Result of Line deletion</h1></div>";

    } else {
    //IF the user access the page for the first time (the line was not chosen yet)


        $formButton = '<button class="btn btn-primary" type="submit" name="selectLineBtn">Delete Line</button>';
        $form .='<select class="form-control" name="linename" form="deleteLine">';
        foreach ($linename as $key => $value) {
            $form .="<option value='{$key}'>{$key}</option>";
        }     
        $form .="</select>";


}
