
<?php

//Session Check

session_start();

require_once dirname(dirname(__FILE__)) . "/api/StationManagementAPI.php" ;
require_once dirname(dirname(__FILE__)) . "/api/AgentAPI.php" ;



if(!isset($_SESSION['SessionType']) || $_SESSION['SessionType'] != "Admin") {
    header("location: ../../index.php");
} else {


    if (!isset($_SESSION['SessionType']) || $_SESSION['SessionType'] != "Admin") {
        header("location: ../../index.php");
    } else {
        $formButton = "";
        $form = "";

        //unset($_SESSION['errorMessage'] );

        //Manage the request sent by the admin
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            if (isset($_POST['lineAgent'])) {
                if (!inputVerification($_POST)) {
                    header('Location: '.$_SERVER['PHP_SELF']);;}else {

                    $stations = getStationsInLine($_POST['lineAgent']);


                    $form .= formHorizantalInputState("Agent CIN", "cinAgent", "agentCin", $_POST['cinAgent'], "disabled", "addAgent");
                    $form .= formHorizantalInputState("Name", "fnameAgent", "agentName", $_POST['fnameAgent'], "disabled", "addAgent");
                    $form .= formHorizantalInputState("Lastname", "lnameAgent", "agentLName", $_POST['lnameAgent'], "disabled", "addAgent");
                    $form .= formHorizantalInputState("Line", "lineAgent", "line", $_POST['lineAgent'], "disabled", "addAgent");
                    $form .= formHorizantalInputState("password", "pwdAgent", "agentpass", $_POST['pwdAgent'], "disabled", "addAgent");
                    $form .= formSelectInput($stations, "stationAgent", "addAgent", "station");


                    //session that will concerve inforamtion for adding agent
                    $_SESSION['addAgentcin'] = $_POST['cinAgent'];
                    $_SESSION['addAgentFname'] = $_POST['fnameAgent'];
                    $_SESSION['addAgentLname'] = $_POST['lnameAgent'];
                    $_SESSION['addAgentLine'] = $_POST['lineAgent'];
                    $_SESSION['addAgentpass'] = $_POST['pwdAgent'];


                    $formButton = '<button class="btn btn-primary" type="submit" name="addAgent2">Add Agent</button>';

                }} else {

              





                    if (!getAgent($_SESSION['addAgentcin'])) {
                        $addingRequestResponse = addAgent($_SESSION['addAgentcin'], $_SESSION['addAgentLname'], $_SESSION['addAgentFname'], $_SESSION['addAgentLname'], $_POST['stationAgent'], $_SESSION['addAgentpass']);
                        //This variable describes the adding result;
                    } else {
                        $addingRequestResponse = false;
                        $form .= '<div class="alert alert-warning">agent already exist</div>';
                    }

                    if (!$addingRequestResponse) {

                        $form .= '<div class="alert alert-warning">Adding failed</div>';
                    } else {
                        $form .= '<div class="alert alert-success">adding with success</div>';
                    }



            }


        } else {
            $linename = getLines();
            if (count($linename) == 0) {
                $formButton = "";
                $form .= '<div class="alert alert-warning">No line in database</div>' .
                    '<a>Get back to Homepage</a>';

            } else {

                // $formButton = '<button class="btn btn-primary" type="submit" name="line">Select Line</button>';


                //Showing the form for the first time
                $form .= formHorizantalInput("Agent cin", "cinAgent", "cinAgent", "Agent Cin", "numero", "addAgent");
                $form .= formHorizantalInput("Last name", "lnameAgent", "lnameAgent", "Lastame", "text", "addAgent");
                $form .= formHorizantalInput("First name", "fnameAgent", "fnameAgent", "Firstname", "text", "addAgent");
                $form .= formSelectInput($linename, "lineAgent", "addAgent", "line");
                $form .= formHorizantalInput("password", "pwdAgent", "pwdAgent", "password", "password", "addAgent");


                $formButton = '<button class="btn btn-primary" type="submit" name="addAgent">Add Agent</button>';


            }
        }


    }
}





      //This function's purpose is to make the code more visible

	function formHorizantalInput($labelName, $name, $id, $placeholder, $type,$formname) {
		$string = '<div class="form_group">';
		$string .='<label class="col-md-2" for="'.$id.'">'.$labelName.'</label>';
		$string .= '<div class="col-md-10"><input type="'.$type.'" class="form-control" name="'.$name.'"  form="'.$formname.'" id="'.$id.'  " placeholder="'.$placeholder.'"></div></div>';
		return $string;
	}



function formHorizantalInputState($labelName, $name, $id, $value, $additionalState,$formname) {


    $string = '<div class="form_group">';
    $string .='<label class="col-md-2" for="'.$id.'">'.$labelName.'</label>';
    $string .= '<div class="col-md-10"><input class="form-control" name="'.$name.'" id="'.$id.'" form="'.$formname.'"  value="'.$value.'" '.$additionalState.' ></div></div>';
    return $string;


}


function formSelectInput($list, $name, $formname, $labelName) {
    $string ='<label class="col-md-2" for="'.$name.'">'.$labelName.'</label>';
    $string .="<div class='col-md-10'><select class='form-control'  id=".$name." name='".$name."' form='".$formname."'>";
    foreach ($list as  $value) {
        $string .="<option value='".$value."'>".$value."</option>";
    }
    $string .="</select></div>";

    return $string;
}



	function inputVerification($postRequest) {
    var_dump($postRequest);
		$_SESSION['message'] = "";
		$verification = true;
		if(!isset($postRequest['cinAgent'])||(strlen ( $postRequest['cinAgent'])===0)) {

			return false;
		} else if (!filter_var($postRequest['cinAgent'], FILTER_VALIDATE_INT)) {

			return false;
		}

		if(!isset($postRequest['lnameAgent']) || !isset($postRequest['fnameAgent'])||(strlen ( $postRequest['fnameAgent'])==0)||(strlen ( $postRequest['lnameAgent'])==0))
           return false;


		return $verification; //return boolean
	}


	?>




