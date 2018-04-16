<?php

require_once "/../src/Station.php" ;
require_once "Connection.php";


function insertStationDB($station){
    
$bdd= Connection::getInstance();
$req = $bdd->prepare('INSERT INTO `stations`(`name`, `lineName`, `dist`, `pricecat1`,`pricecat2`,`pricecat3`) VALUES (?,?,?,?,?,?)');
$req->execute(array($station->getName(),$station->getLineName(),$station->getDist(),$station->getPrice()[0],$station->getPrice()[1],$station->getPrice()[2]));

}


function deleteStationDB($station){
    $bdd= Connection::getInstance();
    $req = $bdd->prepare('DELETE FROM `stations` WHERE `stations`.`name` = ? AND `stations`.`linename` = ?');
    $req->execute(array($station->getName(),$station->getLineName()));
}


function getStationDB($name,$linename){

    $bdd= Connection::getInstance();
    $req = $bdd->prepare('SELECT * FROM `stations` WHERE name=? AND linename=? ');
    $req->execute(array($name,$linename));
    $result=$req->fetch();
    if (! $result) return false;
    $result = new Station($result[0],$result[1],$result[2],array($result[3],$result[4],$result[5]));
    return $result;

}

function updateStationPriceDB($station,$price){

    $bdd= Connection::getInstance();
    $req = $bdd->prepare('UPDATE `stations` SET `pricecat1`=?,`pricecat2`=?,`pricecat3`=? WHERE name=? AND linename=?');
    $req->execute(array($price[0],$price[1],$price[2],$station->getName(),$station->getLineName()));

}

function updateStationDistDB($station,$dist){
    
    $bdd= Connection::getInstance();
    $req = $bdd->prepare('UPDATE `stations` SET `dist`=? WHERE name=? AND linename=?');
    $req->execute(array($dist,$station->getName(),$station->getLineName()));
    
    }



      
function countStationsinLineDB($linename){
    $bdd= Connection::getInstance();
    $req= $bdd->prepare('SELECT count(1) FROM stations WHERE linename=?;');
    $req->execute(array($linename));
    $result=$req->fetch()[0];
    return $result;

}


function getNextStationDB($station){

    $bdd= Connection::getInstance();
    $req= $bdd->prepare('SELECT * FROM stations WHERE dist=(SELECT MIN(dist) FROM stations WHERE (dist>?)) ');
    $req->execute(array($station->getDist()));
    $result= $req->fetch();
    if (! $result[0]) {return false;}
    $result = new Station($result[0],$result[1],$result[2],array($result[3],$result[4],$result[5]));
    return $result;

}

function getPreviousStationDB($station){
    
        $bdd= Connection::getInstance();
        $req= $bdd->prepare('SELECT * FROM stations WHERE dist=(SELECT MAX(dist) FROM stations WHERE (dist<?))');
        $req->execute(array($station->getDist()));
        $result= $req->fetch();
        if (! $result[0]) {return false;}
        $result = new Station($result[0],$result[1],$result[2],array($result[3],$result[4],$result[5]));
        return $result;
    
    }

function getStationByDistDB($dist,$linename){

    $bdd= Connection::getInstance();
    $req = $bdd->prepare('SELECT * FROM `stations` WHERE dist=? AND linename=? ');
    $req->execute(array($dist,$linename));
    $result=$req->fetch();
    if (! $result) return false;
    $result = new Station($result[0],$result[1],$result[2],array($result[3],$result[4],$result[5]));
    return $result;
}

function deleteLineDB($linename){

    $bdd= Connection::getInstance();
    $req = $bdd->prepare('DELETE FROM `stations` WHERE linename=? ');
    $req->execute(array($linename));
    
}