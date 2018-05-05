<?php
session_start();

require_once dirname(dirname(dirname(__FILE__))) . "/includes/API/TicketAPI.php";
require_once dirname(dirname(__FILE__)) . "/api/CalculManagementAPI.php" ;


if(isset($_POST["ticketNum"]))
{
    $ticketNum=$_POST["ticketNum"];



$verif= verifier_ticket($ticketNum);

if($verif!==true){

    $form= '<div class="alert alert-warning">'.$verif.'</div>';

}else{
    $line= $_SESSION["Line"];
   $nomStationSortie=$_SESSION['Station'];

    //for adding the out station into data base


     // this method shoud be decoment when the session work
     setStationOut($nomStationSortie,$ticketNum);

     //info about ticket

    $details=getTicket($_POST["ticketNum"]);


     pay_ticket($_POST["ticketNum"]);
     $cat=$details['categorie'];


    switch ($cat) {
        case 'Motos':
            $categorie='pricecat1';
            break;
        case 'twoAxles':
            $categorie='pricecat2';
            break;
        case 'treeAxles':
           $categorie='pricecat3';
            break;
    }

    $detailsParcour=caluculDistance( $details["nomLigne"],$details["nomStationDepart"],$details["nomStationArrivee"],$categorie);

    $priceTotal=caluculPrix( $details["nomLigne"],$details["nomStationDepart"],$details["nomStationArrivee"],$categorie);

            //afficher details de ticket
       if(isset($detailsParcour)){
        $form="<table class='table'>";
         $form.='<tr>
       <th>station name</th>
       <th>distance traveled</th>
       <th>prix</th>
        </tr>     ';

                foreach ($detailsParcour as $detailParcour){
                    $form.='<tr>';
                    foreach ($detailParcour as  $value) {

                        $form.='<td>'.$value.'</td>';

                    }}

                $form.='</table>';
                $form.='<table>
       <th> Total prix</th>
       <tr><td>'.$priceTotal.'</td></tr>';

                }else{
                $form="";
            }



        }
    }






?>
