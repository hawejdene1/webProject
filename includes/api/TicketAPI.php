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
    $details_request = $db->prepare("SELECT * FROM `ticket` WHERE `num`=?");
    $details_request->execute(array($num));

    if(!$details_request){
        die('Error : ').$db->errorInfo();
    }

    $details = $details_request->fetch();
    return $details;
}

function modifTicketSortie($num){

    $db = Connection::getInstance();
    $db->query("use webproject");
    /*if (isset($_SESSION["Station"])) {
        $nomStationArrivee = $_SESSION["Station"];*}*/
        $nomStationArrivee ="sousse";




    $dateSortie = date('Y-m-d h:i:s');
    $sql=$db->prepare("UPDATE `ticket`  SET `dateSortie`=?,`nomStationArrivee`=? WHERE `num` =?");
    $sql->execute(array($dateSortie,$nomStationArrivee,$num));
    if(!$sql){
        die('Error : ').$db->errorInfo();
    }
       else
      return($num);

}

function pay_ticket($num){
    $db=connection::getInstance();
    $db->query("use webproject");
    $sql =$db->prepare("UPDATE ticket SET payee='0'  WHERE `num` =?");
    $sql->execute(array($num));

    if (!$sql) {
        die('Error : ') . $db->errorInfo();
    }
    


    return"ticket payeé";

}

function verifier_ticket($num)
{
    $db = Connection::getInstance();
    $db->query("use webproject");

    $details = getTicket($num);
    if ($details["payee"] == 1) {
     pay_ticket($num);
        modifTicketSortie($num);

    }
       else if ($details["payee"] == 0)
          {
              return "ticket deja payee";
          }

       else return"ticket n'existe pas";

}



function Reste($prix_donnee){

   $prix_totale=caluculPrix($nomLigne,$nomStationDepart,$nomStationArrivee,$categorie);
     if($prix_donne<$prix_totale){return("solde insuffisant!!");}
     else
    return($prix_totale-$prix_rendu);


}
?>
