<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 16/04/2018
 * Time: 23:16
 */
require_once dirname(dirname(dirname(__FILE__)))."/src/StationModule/DBOperations.php";
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



function insertTicket($categorie,$nomStationDepart,$nomLigne)
{




        $dateEntree = date('Y-m-d h:i:s');

        $db = Connection::getInstance();
    if (getStationDB($nomStationDepart,$nomLigne)===false) {return false;}
    else {
        //$db->query("use webproject");
        $request = $db->prepare('INSERT INTO `ticket`(`categorie`, `payee`, `nomStationDepart`,`dateEntree`, `nomLigne`) VALUES (?,?,?,?,?)');
        $request->execute(array($categorie, 1, $nomStationDepart, $dateEntree, $nomLigne));

        if (!$request) {
            die('Error : ') . $db->errorInfo();
        }

        $lastInsertId = $db->lastInsertId();
        return $lastInsertId;
    }

}

function  setStationOut($nomStationSortie,$num){
    $db = Connection::getInstance();

    $request = $db->prepare('UPDATE `ticket` SET `nomStationArrivee`=? WHERE `num`=?');
    $request->execute(array($nomStationSortie,$num));
}

function getTicket($num)
{

    $db = Connection::getInstance();
    $details_request = $db->prepare("SELECT * FROM `ticket` WHERE `num`=?");
    $details_request->execute(array($num));

    if(!$details_request){
        die('Error : ').$db->errorInfo();
    }

    $details = $details_request->fetch(PDO::FETCH_ASSOC);
    return $details;
}

function modifTicketSortie($num){

    $db = Connection::getInstance();

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


    $details = getTicket($num);

    if($details==null){
        return"ticket n'existe pas";
    }


    if ($details["payee"] == 1) {
     pay_ticket($num);
     modifTicketSortie($num);
     return true;


    }
     if ($details["payee"] == 0)
          {
              return "ticket already payed";
          }



}



function Reste($prix_donnee){

   $prix_totale=caluculPrix($nomLigne,$nomStationDepart,$nomStationArrivee,$categorie);
     if($prix_donne<$prix_totale){return("solde insuffisant!!");}
     else
    return($prix_totale-$prix_rendu);


}
?>
