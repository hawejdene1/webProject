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

    function clearMachineLogDB(){
        $bdd= Connection::getInstance();
        $req = $bdd->prepare('DELETE FROM `machinerequest` WHERE 1');
        $req->execute();
    }

    function getMachineRequestsDB(){

        $bdd= Connection::getInstance();
        $req = $bdd->prepare('SELECT DISTINCT `machineID` FROM `machinerequest` WHERE 1');
        $req->execute();
        $reqs = array();
        while($rep = $req->fetch()) {array_push($reqs,$rep[0]);}

        return $reqs;
    }

    function setRecieveMachinesDB($val){
        $bdd= Connection::getInstance();
        $req=$bdd->prepare('UPDATE `acceptmachines` SET `val`=? WHERE 1' );
        $req->execute(array($val));
    }

    function getRecieveMachinesDB(){
        $bdd= Connection::getInstance();
        $req=$bdd->prepare('SELECT `val` FROM `acceptmachines` WHERE 1' );
        $req->execute();
        return $req->fetch()[0];
    }


?>