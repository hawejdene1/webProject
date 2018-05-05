<?php


require_once dirname(dirname(dirname(__FILE__))) . "/src/StationModule/DBOperations.php";
require_once dirname(dirname(dirname(__FILE__))) . "/src/StationModule/Utility.php";


/**
* This file is what you will use for managing stations
* it acts as an 'interface' between the database and required functionality
* Only use funtions defined in this file to prevent data corruption, the code will handle everything else
* you can infer what each function does by its name
*
*
* if there are any bugs, corner cases or missing functionality let me know.
*
*/



function addStation($name,$line,$name1,$name2,$distfromS1,$price=array(0,0,0)){

    /**
     * Parameters:
     * Name = the name of the new station you want to add.
     * line = the name of the line in which you will add the station.
     * name1 = name of the first station
     * name2 = name of the terminal station to determine direction
     *
     * distfromS1 = the distance of the new staion from name1
     * price = array of three ints
     *
     */

    // check existance in Database, each station is identified by key pair (Nom, NomLigne)
    if ( ! (($station1= getStationDB($name1,$line)) && ($station2= getStationDB($name2,$line)))) return "stations do not exist";
    if (getStationDB($name,$line)) return "station already exists";

    // calculate distance
    if ($station1->getDist() > $station2->getDist()) {$dist=$station1->getDist()-$distfromS1;}
    else {$dist=$station1->getDist()+$distfromS1;}

    // check if new station is not in the location of an existing station
    if ($sationExist=getStationByDistDB($dist,$line)) return "station :".$sationExist->getName().'there is already a station in that place ';

    // we can now safely create and insert our station
    $newstation = new Station($name,$line,$dist,$price);
    insertStationDB($newstation);
    return "station insert with succes";

}



function addLine($linename,$name1,$name2,$dist,$price1=array(0,0,0),$price2=array(0,0,0)){

    /**
     * a line is simply two terminal stations with the same linename attribute
     * defining a data structure for line is redundant
     *
     * linename = new line name
     *
     */

     if ($name1==$name2) return "Stations must be differant";

    //check if line exists
    if (countStationsinLineDB($linename)) return "Line already exists";

    //create terminal stations;
    $station1 = new Station($name1,$linename,0,$price1);
    $station2 = new Station($name2,$linename,$dist,$price2);

    //add to DB
    insertStationDB($station1);
    insertStationDB($station2);
    return false;

}

/**
 * THIS FUNCTION IS REDUNDNAT, USE ADD MACHINE INSTEAD
 */
function appendTerminalStation($new,$old,$linename,$dist,$price=array(0,0,0)){

    //check if old terminal exists
    $oldterminal = getStationDB($old,$linename);


    //check if old terminal is terminal
    if (! getisTerminalUtility($oldterminal)) return "station to replace is not terminal";

    //check if new station doesn't exists
    if (getStationDB($new,$linename)) return "station already exists";

    //create new terminal
    $pos = getisTerminalUtility($oldterminal);
    $dist = $oldterminal->getDist() + ($pos * $dist);
    $newterminal = New Station($new,$linename,$dist,$price);

    //insert new terminal
    insertStationDB($newterminal);

    return false;

}

function modifyStationPrice($name,$linename,$price){

        //check if station exist
        $station = getStationDB($name,$linename);
        if (! $station) return "station does not exist";

        //check price
        if (! checkPriceUtility($price)) return "invalid price value";

        updateStationPriceDB($station,$price);

        return "The update was successful";

}

function updatePriceByPercent($percent){

    updatePriceByPercentDB($percent);
    return false;

}

function modifyStationDist($name,$linename,$dist){

    /**
     * This function will not preserve station order
     * if station is not terminal, $dist is the distance from the PREVIOUS station
     */

    //check if station exist
    $station = getStationDB($name,$linename);
    if (! $station) return "station does not exist";

    //fetch next and previous station
    $nextstation = getNextStationDB($station);
    $prevstation = getPreviousStationDB($station);

    //first terminal case
    if (!$prevstation) {updateStationDistDB($station,$nextstation->getDist()-$dist); return true;}

    //second terminal case
    if (!$nextstation) {updateStationDistDB($station,$prevstation->getDist()+$dist); return true;}


    // check if new dist is not in the location of an existing station
    $dist = $prevstation->getDist()+$dist;
    if (getStationByDistDB($dist,$linename)) return "invalid distance";

    //Not terminal case
    updateStationDistDB($station,$dist); return false;

}

function deleteStation($name,$line){

     //check if station exists
    $station=getStationDB($name,$line);

    if (! $station) return "station does not exist";

    //check if station is terminal
    $stations=getStationsInLine($line);

    if ( $stations!=false ){
         if (sizeof(($stations))==2) return "cant delet only two stations in line";
        deleteStationDB($station);
        }else{



     return "sation deleted ";
    }
}

function stationExists($name,$line){
    $station=getStationDB($name,$line);

    if (! $station) return false;
    return true;
}

function deleteLine($line){
    //even if line does not exist it does'nt bother
    deleteLineDB($line);
    return "line deleted";
}


/**
 * @return array of all line names
 */

function getLines()
{
    return allLineBD();
}



function getStationsInLine($line){

    if(!lineExists($line)) return "false";
    return getStationsInLineDB($line);
}

function lineExists($linename){
    return (countStationsinLineDB($linename)!=0);
}

/**
 * @param $linename
 * @return array content two terminal stations
 */
function getTerminalsNames($linename){

    if (! lineExists($linename)) return "line does not exist";

    $stations=getTerminalsStationsDB($linename);
    $i=0;
    foreach ($stations as $station){
        $nameStations[$i]=$station->getName();
        $i+=1;
    }
    return $nameStations;
}



function getStationBetween($line,$name1,$name2){

        if ( ! (($stationStart= getStationDB($name1,$line)) && ($stationEnd= getStationDB($name2,$line)))) return "stations do not exist";

        //check direction
        if ($stationStart->getDist()>$stationEnd->getDist()) $keyword='DESC' ;
        else  $keyword='ASC';

        $stations=stationBetweenDB($stationStart,$stationEnd,$keyword);
        $result = array();
        foreach($stations as $station){
            array_push($result,$line.":".$station->getName());
        }
        return $result;


    }
