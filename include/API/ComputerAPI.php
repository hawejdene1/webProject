<?php

require_once dirname(dirname(dirname(__FILE__))) . "/src/DBConnection.php" ;

function addComputer($id,$id_station){
  $db = Connection::getInstance();

  $request = $db->prepare('INSERT INTO computer(id,id_station) VALUES (?,?)');
  $response = $request->execute(array($id,$id_station));

  if(!$response){
    die('Error : ').$db->errorInfo();
  }

}

function deleteComputer($id){
  $db = Connection::getInstance();

  $request = $db->prepare('DELETE FROM computer WHERE `id` = ?');
  $response = $request->execute(array($id));

  if(!$response){
    die('Error : ').$db->errorInfo();
  }
}

  function getComputer($id){
    
    $db = Connection::getInstance();
    $req= $db->prepare("SELECT `id_station` FROM `computer` WHERE `id`=? ");
    $req->execute(array($id));
    $rep = $req->fetch(PDO::FETCH_ASSOC);
    
    return $rep;
  }
  


