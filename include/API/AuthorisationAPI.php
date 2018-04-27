<?php

    require_once dirname(__FILE__) . "/MachineRequestAPI.php";
    //require_once dirname(__FILE__) . "/AdminAPI.php";

    session_start();   


function authoriseAgent($cin,$pass) {
     
    $agent = checkAgent($cin,$pass);
    if (! $agent) return "unauthorised person";

    $agentline= $agent['line'];
    $agentstation= $agent['station'];

    if (isset($_COOKIE["machineid"])) {
        $machine= getComputer($_COOKIE["machineid"]);

        echo "PLS ".$_COOKIE["machineid"]."<br>"; 

        print_r($machine);
        echo " PLS<br>";
        if (! $machine){ 
            if (! getRecieveMachines()) return "unregistred machine";
            $_SESSION['block']=false;
            machineRequest($cin);
            return "Machine Waiting Approval";
                     }

        if( ($machine['line']!=$agentline) && ($machine['station']!=$agentstation)) return "unauthorised location";

        $_SESSION['AgentFirstName']= $agent['f_name'];
        $_SESSION['AgentLastName']= $agent['l_name'];
        $_SESSION['Line']=$agent['line'];
        $_SESSION['Station']=$agent['station'];
        $_SESSION['AgentCIN']=$cin;
        $_SESSION['MachineID']=$_COOKIE["machineid"];
        return false;
    }

    if (! getRecieveMachines()) return "unregistred machine";
    $_SESSION['block']=false;
    machineRequest($cin);
    return "Machine Waiting Approval";

}
/*
function authoriseAdmin($user,$pass){
    session_start();
    $admin = getAdmin($user,$pass);
    if (!$admin) return "false credentials";
    else return false;
}
*/

?>