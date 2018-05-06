<?php 
//Session Check
session_start();

require_once dirname(dirname(__FILE__)) . "/API/MachineRequestAPI.php";

if(!isset($_SESSION['SessionType']) || $_SESSION['SessionType'] != "Admin") { 
	header("location: ../../index.php");
} else {


	$form = "";
	$formButton = "";

	if($_SERVER['REQUEST_METHOD'] == "POST") {


		if(isset($_POST['stopRequests'])) {
		//Sets accepting requests to false
			setRecieveMachines(false);
		} else if(isset($_POST['startRequests'])) {
		//Sets accepting requests to true
			setRecieveMachines(true);
		} else if(isset($_POST['deleteMachine'])) {
		//delete all the machine requests
			denyMachineRequest($_POST['deleteMachine']);
		} else if(isset($_POST['addMachine'])) {
		//accept one single Machine Request
			acceptMachineRequest($_POST['addMachine'], $_POST['line'], $_POST['station']);
		} 
			
	}

	
	$allMachines = getAllMachineLogs();


	if($allMachines==null){
        $form='<div class="alert alert-success"> No machine request </div>';

    }else{
		$form .="<form method='POST' action='' id='addMachine'>";

		//Displaying each machine that had requested an entry
		foreach ($allMachines as $id => $machine) {
			$form .= showMachineInfos($machine['machineid'] ,$machine);
		}
		$form .= "</form>";
} }

	





function showMachineInfos($id, $machine) {
	

	$string = "<div class='panel panel-info'>";
	$string .="<div class='panel-heading'>
	<h3 style='text-align: right'> Machine ID | ".$id."    <button class='btn exitButton'  name='deleteMachine' value='".$id."'><span>    &#x2716</span></button> </h3> 
	</div>
	<div class='panel-body'><table class='table'>";
	$string .= "<tr><th>Agent CIN</th><th>Agent name</th><th>Line</th><th>Station</th><th>Time</th><th>Accepted</th></tr>";


	//Displaying each request of the machine
	foreach ($machine as $key => $value) {

    if($key !== 'machineid') {

    		$string .= "<tr>
    						<td><input type='text'  name='agentID' class='disabledInput form-control'  form='addMachine' value='".$value['AgentCIN']."' readonly></td>
    						<td><input type='text' 	 name='agentname' class='disabledInput form-control' form='addMachine'  value='".$value['AgentFirstName']."' readonly></td>
    						<td><input type='text'  name='line' class='disabledInput form-control' form='addMachine'  value='".$value['Line']."' readonly></td>
    						<td><input type='text'  name='station' class='disabledInput form-control' form='addMachine'  value='".$value['Station']."' readonly></td>
    						<td><input type='text'  name='time' class='disabledInput form-control' form='addMachine' value='".$value['time']."' readonly></td>
    						<td><button type='submit' name='addMachine' value='".$machine['machineid']."' class='btn btn-default' form='addMachine'>Accept</button></td>
    						
    		</tr>";
    	}
	}

	$string .= "</table></div></div>";
    return $string;

}