<?php

require_once dirname(__FILE__) . "/DBOperations.php"; 

session_start();
$_SESSION['block']=false;

function machineRequest($agentid){

    //prevents saving the same request within a short period of time
    if ($_SESSION['block']) {return false;}
    $_SESSION['block'] = true;

    //sets/gets machine id cookie
    if (! isset($_COOKIE["machineid"])) {$machineid= preg_replace("{}",'',com_create_guid());
    } else {$machineid=$_COOKIE["machineid"];}

    setcookie("machineid",$machineid,time()+(365 * 24 * 60 * 60));

    //logs request
    $time= preg_replace("/[^0-9]/", '', microtime());
    insertMachineRequestDB($machineid,$agentid,$time);

    }














?>