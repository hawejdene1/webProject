<?php

if(isset($_SESSION['SessionType']) && $_SESSION['SessionType']=="Agent")  {

	echo ' 
	<ul class="list-group navbar navbar-primary navbar-fixed-side">
	    <li class="list-group-item list-group-item-danger">Agent Infos</li>
	    <li class="list-group-item"> Agent ID       : '.ucwords($_SESSION["AgentCIN"]).'</li>
	    <li class="list-group-item"> Name           : '.ucwords($_SESSION["AgentFirstName"]).'</li>
	    <li class="list-group-item"> Lastname       : '.ucwords($_SESSION["AgentLastName"]).'</li>
	    <li class="list-group-item"> Station       : '.ucwords($_SESSION["Station"]).'</li>
	    <li class="list-group-item"> Line       : '.ucwords($_SESSION["Line"]).'</li>

	</ul> 


	<style>

	ul {
		margin-top: 50px;
	}
	</style>';
}

?>

