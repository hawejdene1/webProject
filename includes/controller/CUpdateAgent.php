<?php 

session_start();

require_once dirname(dirname(__FILE__)) . "/api/AgentAPI.php" ;
require_once dirname(dirname(__FILE__)) . "/api/StationManagementAPI.php" ;
if(true/*$_SESSION['SessionType']=="Admin"*/) {

	$form = "";
	$formButton = "";



	if($_SERVER['REQUEST_METHOD']=='POST' ) {
		//var_dump($_POST);
		if(isset($_POST['cinAgent'])) {	
	     // show agent informations

			if(filter_var($_POST['cinAgent'], FILTER_VALIDATE_INT)) {


                $agent = getAgent($_POST['cinAgent']);

			    if(!empty($agent)){ // gonna be changed to if($agent = getAgent($_POST['cinAgent']) {}
                    $_SESSION['cinAgent']=$agent['cin'];
                    $pass=getPassAgent($agent['cin']);

					$formButton = '<button class="btn btn-primary" type="submit" name="updateAgent">update Agent</button>';
					$form .= formHorizantalInput("Agent CIN", "cinAgent", "cinAgent", $agent['cin'], "disabled");
					$form .= formHorizantalInput("Name", "agentName", "agentName", $agent['f_name'], "disabled");
					$form .= formHorizantalInput("Lastname", "agentLName", "agentLName", $agent['l_name'], "disabled");
                    $form .= formHorizantalInputValue("password", "pass", "pass",".$pass.", "");
					$form .= formHorizantalInputValue("Station", "agentStation", "agentStation", $agent['station'], "");
                    $form .= formHorizantalInputValue("line", "agentLine", "agentLine", $agent['line'], "");

			} else {
			    $_SESSION['errorMessage'] = "Agent not found";
				$formButton = "";
				$form = "";

                    unset($_SESSION['message']);
                    unset($_SESSION['cinAgent']);
			} 

		} else {
			$_SESSION['errorMessage'] = "Unvalid number format";

			header("location: ../../interface/adminDashboard/updateAgent.php");
		}


		} else if (isset($_POST['updateAgent'])){
			//Confirm deletion or not !
            
            $cin=$_SESSION['cinAgent'];
            $line=$_POST['agentLine'];
            $station=$_POST['agentStation'];
            $pass=$_POST['pass'];
            //check if line and station exist in database
            if (( !lineExists($line))||(!stationExists($station,$line))){
                $_SESSION['errorMessage'] = "Unvalid station and line";

            }else {


                changeAgentLocation($cin, $line, $station,$pass);
                $_SESSION['message']="update validated";
                unset($_SESSION['errorMessage']);
                unset($_SESSION['cinAgent']);
            }

		} else {
			// there is some kind of an error, unauthorized access
			 header("location: ../../interface/errorPage.php");
		}


	} else {
        unset($_SESSION['errorMessage']);
        unset($_SESSION['message']);

		$form .= '<input type="number" class="form-control" name="cinAgent" form="updateAgent" placeholder="Cin Agent" required>';

		$formButton = '<button class="btn btn-primary" type="submit" name="searchCin">update Agent</button>';
	

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

function formHorizantalInputValue($labelName, $name, $id, $value, $additionalState) { //This function's purpose is to make the code more visible
    $string = '<div class="form_group">';
    $string .='<label class="col-md-2" for="'.$id.'">'.$labelName.'</label>';
    $string .= '<div class="col-md-10"><input class="form-control" name="'.$name.'" id="'.$id.'" value="'.$value.'" '.$additionalState.' ></div></div>';
    return $string;
}

