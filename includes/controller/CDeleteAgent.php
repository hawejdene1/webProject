<?php

    //Session check
    
<<<<<<< HEAD
     



=======
     //This rep is just for testing purposes 
	$agent = array('cin' => 554, 'f_name' => "salma", 'l_name' => "rais", 'line' => "sousse", 'station'=> "Sousse");



var_dump($agent);

>>>>>>> 96c1fae99a209ed8d73e65a93efcd6f25a99afdc
    //To make sure that we were in this page ulterierly, we 
    // will use a SESSION variable to test the last page 

$form = "";
$formButton = "";

<<<<<<< HEAD
if($_SERVER['REQUEST_METHOD']=='POST') {
	if(isset($_POST['cinAgent'])) {
     // show agent informations

=======
//var_dump($_SERVER);


if($_SERVER['REQUEST_METHOD']=='POST') {
	var_dump($_POST);
	if(isset($_POST['cinAgent'])) {	
     // show agent informations

		if(filter_var($_POST['cinAgent'], FILTER_VALIDATE_INT)) {
			
			if(!empty($agent)){ // gonna be changed to if($agent = getAgent($_POST['cinAgent']) {}
			echo $_POST['cinAgent'];

				$formButton = '<button class="btn btn-primary" type="submit" name="deleteAgent">Delete Agent</button>';
							
				$form .= formHorizantalInput("Agent CIN", "agentCin", "agentCin", $agent['cin'], "disabled");
				$form .= formHorizantalInput("Name", "agentName", "agentName", $agent['f_name'], "disabled");
				$form .= formHorizantalInput("Lastname", "agentLName", "agentLName", $agent['l_name'], "disabled");
				$form .= formHorizantalInput("Station", "agentStation", "agentStation", $agent['station'], "disabled");


		} else {
			$message = "Agent not found";
			$formButton = "";
			$form = "";
		} 

	} else {
		$_SESSION['errorMessage'] = "Unvalid number format";

		header("location: ../../interface/adminDashboard/deleteAgent.php");

	}


	} else if (isset($_POST['deleteAgent'])){
		//Confirm deletion or not !


		unset($_SESSION['errorMessage']);

>>>>>>> 96c1fae99a209ed8d73e65a93efcd6f25a99afdc
	} else {
		// there is some kind of an error, unauthorized access
		 header("location: ../../interface/errorPage.php");
	}


} else {

<<<<<<< HEAD
	$form .= '<input type="text" class="form-control" name="cinAgent" form="deleteAgent">

}



=======
	 $formButton = '<button class="btn btn-primary" type="submit" name="searchCin">Delete Agent</button>';
	$form .= '<input type="number" class="form-control" name="cinAgent" form="deleteAgent" placeholder="Cin Agent" required>';

 
}


function formHorizantalInput($labelName, $name, $id, $value, $additionalState) { //This function's purpose is to make the code more visible
	$string = '<div class="form_group">';
	$string .='<label class="col-md-2" for="'.$id.'">'.$labelName.'</label>';
	$string .= '<div class="col-md-10"><input class="form-control" name="'.$name.'" id="'.$id.'" value="'.$value.'" '.$additionalState.' ></div></div>';
	return $string;
}
>>>>>>> 96c1fae99a209ed8d73e65a93efcd6f25a99afdc

