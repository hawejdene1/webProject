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

        /**
         * returns array
         * 0 ==> the history login requests concerning first machine
         * 1 ==> the history login requests concerning second machine
         * etc
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
         * getAllMachineLogs return = 
         * ( 
         *  [0] => [ "machineid" => firstmachine's id, 
         *           [0]=> { "agentname"=>"Hammadi", "location"=>"Sfax" , etc } ,      //first machine's first request
         *           [1]=> { "agentname"=>"3eljeyya", "location"=>"Gafsa" , etc },    //first machine's second request
         *           [2]=> { "agentname"=>"3eljeyya", "location"=>"Gafsa" , etc },   //first machine's third request
         *           etc                                            
         *         ]
         * 
         *  [1] => [ "machineid" => secondmachine's id, 
         *           [0]=> { "agentname"=>"Hammadi", "location"=>"Sfax" , etc } ,      //second machine's first request
         *           [1]=> { "agentname"=>"3eljeyya", "location"=>"Gafsa" , etc },    //second machine's second request
         *           [2]=> { "agentname"=>"3eljeyya", "location"=>"Gafsa" , etc },   //second machine's third request
         *           etc                                            
         *         ]
         * 
         *  [2] => ....
         *  . 
         *  .
         * )
         * 
         */


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