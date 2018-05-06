<?php

//getAgentID getAgentLocation 

 

require_once dirname(dirname(dirname(__FILE__))) . "/src/DBConnection.php" ;

function checkAgent($cin,$pass){
  
  $db = Connection::getInstance();
  $req= $db->prepare("SELECT `cin`,`f_name`,`l_name`,`station`,`line` FROM `agent` WHERE `cin`=? AND `pass`=? ");
  $req->execute(array($cin,$pass));
  $rep = $req->fetch(PDO::FETCH_ASSOC);
  return $rep;
}

function getAgent($cin){
  
  $db = Connection::getInstance();
  $req= $db->prepare("SELECT `cin`,`f_name`,`l_name`,`station`,`line` FROM `agent` WHERE `cin`=? ");
  $req->execute(array($cin));
  $rep = $req->fetch(PDO::FETCH_ASSOC);
  if(!$rep) return false;
  return $rep;
}

function getPassAgent($cin){
    $db = Connection::getInstance();
    $req= $db->prepare("SELECT  `pass` FROM `agent` WHERE `cin`=? ");
    $req->execute(array($cin));
    $rep = $req->fetch();

    return $rep['pass'];
}

function addAgent($cin,$l_name,$f_name,$line,$station,$pass){

  $db = Connection::getInstance();

  $request = $db->prepare('INSERT INTO agent(cin,l_name,f_name,station,`line`,pass) VALUES (?,?,?,?,?,?)');
  $response = $request->execute(array($cin,$l_name,$f_name,$station,$line,$pass));

  if(!$response){
    return false;
  }
  return true;

}

function deleteAgent($cin){

  $db = Connection::getInstance();

  $request = $db->prepare('DELETE FROM agent WHERE cin = ?');
  $response = $request->execute(array($cin));

  if(!$response){
    die('Error : ').$db->errorInfo();
  }

}

function changeAgentLocation($cin,$line,$station,$pass){
  
  $db = Connection::getInstance();

  $request = $db->prepare('UPDATE agent SET station = ? ,`line`=? ,`pass`=? WHERE cin = ?');
  $response = $request->execute(array($station,$line,$pass,$cin));

  if(!$response){
    die('Error : ').$db->errorInfo();
  }

}
