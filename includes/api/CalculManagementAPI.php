<?php


require_once dirname(dirname(dirname(__FILE__))) . "/src/StationModule/DBOperations.php";
require_once dirname(dirname(dirname(__FILE__))) . "/src/StationModule/CalculOperation.php";
require_once dirname(dirname(dirname(__FILE__))) . "/src/StationModule/Utility.php";

/**
 * This file is what you will use for calcul prix and ditance

 */
/**
 * @param $line
 * @param $name1
 * @param $name2
 * @param $cat
 * @return stations nom et distance parcouru dans un tableau associative array('nom' => $station['name'], 'distance' => $distanceParcour)
 */

function caluculDistance($line,$nameStart,$nameEnd){


    if ( ! (($stationStart= getStationDB($nameStart,$line)) && ($stationEnd= getStationDB($nameEnd,$line)))) return "stations do not exist";
    //check direction

    if ($stationStart->getDist()< $stationEnd->getDist()) $keyword='ASC' ;
    else  $keyword='DESC';


    $array =calculDistanceDB($stationStart,$stationEnd,$keyword);
    return $array;
}





function caluculPrix($line,$nameStart,$nameEnd,$cat){


    if ( ! (($stationStart= getStationDB($nameStart,$line)) && ($stationEnd= getStationDB($nameEnd,$line)))) return "stations do not exist";
    //check direction

    if ($stationStart->getDist()< $stationEnd->getDist()) $keyword='ASC' ;
    else  $keyword='DESC';



    $array =calculPrixDB($stationStart,$stationEnd,$keyword,$cat);
    return $array;
}



