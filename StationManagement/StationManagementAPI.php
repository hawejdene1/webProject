<?php


require_once "./DBinteraction/Operations.php";
require_once "./src/Utility.php";

//require_once "C:\Users\ASUS\Desktop\gitHub\webProject\StationManagement\DBinteraction\Operations.php";
//require_once "C:\Users\ASUS\Desktop\gitHub\webProject\StationManagement\src\Utility.php";

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





function addStationBetween($name,$line,$name1,$name2,$distfromS1,$price){

    /**
     * Parameters:
     * Name = the name of the new station you want to add.
     * line = the name of the line in which you will add the station.
     * name1 = name of the first station
     * name2 = name of the second station
     * distfromS1 = the distance of the new staion from name1
     * price = array of three ints 
     * 
     */

    // check existance in Database, each station is identified by key pair (Nom, NomLigne)
    if ( ! (($station1= getStationDB($name1,$line)) && ($station2= getStationDB($name2,$line)))) return "stations do not exist";
    if (getStationDB($name,$line)) return "station already exists";

    // check if the new proposed station is actually between Station1 and Station2
    if ($distfromS1 >= $station1->dist($station2)) return "invalid distance";

    // calculate distance
    if ($station1->getDist() > $station2->getDist()) {$dist=$station1->getDist()-$distfromS1;}
    else {$dist=$station1->getDist()+$distfromS1;}

    // check if new station is not in the location of an existing station 
    if (getStationByDistDB($dist,$line)) return "invalid distance";

    // we can now safely create and insert our station
    $newstation = new Station($name,$line,$dist,$price);
    insertStationDB($newstation);
    return false;

}



function addLine($linename,$name1,$name2,$dist,$price1,$price2){
    
    /**
     * a line is simply two terminal stations with the same linename attribute
     * defining a data structure for line is redundant
     * 
     * linename = new line name 
     * 
     */


    //check if line exists
    if (countStationsinLineDB($linename)) return false;

    //create terminal stations;
    $station1 = new Station($name1,$linename,0,$price1);
    $station2 = new Station($name2,$linename,$dist,$price2);

    //add to DB
    insertStationDB($station1);
    insertStationDB($station2);
    return true;

}

function appendTerminalStation($new,$old,$linename,$dist,$price){
     echo $old;
     echo 'lin'.$linename;
    //check if old terminal exists
    $oldterminal = getStationDB($old,$linename);
    echo $oldterminal->toString();
    //if (! $oldterminal) return "terminal to replace doesn't exist";

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
    if ( getisTerminalUtility($station) ){

         $newterminal= getNearestStationUtility($station);

         if (getisTerminalUtility($newterminal)) return "Can't delete line";
        }

    deleteStationDB($station);

    return false;
}

function deleteLine($line){

    deleteLineDB($line);
    return false;
}


/**
 * @return array of all line names
 */

function allLine()
{
    return allLineDB();
}

/**
 * @param $linename
 * @return array content two terminal stations
 */
function getTerminalsNames($linename){

    $stations=getTerminalsStationsDB($linename);
    $i=0;
    foreach ($stations as $station){
        $nameStations[$i]=$station->getName();
        $i+=1;
    }
    return $nameStations;
}

function lineExit($linename){
    return (countStationsinLineDB($linename)!=0);
}