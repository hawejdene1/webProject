<?php 

session_start();

//Session Check


$formButton = "";
$form = "";








if($_SERVER['REQUEST_METHOD']=='POST') {
	//Manage the request sent by the admin

		

	// Input testing
	
	if(true) {

	} else {

		//This variable describes the adding result;
		$addingRequestResponse = true;

		if(!$addingRequestResponse) {
			$_SESSION['errorMessage'] = "Adding failed";
		} 

		
	}







²
} else {


	//Showing the form for the first time
	$form .= formHorizantalInput("Agent cin", "cinAgent", "cinAgent", "Agent Cin", "numero");
	$form .= formHorizantalInput("Lastame", "lnameAgent", "lnameAgent", "Lastame", "text");
	$form .= formHorizantalInput("Firstname", "fnameAgent", "fnameAgent", "Firstname", "text");
	//$form .= formHorizantalInput("Line", "lineAgent", "lineAgent", "Line", "text"); Should be added later 
	$form .= formHorizantalInput("Station", "stationAgent", "cinAgent", "Agent Cin", "text");
	$form .= formHorizantalInput("password", "pwdAgent", "pwdAgent", "password", "password");


	$formButton = '<button class="btn btn-primary" type="submit" name="addAgent">Add Agent</button>';


}




function formHorizantalInput($labelName, $name, $id, $placeholder, $type) { //This function's purpose is to make the code more visible
	$string = '<div class="form_group">';
	$string .='<label class="col-md-2" for="'.$id.'">'.$labelName.'</label>';
	$string .= '<div class="col-md-10"><input type="'.$type.'" class="form-control" name="'.$name.'" id="'.$id.'" placeholder="'.$placeholder.'"></div></div>';
	return $string;
}



function inputVerification($postRequest) {
	$_SESSION['errorMessage'] = "";
	$verification = true;
	if(!isset($postRequest['cinAgent'])) {
		$_SESSION['errorMessage'] .= "Type in agent's CIN";
	} else if (!filter_var($postRequest['cinAgent'], FILTER_VALIDATE_INT)) {
		$_SESSION['errorMessage'] .= "Agent's CIN should all numbers";
	} 

	if(!isset($postRequest['lnameAgent']) || !isset($postRequest['fnameAgent']))





	return $verification; //return boolean
}