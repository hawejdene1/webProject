<?php

require_once dirname(__FILE__) . "\DBOperations.php";

function getisTerminalUtility($station)
{
    $b1 = (bool) getNextStationDB($station);
    $b2 = (bool) getPreviousStationDB($station);
    if (($b1) && (! $b2)) return -1;
    if ((! $b1) && ($b2)) return 1;
    return 0;

}

function checkPriceUtility($price){
    if (! is_array($price)) return false;
    return (count($price)==3);
}

function getNearestStationUtility($station){
    $s1= getNextStationDB($station);
    $s2= getPreviousStationDB($station);
    
    
    if (! $s1) return $s2;
    if (! $s2) return $s1;
    
    if ( $station->Dist($s1) <= $station->Dist($s2) ) return $s1;
    return $s2;
}