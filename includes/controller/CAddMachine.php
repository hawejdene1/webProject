<?php 
//Session Check
session_start();

if(!isset($_SESSION['SessionType']) || $_SESSION['SessionType'] != "Admin") { 
	header("location: ../../index.php");
} else {


	//$allMachines = getAllMachineLogs();


	//This array is for testing purposes

	$form = "";
	$formButton = "";

	$allMachines = array('SBR5885' => array('0' => array(
												'agentID' => "6545654654",
												'agentname' => "Salma Rais",
												'line' => "Djerba",
												'station)' => "Djerba",
												'time' => "12:04"),
											'1' => array(
												'agentID' => "6545654654",
												'agentname' => "Salma Rais",'line' => "Djerba",
												'station)' => "Djerba",
												'time' => "12:04")),
						'SBR55101' => array('0' => array(
												'agentID' => "1000105",
												'agentname' => "Iyadh Chaker",
												'line' => "Djerba",
												'station)' => "Djerba",
												'time' => "14:41")),
						'DEF47754' => array('0' => array(
												'agentID' => "15585200",
												'agentname' => "Wej Haouari",
												'line' => "Djerba",
												'station)' => "Djerba",
												'time' => "15:10"))
					);



	array('Sfax Tunis' => array('Sfax' ,'Tunis','Sousse'),'Tabarka Tunis2' => array('Tabarka' ,'Tunis2','Beja') ,'Sfax2 Mednine' => array('Sfax2' ,'Mednine','Gabes'));

	
	
	foreach ($allMachines as $id => $machine) {
		$form .= showMachineInfos($id ,$machine);

	}


} 

	



function showMachineInfos($id, $machine) {
	


	$string = "<div class='panel panel-default'>";
	$string .= "<div class'panel-heading'><h3 class='panel-title'>".$id."</h3></div>
				<div class='panel-body'><table class='table'>";
	$string .= "<tr><th>Agent ID</th><th>Agent name</th><th>Line</th><th>Station</th><th>Time</th><tr>Accepted</tr>";

	foreach ($machine as $key => $value) {
			
/*
			$string .= "
				<div class='input-group'>
			      <span class='input-group-addon'>
			        <input type='checkbox' >
			      </span>
			      <div>".$value['agentID']."</div><div>".$value['agentname']."</div><div>".$value['location']."</div><div>".$value['time']."</div>
			    </div><!-- /input-group -->
		    ";

*/    
		$string .= "<tr>
						<td>".$value['agentID']."</td>
						<td>".$value['agentname']."</td>
						<td>".$value['location']."</td>
						<td>".$value['time']."</td>
		</tr>";
	//$string .=" <li class='list-group-item list-group-item-default'>".$value['agentID']." : ".$value['agentname']." : ".$value['location']." : ".$value['time']."</li>";
	}

	$string .= "</table></div>
				<div class='panel-footer'>
					<button type='submit' form='".$id."Machine'>Accept Request</button>
				</div>
	</div>";
	/*
	* the history is an index array of request instances
         * 
         * a request instance is an associative array:
         * "agentID"   = ID of agent requesting Login
         * "agentname" = Name of agent requesting Login
         * "location" = Location of agent requesting Login  (==> Location of the machine)
         * "time" = Date and time of login (in milliseconds)
         * 
    */

    return $string;

}