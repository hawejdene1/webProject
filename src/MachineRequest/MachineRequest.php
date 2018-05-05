<?php

require_once dirname(__FILE__) . "/DBOperations.php"; 

function machineRequest($cin){

    //prevents saving the same request within a short period of time
    if ($_SESSION['block']) {return false;}
    $_SESSION['block'] = true;
    

    if(isset($_COOKIE['machineid'])) {$machineid = $_COOKIE['machineid'];}
    else{

        $machineid = substr(getGUID(),1,-2);
        //$machineid='6';
        setcookie( "machineid", $machineid, time()+(365 * 24 * 60 * 60),"/"); 
       // require "SET.php";
       
       $_COOKIE['machineid'] = $machineid;

    }

    //logs request
    $time= preg_replace("/[^0-9]/", '', microtime());
    insertMachineRequestDB($machineid,$cin,$time);

    }





function getGUID(){
    if (function_exists('com_create_guid')){
        return com_create_guid();
    }else{
        mt_srand((double)microtime()*10000);//optional for php 4.2.0 and up.
        $charid = strtoupper(md5(uniqid(rand(), true)));
        $hyphen = chr(45);// "-"
        $uuid = chr(123)// "{"
            .substr($charid, 0, 8).$hyphen
            .substr($charid, 8, 4).$hyphen
            .substr($charid,12, 4).$hyphen
            .substr($charid,16, 4).$hyphen
            .substr($charid,20,12)
            .chr(125);// "}"
        return $uuid;
    }
}








?>