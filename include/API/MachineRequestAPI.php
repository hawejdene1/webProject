<?php


    require_once dirname(dirname(dirname(__FILE__))) . "/src/MachineRequest/MachineRequest.php";
    require_once dirname(__FILE__) . "/AgentAPI.php";
    require_once dirname(__FILE__) . "/ComputerAPI.php";

    function setRecieveMachines($b){
        $_SESSION['addmachines']=$b;
    }
    
    function getRecieveMachines(){
        if (isset($_SESSION['addmachines'])) return $_SESSION['addmachines'];
        return false;
    }

    function acceptMachineRequest($machineid,$location){
        addComputer($machineid,$location);
        deleteMachineRequestDB($machineid);
    }

    function denyMachineRequest($machineid){
        deleteMachineRequestDB($machineid);
    }

    function getMachineLog($machineid){
        
        $log = getMachineLogDB($machineid);
        foreach ($log as $key=>$value){

            $time = date("Y-m-d h:i:s", substr($value['time'],-10,-1));
            $time = $time . ":" . substr($value['time'],0,-10);
            $log[$key]['time'] = $time;

            $agent= getAgent($value['cin']);

            $log[$key]['time'] = $time;
            $log[$key]['AgentFirstName']=$agent['f_name'];
            $log[$key]['AgentLastName']= $agent['l_name'];
            $log[$key]['Location']=$agent['id_station'];
            $log[$key]['AgentCIN']=$value['cin'];
        }

        return $log;
    }

    function getAllMachineLogs(){

        /**
         * returns associative array
         * "machineID" ==> the history login requests concerning this machine
         * 
         * 
         * the history is an index array of request instances
         * 
         * a request instance is an associative array:
         * "agentID"   = ID of agent requesting Login
         * "agentname" = Name of agent requesting Login
         * "location" = Location of agent requesting Login  (==> Location of the machine)
         * "time" = Date and time of login (in milliseconds)
         * 
         * 
         * getAllMachineLogs return = ( "machineID"=> [ { "agentname"=>"Hammadi", "location"=>"Sfax" , etc } ,
         *                                              { "agentname"=>"3eljeyya", "location"=>"Gafsa" , etc }, 
         *                                              {} , {} etc  ] )
         * 
         */


        $logs = array();
        $machineIDS= getMachineRequestsDB();
        foreach ($machineIDS as $machineid){
            $logs[$machineid]= getMachineLog($machineid);
        }
        return $logs;
    }

?>