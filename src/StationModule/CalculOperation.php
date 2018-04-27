
<?php

require_once dirname(__FILE__) . "\Station.php" ;
require_once dirname(dirname(__FILE__)) . "\DBConnection.php";

/**
 * @param $sationEnd
 * @param $sationStart
 * @param $keyword
 * @param $cat
 * @return prix total , distance total , stations parcouru
 */


function calculPrixDistance($stationStart,$stationEnd,$keyword,$cat)
{
    $bd = Connection::getInstance();
    //liste of station between dep and arr
    $bd = Connection::getInstance();
    if ($keyword == 'ASC') {



        $req = $bd->prepare('SELECT * FROM `stations` WHERE linename=? AND ( dist BETWEEN ? AND ?)
               ORDER BY dist  ');

        $req->execute(array( $stationStart->getLineName(), $stationStart->getDist(), $stationEnd->getDist()));
    }else

    {
        $req = $bd->prepare('SELECT * FROM `stations` WHERE linename=? AND ( dist BETWEEN ? AND ?)
               ORDER BY dist DESC  ');

        $req->execute(array( $stationStart->getLineName(), $stationEnd->getDist(), $stationStart->getDist()));
    }
    $i = 0;
    $prixTotal = 0;

    while ($station = $req->fetch()) {
        $distanceParcour = abs(($station['dist']) - ($stationStart->getDist()));
        $parcourStation[$i] = array('nom' => $station['name'], 'distance' => $distanceParcour);
        $i+=1;
        $prixTotal += $station[$cat];
    }
    //the last distance is the total distance

    $distanceTotal=$distanceParcour;

    $array=array($prixTotal,$distanceTotal,$parcourStation);

    return $array;

}



function calculPrix($sationStart,$sationEnd,$keyword,$cat)
{
    $bd = Connection::getInstance();



    if ($keyword == 'ASC') {



        $req = $bd->prepare('SELECT priceCat1 , priceCat2 , priceCat3 FROM `stations` WHERE linename=? AND ( dist BETWEEN ? AND ?)
               ORDER BY dist ASC ');

        $req->execute(array( $sationStart->getLineName(), $sationStart->getDist(), $sationEnd->getDist()));


    }else

    {

        $req = $bd->prepare('SELECT priceCat1 , priceCat2 , priceCat3  FROM `stations` WHERE linename=? AND ( dist BETWEEN ? AND ?)
               ORDER BY dist DESC  ');

        $req->execute(array( $sationStart->getLineName(), $sationEnd->getDist(), $sationStart->getDist()));
    }
    $i = 0;
    $prixTotal = 0;
    while ($station = $req->fetch()) {

        $prixTotal += $station[$cat];
    }


    return $prixTotal;

}