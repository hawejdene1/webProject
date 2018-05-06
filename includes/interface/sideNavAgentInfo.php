<?php

if(isset($_SESSION['SessionType']) && $_SESSION['SessionType']=="Agent")  {

	echo ' 
	<ul class="list-group navbar navbar-default navbar-fixed-side">
	    <li class="list-group-item list-group-item-info">Agent Infos</li>
	    <li class="list-group-item"> Agent ID       : '.ucwords($_SESSION["AgentCIN"]).'</li>
	    <li class="list-group-item"> Name           : '.ucwords($_SESSION["AgentFirstName"]).'</li>
	    <li class="list-group-item"> Lastname       : '.ucwords($_SESSION["AgentLastName"]).'</li>
	    <li class="list-group-item"> Station       : '.ucwords($_SESSION["Station"]).'</li>
	    <li class="list-group-item"> Line       : '.ucwords($_SESSION["Line"]).'</li>

	</ul> ';
}

?>

