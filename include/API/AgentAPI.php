<?php


require_once dirname(dirname(dirname(__FILE__))) . "/src/DBConnection.php" ;


function addAgent($cin,$l_name,$f_name,$id_station){

  $db = Connection::getInstance();

  $request = $db->prepare('INSERT INTO agent(cin,l_name,f_name,id_station) VALUES (?,?,?,?)');
  $response = $request->execute(array($cin,$l_name,$f_name,$id_station));

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
