<?php
session_start();

require "GestionTicket.php";
 if(isset($_POST["categorie"]))
       $categorie=$_POST["categorie"];


   if(isset($_SESSION["nomStationDepart"])){
   $nomStationDepart=$_SESSION["nomStationDepart"];}

if(isset($_SESSION["nomLigne"])){
   $nomLigne=$_SESSION["nomLigne"];}
if(isset($_SESSION["cin"])){
$cinAgentResponsable=$_SESSION["cin"];}


$numTicket =insertTicketBD($categorie,$nomStationDepart,$dateEntree,$nomLigne,$cinAgentResponsable);

$details=getTicket($numTicket);

?>
<style>
  #page
  {
      position:absolute;
      top:50%;
      left:50%;
      width:400px;
      height:400px;
      margin-left:-150px;
      margin-top:-100px;
      backface-visibility:visible;

  }



</style>

<html>
  <div id="page">



      num ticket :

       <?php
         echo $details["num"];
        ?>
      <br>

      heure d'enregistrement :
      <?php
      echo $details["dateEntree"];
      ?>
      <br>

      catégorie :
      <?php
      echo $details["categorie"]
      ?><br>

      station d'entrée :
      <?php
      echo $details["nomStationDepart"]
      ?>
      <br>

      <button type="submit" value="imprimer" onClick="window.print()">imprimer</button>
  </div>












