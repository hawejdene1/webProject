<?php
session_start();

require_once dirname(dirname(dirname(__FILE__)))."/includes/API/TicketAPI.php" ;

 if(isset($_POST["carType"])){

$categorie = $_POST["carType"];

if (isset($_SESSION['Station']) && isset($_SESSION['Line'])) {


    //$nomLigne='A2';
    //echo "ee" .$categorie;

    $nomStationDepart = $_SESSION['Station'];
    $nomLigne = $_SESSION['Line'];

    $numTicket = insertTicket($categorie, $nomStationDepart, $nomLigne);

    if($numTicket===false){
        $details=false;
    }else {
        $details = getTicket($numTicket);
    }
    }
}
?>






