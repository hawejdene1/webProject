
<?php

require_once dirname(__FILE__) . "\Station.php" ;
require_once dirname(dirname(__FILE__)) . "\DBConnection.php";

/**
 * @param $sationEnd
 * @param $sationStart
 * @param $keyword
 * @param $cat
 * @return stations parcouru
 */


function calculDistanceDB($stationStart,$stationEnd,$keyword,$cat)
{

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

    while ($station = $req->fetch()) {
        $distanceParcour = abs(($station['dist']) - ($stationStart->getDist()));
        $prix= $station[$cat];
        $parcourStation[$i] = array('nom' => $station['name'], 'distance' => $distanceParcour,'prix'=>$prix);
        $i+=1;

    }





 return $parcourStation ;

}



function calculPrixDB($stationStart,$stationEnd,$keyword,$cat)
{
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

        $prixTotal += $station[$cat];
    }


    return $prixTotal;

}