<?php


session_start();
require_once dirname(dirname(dirnmae(__FILE__))) . "/src/DBConnection.php" ;


public function addAgent($cin,$l_name,$f_name,$id_station){

  $db = Connection::getInstance();

  $request = $db->prepare('INSERT INTO agent(cin,l_name,f_name,id_station) VALUES (?,?,?,?)');
  $response = $request->execute(array($cin,$l_name,$f_name,$id_station));

  if(!$response){
    die(print_r('Error : '.$db->errorInfo()));
  }

}

public function deleteAgent($cin){

  $db = Connection::getInstance();

  $request = $db->prepare('DELETE FROM agent WHERE cin = ?');
  $response = $request->execute(array($cin));

  if(!$response){
    die('Error : ').$db->errorInfo();
  }

}

public function changeAgent($cin,$id_station){
  session_start();
  require "Connection.php" ;
  
  $db = Connection::getInstance();

  $request = $db->prepare('UPDATE agent SET id_station = ? WHERE cin = ?');
  $response = $request->execute(array($id_station,$cin));

  if(!$response){
    die('Error : ').$db->errorInfo();
  }

}
