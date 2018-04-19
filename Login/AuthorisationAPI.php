<?php

    session_start();

    require_once dirname(__FILE__) . "/src/MachineRequest.php";

$addmachines = true;

function setRecieveMachines($b){
    $GLOBALS['addmachines']=(bool) $b;
}

function authorise($name,$pass,$MID) {
    $agentid = getAgentID($name,$pass);
    if (! $agentid) return "unauthorised person";

    $agentlocation = getAgentLocation($agentid);
    $machinelocation= getMachineLocation($MID);

    if ($machinelocation) {
        if(! $machinelocation==$agentlocation) return "unauthorised location";
        return false;
    }

    if (! $addmachines) return "unauthorised machine";
    
    $_SESSION['block']=false;
    machineRequest($agentid);
    
    return "new machine detected";
}

