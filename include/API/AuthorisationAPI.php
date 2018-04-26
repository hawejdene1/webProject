<?php

    require_once dirname(__FILE__) . "/MachineRequestAPI.php";
    require_once dirname(__FILE__) . "/AdminAPI.php";

    


function authoriseAgent($cin,$pass) {
    session_start();    
    $agent = getAgent($cin,$pass);
    if (! $agent) return "unauthorised person";

    $agentlocation = $agent['id_station'];

    if (isset($_COOKIE["machineid"])) {
        $machine= getComputer($_COOKIE["machineid"]);

        if (! $machine){ 
            if (! getRecieveMachines()) return "unregistred machine";
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

    if (! getRecieveMachines()) return "unregistred machine";
    $_SESSION['block']=false;
    machineRequest($cin);
    return "Machine Waiting Approval";

}

function authoriseAdmin($user,$pass){
    session_start();
    $admin = getAdmin($user,$pass);
    if (!$admin) return "false credentials";
    else return false;
}


?>