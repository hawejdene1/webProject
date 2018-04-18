<?php

//require_once "C:\Users\ASUS\Desktop\gitHub\webProject\StationManagement\DBinteraction\Operations.php";
//require_once "C:\Users\ASUS\Desktop\gitHub\webProject\StationManagement\src\Utility.php";
//require_once "C:\Users\ASUS\Desktop\git\gestion_autoroute\StationManagement\DBinteraction\CalculOperation.php";
require_once "./DBinteraction/Operations.php";
require_once "./src/Utility.php";

/**
 * This file is what you will use for calcul prix and ditance

 */
/**
 * @param $line
 * @param $name1
 * @param $name2
 * @param $cat
 * @return prix total , distance total , stations parcouru
 */

function caluculPrixDistance($line,$nameStart,$nameEnd,$cat){


    if ( ! (($stationStart= getStationDB($nameStart,$line)) && ($stationEnd= getStationDB($nameEnd,$line)))) return "stations do not exist";
    //check direction

    if ($stationStart->getDist()< $stationEnd->getDist()) $keyword='ASC' ;
    else  $keyword='DESC';


    $array =calculPrixDistance($stationStart,$stationEnd,$keyword,$cat);
    return $array;
}





function caluculPrix($line,$nameStart,$nameEnd,$cat){


    if ( ! (($stationStart= getStationDB($nameStart,$line)) && ($stationEnd= getStationDB($nameEnd,$line)))) return "stations do not exist";
    //check direction

    if ($stationStart->getDist()< $stationEnd->getDist()) $keyword='ASC' ;
    else  $keyword='DESC';


    $array =calculPrix($stationStart,$stationEnd,$keyword,$cat);
    return $array;
}











function stationBetween($line,$name1,$name2){

    if ( ! (($stationStart= getStationDB($name1,$line)) && ($stationEnd= getStationDB($name2,$line)))) return "stations do not exist";

    //check direction
    if ($stationStart->getDist()>$stationEnd->getDist()) $keyword='DESC' ;
    else  $keyword='ASC';

    $stations=stationBetweenBD($stationStart,$stationEnd,$keyword);

    return $stations;


}