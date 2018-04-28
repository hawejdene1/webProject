<?php

    //Session check
    
     



    //To make sure that we were in this page ulterierly, we 
    // will use a SESSION variable to test the last page 

$form = "";
$formButton = "";

if($_SERVER['REQUEST_METHOD']=='POST') {
	if(isset($_POST['cinAgent'])) {
     // show agent informations

	} else {
		// there is some kind of an error, unauthorized access
		 header("location: ../../interface/errorPage.php");
	}


} else {

	$form .= '<input type="text" class="form-control" name="cinAgent" form="deleteAgent">

}




