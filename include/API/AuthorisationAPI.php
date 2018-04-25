<?php

    require_once dirname(__FILE__) . "/AgentAPI.php";
    require_once dirname(__FILE__) . "/ComputerAPI.php";
    require_once dirname(dirname(dirname(__FILE__))) . "/src/Authorisation/MachineRequest.php";


if (! isset($GLOBALS['addmachines'])) $GLOBALS['addmachines'] = true;


function setRecieveMachines($b){
    $GLOBALS['addmachines']=(bool) $b;
}

function authoriseAgent($cin,$pass) {
    session_start();    
    $agent = getAgent($cin,$pass);
    if (! $agent) return "unauthorised person";

    $agentlocation = $agent['id_station'];

    if (isset($_COOKIE["machineid"])) {
        $machine= getComputer($_COOKIE["machineid"]);

        if (! $machine){ 
            if (! $GLOBALS['addmachines']) return "unregistred machine";
            $_SESSION['block']=false;
            machineRequest($cin);
            return "Machine Waiting Approval";
                     }

        if( $machine['id_station']!=$agentlocation) return "unauthorised location";

        $_SESSION['AgentFirstName']= $agent['f_name'];
        $_SESSION['AgentLastName']= $agent['l_name'];
        $_SESSION['Location']=$agentlocation;
        $_SESSION['AgentCIN']=$cin;
        $_SESSION['MachineID']=$_COOKIE["machineid"];
        return false;
    }

    if (! $GLOBALS['addmachines']) return "unregistred machine";
    $_SESSION['block']=false;
    machineRequest($cin);
    return "Machine Waiting Approval";

}
