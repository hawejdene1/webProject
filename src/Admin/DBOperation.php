<?php
require_once dirname(dirname(__FILE__)) . "\DBConnection.php";


function verifyAdminDB($username,$pass){

    $bdd= Connection::getInstance();
    $req = $bdd->prepare('SELECT `username`,`pass` FROM `admin` WHERE `username`=? AND `pass`=? ');
    $req->execute(array($username,$pass));
    return $req->fetch();
}

function setAdminPassDB($newpass){

    $bdd= Connection::getInstance();
    $req = $bdd->prepare('UPDATE `admin` SET `pass`=? WHERE 1');
    $req->execute(array($newpass));

}

function setAdminUserNameDB($newusername){
    
    $bdd= Connection::getInstance();
    $req = $bdd->prepare('UPDATE `admin` SET `username`=? WHERE 1');
    $req->execute(array($newusername));

}
