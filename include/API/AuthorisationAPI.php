<?php

    session_start();

    require_once dirname(dirname(dirname(__FILE__))) . "/src/Authorisation/MachineRequest.php";

$addmachines = true;

function setRecieveMachines($b){
    $GLOBALS['addmachines']=(bool) $b;
}

function authorise($name,$pass) {
    $agentid = getAgentID($name,$pass);
    if (! $agentid) return "unauthorised person";

    $agentlocation = getAgentLocation($agentid);

    if isset($_COOKIE["machineid"]) {
    $machinelocation= getMachineLocation($_COOKIE["machineid"]);
    if(! $machinelocation==$agentlocation) return "unauthorised location";
    $_SESSION['Name']= $name;
    $_SESSION['Location']=$agentlocation;
    $_SESSION['AgentID']=$agentid;
    $_SESSION['MachineID']=$_COOKIE["machineid"];
    return false;
    }

    if (! $addmachines) return "unauthorised machine";
    
    $_SESSION['block']=false;
    machineRequest($agentid);
    return "new machine detected";
}

