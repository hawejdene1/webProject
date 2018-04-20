<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 16/04/2018
 * Time: 23:16
 */
require "ConnexionTicket.php";
require "Ticket.php";



  /*
  supprime la ticket de la base des donnes


  */
function deleteTicket($num)
{
    $db = ConnexionTicket::getInstance();
    $db->query("use projetweb");
    $request = $db->prepare("SELECT * FROM `ticket` WHERE `num`=?");
    $request->execute(array($num));
    $res = $request->fetch();
    if (!$res)
    {echo "aucune ticket de ce numero";



    }
    else {
        $request =$db->prepare("DELETE FROM `ticket` WHERE `num`=?");
        $request->execute(array($num));}
}



function insertTicketBD($categorie,$nomStationDepart,$dateEntree,$nomLigne,$cinAgentResponsable)
{
    $db = ConnexionTicket::getInstance();
    $db->query("use projetweb");
    $request =$db->prepare('INSERT INTO `ticket`(`categorie`, `payee`, `nomStationDepart`,`dateEntree`, `nomLigne`,`cinAgentResponsable`) VALUES (?,?,?,?,?,?)');
    $request->execute(array($categorie,true,$nomStationDepart,$dateEntree,$nomLigne,$cinAgentResponsable));

    if(!$request){
        die('Error : ').$db->errorInfo();
    }

    $lastInsertId = $db->lastInsertId();
    return $lastInsertId;

}


function getTicket($num)
{

    $db = ConnexionTicket::getInstance();
    $details_request = $db->query("SELECT * FROM `ticket` WHERE `num`=$num");

    if(!$details_request){
        die('Error : ').$db->errorInfo();
    }

    $details = $details_request->fetch();
    return $details;
}


?>
