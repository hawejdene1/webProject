<?php

session_start();

require "Connection.php" ;

class ComputerAPI{

  public function addComputer($id_station){
    $db = Connection::getInstance();

    $request = $db->prepare('INSERT INTO computer(id_station) VALUES (?)');
    $response = $request->execute(array($id_station));

    if(!$response){
      die('Error : ').$db->errorInfo();
    }

  }

  public function deleteComputer($id){
    $db = Connection::getInstance();

    $request = $db->prepare('DELETE FROM computer WHERE `id` = ?');
    $response = $request->execute(array($id));

    if(!$response){
      die('Error : ').$db->errorInfo();
    }

  }

}
