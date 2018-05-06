<?php

    require_once dirname(__FILE__) . "/MachineRequestAPI.php";
    require_once dirname(__FILE__) . "/AdminAPI.php";

 /*DO NOT FORGET TO CALL session_start() ON EACH PAGE LIKE THIS :

    if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
     
  */

function authoriseAdmin($username,$pass){
    $admin = verifyAdmin($username,$pass);
    if (! $admin) return "Invalid Login";

    if (isset($_SESSION)) {
        
        session_unset(); 
        session_destroy(); 
    }

    session_start();
    $_SESSION["SessionType"]="Admin";
    setRecieveMachines(true);
    return false;
}

function authoriseAgent($cin,$pass) {

if (isset($_SESSION)) {
    session_unset(); 
    session_destroy(); 

}
    session_start();

    $agent = checkAgent($cin,$pass);
    var_dump($agent);
    if (! $agent) return "Unauthorised person";

    $agentline= $agent['line'];
    $agentstation= $agent['station'];

    if (isset($_COOKIE["machineid"])) {
        
        

        $machine= getComputer($_COOKIE["machineid"]);

        if (! $machine){ 
            if (! getRecieveMachines()) return "Unregistred machine";
            $_SESSION['block']=false;
            machineRequest($cin);
            return "Waiting for Machine Approval";
                     }

        if( ($machine['line']!=$agentline) || ($machine['station']!=$agentstation)) return "Unauthorised location";
        

        $_SESSION['AgentFirstName']= $agent['f_name'];
        $_SESSION['AgentLastName']= $agent['l_name'];
        $_SESSION['Line']=$agent['line'];
        $_SESSION['Station']=$agent['station'];
        $_SESSION['AgentCIN']=$cin;
        $_SESSION['MachineID']=$_COOKIE["machineid"];
        $_SESSION['SessionType']="Agent";
        return false;
    }

    if (! getRecieveMachines()) return "Unregistred machine";
    $_SESSION['block']=false;
    machineRequest($cin);
    
    return "Machine Waiting for Approval: <br> Please wait for the admin approval";

}



?>