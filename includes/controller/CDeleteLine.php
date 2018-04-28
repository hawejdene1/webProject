<?php
require_once ("../api/StationManagementAPI.php");
    //Session check
    

//array of line names
$linename=getLines();

    //To make sure that we were in this page ulterierly, we 
    // will use a SESSION variable to test the last page 

$form = "";
$formButton = "";

if($_SERVER['REQUEST_METHOD']=='POST') {


    // IF the user had already chosen a Line to update
    //Do something to get the station on the line 
    if(isset($_POST['linename'])) {

            $message=deleteLine();
            $form="<div><h1>".$message."</h1></div>";

    }} else {
    //IF the user access the page for the first time (the line was not chosen yet)


        $formButton = '<button class="btn btn-primary" type="submit" name="selectLineBtn">Delete Line</button>';
        $form .='<select class="form-control" name="linename" form="deleteLine">';
        foreach ($linename as  $value) {
            $form .="<option value='{$value}'>{$value}</option>";
        }     
        $form .="</select>";


}
