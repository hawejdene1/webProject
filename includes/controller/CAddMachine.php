<?php 

session_start();


if($_SESSION['SessionType']=="Admin") {


	//$allMachines = getAllMachineLogs();


	//This array is for testing purposes



	$allMachines = array('SBR5885' => array(
												'agentID' => "6545654654",
												'agentname' => "Salma Rais",
												'location' => "Djerba",
												'time' => "12:04"),
						'SBR55101' => array(
												'agentID' => "1000105",
												'agentname' => "Iyadh Chaker",
												'location' => "Kef",
												'time' => "14:41"),
						'DEF47754' => array(
												'agentID' => "15585200",
												'agentname' => "Wej Haouari",
												'location' => "Djerba",
												'time' => "15:10")
					);



	array('Sfax Tunis' => array('Sfax' ,'Tunis','Sousse'),'Tabarka Tunis2' => array('Tabarka' ,'Tunis2','Beja') ,'Sfax2 Mednine' => array('Sfax2' ,'Mednine','Gabes'));

	
	
	foreach ($allMachines as $id => $machine) {
		showMachineInfos($id ,$machine);
	}





} else {
	header("location:  ../../index.php");
}




function showMachineInfos($id, $machine) {


	$string = "<ul class='list-group navbar navbar-default navbar-fixed-side'>";
	$string .=" <li class='list-group-item list-group-item-info'>".$machine['']."</li>";
	$string .=" <li class='list-group-item list-group-item-info'>".$machine['']."</li>";
	$string .=" <li class='list-group-item list-group-item-info'>".$machine['']."</li>";
	$string .=" <li class='list-group-item list-group-item-info'>".$machine['']."</li>";

	$string.="</ul>";
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

}