<?php
require_once dirname(dirname(__FILE__)) . "\DBConnection.php";

    function insertMachineRequestDB($machineID,$cin,$time){

        $bdd= Connection::getInstance();
        $req = $bdd->prepare('INSERT INTO `machinerequest`(`machineID`, `cin`, `time`) VALUES (?,?,?)');
        $req->execute(array($machineID,$cin,$time));
        
    }

    function deleteMachineRequestDB($machineID){
        
    $bdd= Connection::getInstance();
    $req = $bdd->prepare('DELETE FROM `machinerequest` WHERE `machinerequest`.`machineID` = ? ');
    $req->execute(array($machineID));

    }

    function getMachineLogDB($machineID){
        
            $bdd= Connection::getInstance();
            $req = $bdd->prepare('SELECT `cin`,`time` FROM `machinerequest` WHERE `machineID`=? ORDER BY `time` DESC ');
            $req->execute(array($machineID));
            $log = array();

            while($rep = $req->fetch(PDO::FETCH_ASSOC)) {array_push($log,$rep);}
            return $log;
            
            
        }

    function getMachineRequestsDB(){

        $bdd= Connection::getInstance();
        $req = $bdd->prepare('SELECT `machineID` FROM `machinerequest` WHERE 1');
        $req->execute();
        $reqs = array();
        while($rep = $req->fetch()) {array_push($reqs,$rep[0]);}

        return $reqs;
    }

   


?>