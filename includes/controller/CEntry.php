<?php
session_start();

require_once dirname(dirname(dirname(__FILE__)))."/includes/API/TicketAPI.php" ;

 if(isset($_POST["categorie"]))
       $categorie=$_POST["categorie"];





$numTicket =insertTicketDB($categorie);

$details=getTicket($numTicket);
require_once dirname(dirname(dirname(__FILE__)))."/interface/PrintTicket.php" ;
?>











