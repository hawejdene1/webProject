<?php


require_once dirname(__FILE__) . "\Station.php" ;
require_once dirname(dirname(__FILE__)) . "\DBConnection.php";


function insertStationDB($station){
    
$bdd= Connection::getInstance();
$req = $bdd->prepare('INSERT INTO `stations`(`name`, `lineName`, `dist`, `pricecat1`,`pricecat2`,`pricecat3`) VALUES (?,?,?,?,?,?)');
$req->execute(array($station->getName(),$station->getLineName(),$station->getDist(),$station->getPrice()[0],$station->getPrice()[1],$station->getPrice()[2]));

}


function deleteStationDB($station){
    $bdd= Connection::getInstance();

    $req = $bdd->prepare('DELETE FROM `stations` WHERE `name` = ? AND `linename` = ?');
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

function updatePriceByPercentDB($percent){


    $bdd= Connection::getInstance();
    $req = $bdd->query('SELECT  `pricecat1`, `pricecat2`, `pricecat3`, `name`,`linename` FROM `stations` ');
   while ( $prices=$req->fetch(PDO::FETCH_ASSOC)){

    $prices['pricecat1']+=($prices['pricecat1']*$percent)/100;
    $prices['pricecat2']+=($prices['pricecat2']*$percent)/100;
    $prices['pricecat3']+=($prices['pricecat3']*$percent)/100;

  //update price of each staition
       $req1 = $bdd->prepare('UPDATE `stations` SET `pricecat1`=?,`pricecat2`=?,`pricecat3`=? WHERE name=? AND linename=?');
       $req1->execute(array($prices['pricecat1'],$prices['pricecat2'],$prices['pricecat3'],$prices['name'],$prices['linename']));

  }
   return true;






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

function allLineBD(){
    $bdd= Connection::getInstance();
    $req = $bdd->query('SELECT DISTINCT linename FROM `stations` ');
    $i=0;

     if(!$req) return "data base empty" ;
    while ($result=$req->fetch()){
        $line[$i]=$result['linename'];
        $i+=1;

}
    return $line;
}

function getTerminalsStationsDB($linename)
{
    $bdd = Connection::getInstance();

    $req = $bdd->prepare('SELECT * FROM  stations WHERE  
    ((dist=(SELECT max(dist) FROM stations WHERE linename=?  ))
     OR (dist=(  SELECT min(dist) FROM stations WHERE linename=?)))
      AND linename=?');

    $req->execute(array($linename,$linename,$linename));
    $i=0;
    while($result=$req->fetch()){
        $stations[$i] = new Station($result[0],$result[1],$result[2],array($result[3],$result[4],$result[5]));
        $i+=1;
    }

   return $stations;

}


function stationBetweenDB($sationStart,$sationEnd,$keyword){
    $bd = Connection::getInstance();
    if ($keyword == 'ASC') {

        $req = $bd->prepare('SELECT * FROM `stations` WHERE linename=? AND ( dist BETWEEN ? AND ?)
               ORDER BY dist  ');

        $req->execute(array( $sationStart->getLineName(), $sationStart->getDist(), $sationEnd->getDist()));
    }else

    {
        $req = $bd->prepare('SELECT * FROM `stations` WHERE linename=? AND ( dist BETWEEN ? AND ?)
               ORDER BY dist DESC  ');

        $req->execute(array( $sationStart->getLineName(), $sationEnd->getDist(), $sationStart->getDist()));
    }

  $i=0;

    while ($result = $req->fetch()) {
        $staions [$i] = new Station($result[0],$result[1],$result[2],array($result[3],$result[4],$result[5]));
        $i+=1;
    }

    return $staions;
}

function getStationsInLineDB($line){
    $bdd= Connection::getInstance();
    $req = $bdd->prepare('SELECT * FROM `stations` WHERE  linename=? ');
    $req->execute(array($line));

    $i=0;
    while ($result = $req->fetch(PDO::FETCH_ASSOC)) {
        $staions [$i] = $result['name'];
        $i+=1;
    }

    return $staions;

}












