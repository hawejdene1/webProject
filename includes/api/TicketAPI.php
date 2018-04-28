<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 16/04/2018
 * Time: 23:16
 */
require_once dirname(dirname(dirname(__FILE__)))."/src/DBConnection.php";
require_once dirname(dirname(dirname(__FILE__)))."/src/TicketManagement/Ticket.php";



  /*
  supprime la ticket de la base des donnes


  */

function deleteTicket($num)
{
    $db = Connection::getInstance();
   // $db->query("use projetweb");
    $request = $db->prepare("SELECT * FROM `ticket` WHERE `num`=?");
    $request->execute(array($num));
    $res = $request->fetch();
    if (!$res)
    {return "aucune ticket de ce numero";



    }
    else {
        $request =$db->prepare("DELETE FROM `ticket` WHERE `num`=?");
        $request->execute(array($num));}
        return false;
}



function insertTicketDB($categorie)
{


    if (isset($_SESSION["Station"])) {
        $nomStationDepart = $_SESSION["Station"];
    }

    if (isset($_SESSION["Line"])) {
        $nomLigne = $_SESSION["Line"];
        $dateEntree = date('Y-m-d h:i:s');

        $db = Connection::getInstance();
        //$db->query("use webproject");
        $request = $db->prepare('INSERT INTO `ticket`(`categorie`, `payee`, `nomStationDepart`,`dateEntree`, `nomLigne`) VALUES (?,?,?,?,?)');
        $request->execute(array($categorie, true, $nomStationDepart, $dateEntree, $nomLigne));

        if (!$request) {
            die('Error : ') . $db->errorInfo();
        }

        $lastInsertId = $db->lastInsertId();
        return $lastInsertId;

    }
}

function getTicket($num)
{

    $db = Connection::getInstance();
    $details_request = $db->query("SELECT * FROM `ticket` WHERE `num`=$num");

    if(!$details_request){
        die('Error : ').$db->errorInfo();
    }

    $details = $details_request->fetch();
    return $details;
}
?>