<?php

require '../StationManagementAPI.php';
require_once "C:\Users\ASUS\Desktop\gitHub\webProject\StationManagement\src\Utility.php";
$linename="";
if ($_SERVER['REQUEST_METHOD'] === 'POST' )  {

    if($_POST['submit']==='ligne') {

        $linename = $_POST['linename'];
        $staionsTerminalName = getTerminalsNamesUtility($linename);
        header('../view/IcreerPeage.php?linename='.$linename);

    }else {


        $new = htmlspecialchars($_POST['new']);
        $old = htmlspecialchars($_POST['old']);
        $dist = htmlspecialchars($_POST['dist']);
        $price = array($_POST["priceCat1St1"], $_POST["priceCat2St1"], $_POST["priceCat3St1"]);


        echo appendTerminalStation($new, $old, $linename, $dist, $price);
    }

}else{

    $lines=allLineUtility();
    require '../view/IcreerPeage.php';

}