<?php 

session_start();

//Session Check



$formButton = "";
$form = "";


if($_SERVER['REQUEST_METHOD']=='POST') {
	//Manage the request sent by the admin

	

	// Input testing
	









	} else {

		//This variable describes the adding result;
		$addingRequestResponse = true;

		if(!$addingRequestResponse) {
			$_SESSION['errorMessage'] = "Adding failed";
		} 

		
	}








} else {


	//Showing the form for the first time
	$form .= formHorizantalInput("Agent cin", "cinAgent", "cinAgent", "Agent Cin", "numero");
	$form .= formHorizantalInput("Lastame", "lnameAgent", "lnameAgent", "Lastame", "text");
	$form .= formHorizantalInput("Firstname", "fnameAgent", "fnameAgent", "Firstname", "text");
	$form .= formHorizantalInput("Line", "lineAgent", "lineAgent", "Line", "text");
	$form .= formHorizantalInput("Station", "stationAgent", "cinAgent", "Agent Cin", "text");
	$form .= formHorizantalInput("password", "pwdAgent", "pwdAgent", "password", "password");


	$formButton = '<button class="btn btn-primary" type="submit" name="addAgent">Add Agent</button>';





}




function formHorizantalInput($labelName, $name, $id, $placeholder, $type) { //This function's purpose is to make the code more visible
	$string = '<div class="form_group">';
	$string .='<label class="col-md-2" for="'.$id.'">'.$labelName.'</label>';
	$string .= '<div class="col-md-10"><input type="'.$type.'" class="form-control" name="'.$name.'" id="'.$id.'" placeholder="'.$value.'" '.$additionalState.' ></div></div>';
	return $string;
}



function inputVerification($postRequest) {
	if(!isset($postRequest['cinAgent'])) {
		$_SESSION['errorMessage']
	} else if (!is_numeric($postRequest['cinAgent'])) {

	}




	return true ; //return boolean
}