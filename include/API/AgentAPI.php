<?php

//getAgentID getAgentLocation 



require_once dirname(dirname(dirname(__FILE__))) . "/src/DBConnection.php" ;

function getAgent($cin,$pass){
  
  $db = Connection::getInstance();
  $req= $db->prepare("SELECT `f_name`,`l_name`,`id_station` FROM `agent` WHERE `cin`=? AND `pass`=? ");
  $req->execute(array($cin,$pass));
  $rep = $req->fetch(PDO::FETCH_ASSOC);
  return $rep;
}

function addAgent($cin,$l_name,$f_name,$id_station,$pass){

  $db = Connection::getInstance();

  $request = $db->prepare('INSERT INTO agent(cin,l_name,f_name,id_station,pass) VALUES (?,?,?,?,?)');
  $response = $request->execute(array($cin,$l_name,$f_name,$id_station,$pass));

  if(!$response){
    die(print_r('Error : '.$db->errorInfo()));
  }

}

function deleteAgent($cin){

  $db = Connection::getInstance();

  $request = $db->prepare('DELETE FROM agent WHERE cin = ?');
  $response = $request->execute(array($cin));

  if(!$response){
    die('Error : ').$db->errorInfo();
  }

}

function changeAgentLocation($cin,$id_station){
  
  $db = Connection::getInstance();

  $request = $db->prepare('UPDATE agent SET id_station = ? WHERE cin = ?');
  $response = $request->execute(array($id_station,$cin));

  if(!$response){
    die('Error : ').$db->errorInfo();
  }

}
