<?php

require_once dirname(dirname(dirname(__FILE__))) . "/src/DBConnection.php" ;

function addComputer($id,$line,$station){
  $db = Connection::getInstance();
  $request = $db->prepare('INSERT INTO computer(id,`line`,station) VALUES (?,?,?)');
  $response = $request->execute(array($id,$line,$station));

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
    $req= $db->prepare("SELECT * FROM `computer` WHERE `id`=? ");
    $req->execute(array($id));
    $rep = $req->fetch(PDO::FETCH_ASSOC);
    
    return $rep;
  }
  


