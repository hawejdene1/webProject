<?php
//Session  check


session_start();


require_once dirname(dirname(__FILE__)) . "/api/AgentAPI.php" ;
require_once dirname(dirname(__FILE__)) . "/api/StationManagementAPI.php" ;



if(!isset($_SESSION['SessionType']) || $_SESSION['SessionType'] != "Admin") { 
    header("location: ../../index.php");
} else {



        $form = "";
        $formButton = "";

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            if (isset($_POST['cinAgent'])) {
                // show agent informations

                if (filter_var($_POST['cinAgent'], FILTER_VALIDATE_INT)) {


                    $agent = getAgent($_POST['cinAgent']);

                    if (!empty($agent)) {

                        $_SESSION['cin'] = $_POST['cinAgent'];


                        $formButton = '<button class="btn btn-primary" type="submit" name="deleteAgent">Delete Agent</button>';

                        $form .= formHorizantalInput("Agent CIN", "agentCin", "agentCin", $agent['cin'], "disabled");
                        $form .= formHorizantalInput("Name", "agentName", "agentName", $agent['f_name'], "disabled");
                        $form .= formHorizantalInput("Lastname", "agentLName", "agentLName", $agent['l_name'], "disabled");
                        $form .= formHorizantalInput("Station", "agentStation", "agentStation", $agent['station'], "disabled");


                    } else {
                        $message = "Agent not found";
                        $form .= '<div class="alert alert-warning">' . $message . '</div>';
                        $formButton = "";

                    }

                } else {
                    

                    header("location: ../../interface/adminDashboard/deleteAgent.php");

                }


            } else if (isset($_POST['deleteAgent'])) {

                deleteAgent($_SESSION['cin']);
                $message = "Agent deleted";
                $form .= '<div class="alert alert-success">' . $message . '</div>';

                unset($_SESSION['cin']);

            } else {
                // there is some kind of an error, unauthorized access

                header("location: ../../interface/errorPage.php");
            }


        } else {


            $form .= '<input type="text" class="form-control" name="cinAgent" form="deleteAgent" placeholder="cin agent">';

        }


}
function formHorizantalInput($labelName, $name, $id, $value, $additionalState) {


    $string = '<div class="form_group">';
    $string .='<label class="col-md-2" for="'.$id.'">'.$labelName.'</label>';
    $string .= '<div class="col-md-10"><input class="form-control" name="'.$name.'" id="'.$id.'" value="'.$value.'" '.$additionalState.' ></div></div>';
    return $string;


}








