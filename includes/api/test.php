<?php


 require_once dirname(__FILE__) . "/StationManagementAPI.php";

 require_once  dirname(__FILE__) ."/CalculManagementAPI.php";

 $sationParcour=caluculDistance("A2","beja","bizert","pricecat1");
 var_dump($sationParcour);
 $prix=caluculPrix("A2","beja","bizert","pricecat1");


 var_dump($prix);