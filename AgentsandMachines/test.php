<?php

session_start();

require "Connection.php" ;


    $db = Connection::getInstance();

$cin=12345678;
$l_name="ltifi";
$f_name="ilyes";
$id_station=12345678;

    $request = $db->prepare('INSERT INTO agent(cin,l_name,f_name,id_station) VALUES (?,?,?,?)');
    $response = $request->execute(array($cin,$l_name,$f_name,$id_station));

    if(!$response){
      die(print_r('Error : '.$db->errorInfo()));
    }
