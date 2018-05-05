<?php


    require_once dirname(dirname(dirname(__FILE__))) . "/src/MachineRequest/MachineRequest.php";
    require_once dirname(__FILE__) . "/AgentAPI.php";
    require_once dirname(__FILE__) . "/ComputerAPI.php";

    function setRecieveMachines($b){
        if ($b) $val = 1;
        else $val =0;
        setRecieveMachinesDB($b);
    }
    
    function getRecieveMachines(){
        return getRecieveMachinesDB();
    }

    function acceptMachineRequest($machineid,$line,$station){
        addComputer($machineid,$line,$station);
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
            $log[$key]['Line']=$agent['line'];
            $log[$key]['Station']=$agent['station'];
            $log[$key]['AgentCIN']=$value['cin'];
        }
        $log["machineid"]=$machineid;
        return $log;
    }

    function getAllMachineLogs(){


        $logs = array();
        $machineIDS= getMachineRequestsDB();
        $i=0;
        foreach ($machineIDS as $machineid){
            $logs[$i]= getMachineLog($machineid);
            $i=$i+1;
        }
        return $logs;
    }

    function clearMachineLog(){
        clearMachineLogDB();
    }

?>