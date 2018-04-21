<?php
// on se connecte à notre base
require "ConnexionTicket.php";
?>

<html>
<head>
<title>Modification de l'etat de ticket </title>
</head>
<body>
<?php

// lancement de la requête
$sql=  "UPDATE ticket  SET dateSortie='".$_POST ['DateSortie']."'    WHERE num = '".$_POST['nb']."'";

//$sql ='UPDATE ticket SET dateSortie='" . $_POST['DateSortie'] . "'  WHERE num='" . $_POST['numero'] . "'';

// on exécute la requête (mysql_query) et on affiche un message au cas où la requête ne se passait pas bien (or die)
mysqli_query($db,$sql)  or die('Erreur SQL !'.$sql.'<br />'.mysqli_error($db));
echo "Date de sortie de l'autoroute enregistrée avec succès ";

// on ferme la connexion à la base
mysqli_close($db);
?>


</body>
</html>