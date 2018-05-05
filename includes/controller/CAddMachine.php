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
		if(isset($_POST['deleteMachine'])) {
			var_dump($_POST['deleteMachine']);
			
			denyMachineRequest($_POST['deleteMachine']);
		//	echo "//delete the machine request ". $_POST['deleteMachine'];
		

		} else if(isset($_POST['addMachine'])) {

		//	acceptMachineRequest($machineid,$line,$station);
			acceptMachineRequest($_POST['addMachine'], $_POST['line'], $_POST['station']);
			//echo "accept the request that's : ".$_POST['addMachine'];
			
		}
			
	}

	
	$allMachines = getAllMachineLogs();
	//var_dump($allMachines);
		$form .="<form method='POST' action='' id='addMachine'>";
		foreach ($allMachines as $id => $machine) {
			$form .= showMachineInfos($machine['machineid'] ,$machine);
		}
		$form .= "</form>";
} 

	





function showMachineInfos($id, $machine) {
	

	$string = "<div class='panel panel-info'>";
	$string .="<div class='panel-heading'>
	<h3 style='text-align: right'> Machine ID | ".$id."    <button class='btn exitButton'  name='deleteMachine' value='".$id."'><span>    &#x2716</span></button> </h3> 
	</div>
	<div class='panel-body'><table class='table'>";
	$string .= "<tr><th>Agent CIN</th><th>Agent name</th><th>Line</th><th>Station</th><th>Time</th><th>Accepted</th></tr>";

	foreach ($machine as $key => $value) {
	var_dump($key);		echo "------------------------- ";

    if($key !== 'machineid') {
    		echo "ALBALAM";
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