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

function modifTicketSortie($num,$dateSortie){

      $db=Connection::getInstance();

      $sql=  "UPDATE `ticket`  SET `dateSortie`=$dateSortie  WHERE `num` =$num";

      mysqli_query($db,$sql)  or die('Erreur SQL !'.$sql.'<br />'.
        mysqli_error($db));

      return "la date de sortie est ajoutée ";

}
function pay_ticket($num){
    $db=connection::getInstance();

    $sql ="UPDATE ticket SET payee='1'  WHERE `num` =$num";

    mysqli_query($db,$sql) or die('Erreur SQL !'.$sql.'<br />'.mysqli_error($db));

    mysqli_close($db);
    return"ticket payeé";

}

function verifier_ticket($num){
    $db=Connection::getInstance();

    $sql = "SELECT * FROM ticket WHERE `num` =$num AND payee='0' ";
    $sql1 = "SELECT * FROM ticket WHERE `num` = $num AND payee='1' ";

    $req = mysqli_query($db,$sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysqli_error($db));
$req1 = mysqli_query($db,$sql1) or die('Erreur SQL !<br />'.$sql1.'<br />'.mysqli_error($db));

if($req->num_rows > 0) {
            return "ce ticket existe dans la base de données et non encore payé "; }
        elseif($req1->num_rows > 0) {       
            return 'ce ticket existe dans la base de données et déjà payé';}
        else {
            return ' ce ticket n`existe pas dans la base de données'; }
// Déconnection de MySQL
        mysqli_close($db);

}
?>
