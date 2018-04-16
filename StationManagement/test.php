<?php



require_once "StationManagementAPI.php";

$S1 = new Station("A1","L",0,array(11,12,13));
$S2 = new Station("A2","L",5,array(21,22,23));
$S3 = new Station("A3","L",6,array(31,32,33));
$S4 = new Station("A4","L1",10,array(41,42,43));
$S5 = new Station("A5","L1",600,array(51,52,53));

deleteStationDB($S1);
deleteStationDB($S2);
insertStationDB($S1);
insertStationDB($S2);
deleteStationDB($S3);
deleteStationDB($S4);
insertStationDB($S3);
insertStationDB($S4);

deleteStationDB($S5);
insertStationDB($S5);

echo "dis php<br>nig<br>";

deleteLine("L1");

?>

<script>
alert("<?php echo $S3->toString(); ?>");
</script>