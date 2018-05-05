<?php

require_once dirname(__FILE__) . "/DBOperations.php"; 

function machineRequest($cin){

    //prevents saving the same request within a short period of time
    if ($_SESSION['block']) {return false;}
    $_SESSION['block'] = true;
    

    if(isset($_COOKIE['machineid'])) {$machineid = $_COOKIE['machineid'];}
    else{

        //$machineid = substr(com_create_guid(),1,-2);
        $machineid='6';
        setcookie( "machineid", $machineid, time()+(365 * 24 * 60 * 60),"/"); 
       // require "SET.php";
       
       $_COOKIE['machineid'] = $machineid;

    }

    //logs request
    $time= preg_replace("/[^0-9]/", '', microtime());
    insertMachineRequestDB($machineid,$cin,$time);

    }














?>