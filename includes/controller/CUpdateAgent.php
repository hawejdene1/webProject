<?php 

session_start();


if(true/*$_SESSION['SessionType']=="Admin"*/) {

	$form = "";
	$formButton = "";



	if($_SERVER['REQUEST_METHOD']=='POST' ) {
		var_dump($_POST);
		if(isset($_POST['cinAgent'])) {	
	     // show agent informations

			if(filter_var($_POST['cinAgent'], FILTER_VALIDATE_INT)) {
				
				if(!empty($agent)){ // gonna be changed to if($agent = getAgent($_POST['cinAgent']) {}
				echo $_POST['cinAgent'];

					$formButton = '<button class="btn btn-primary" type="submit" name="deleteAgent">Delete Agent</button>';
								
					$form .= formHorizantalInput("Agent CIN", "cinAgent", "cinAgent", $agent['cin'], "disabled");
					$form .= formHorizantalInput("Name", "agentName", "agentName", $agent['f_name'], "");
					$form .= formHorizantalInput("Lastname", "agentLName", "agentLName", $agent['l_name'], "");
					$form .= formHorizantalInput("Station", "agentStation", "agentStation", $agent['station'], "");

			} else {
				$message = "Agent not found";
				$formButton = "";
				$form = "";
			} 

		} else {
			$_SESSION['errorMessage'] = "Unvalid number format";
			header("location: ../../interface/adminDashboard/updateAgent.php");
		}


		} else if (isset($_POST['updateAgent'])){
			//Confirm deletion or not !

			unset($_SESSION['errorMessage']);

		} else {
			// there is some kind of an error, unauthorized access
			 header("location: ../../interface/errorPage.php");
		}


	} else {

		$form .= '<input type="number" class="form-control" name="cinAgent" form="updateAgent" placeholder="Cin Agent" required>';

		$formButton = '<button class="btn btn-primary" type="submit" name="searchCin">Delete Agent</button>';
	

	}
	 




} else {
	header("location:  ../../index.php");
}



	function formHorizantalInput($labelName, $name, $id, $placeholder, $additionalState) { //This function's purpose is to make the code more visible
		$string = '<div class="form_group">';
		$string .='<label class="col-md-2" for="'.$id.'">'.$labelName.'</label>';
		$string .= '<div class="col-md-10"><input class="form-control" name="'.$name.'" id="'.$id.'" placeholder="'.$placeholder.'" '.$additionalState.' ></div></div>';
		return $string;
	}