<?php
// on se connecte à notre base
require "ConnexionTicket.php";
?>

<html>
<head>
<title> recherche ticket  </title>
</head>
<body>
<?php

// lancement de la requete

$sql = "SELECT * FROM ticket WHERE num = '" . $_POST['numero'] . "' AND payee='0' ";
$sql1 = "SELECT * FROM ticket WHERE num = '" . $_POST['numero'] . "' AND payee='1' ";


// on lance la requête (mysqli_query) et on impose un message d'erreur si la requête ne se passe pas bien (or die)
$req = mysqli_query($db,$sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysqli_error($db));
$req1 = mysqli_query($db,$sql1) or die('Erreur SQL !<br />'.$sql1.'<br />'.mysqli_error($db));
if($req->num_rows > 0) {
            echo "ce ticket existe dans la base de données et non encore payé "; }
        elseif($req1->num_rows > 0) {   	
        	echo 'ce ticket existe dans la base de données et déjà payé';}
        else {
        	echo ' ce ticket n`existe pas dans la base de données'; }
// Déconnection de MySQL
        mysqli_close($db);

        ?>
</body>
</html>

