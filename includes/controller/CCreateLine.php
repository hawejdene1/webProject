<?php

session_start();


require_once  dirname(dirname(__FILE__)) . "/API/StationManagementAPI.php";



if(!isset($_SESSION['SessionType']) || $_SESSION['SessionType'] != "Admin") { 
    header("location: ../../index.php");
} else {

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $linename=htmlspecialchars($_POST['linename']);
    $name1=htmlspecialchars($_POST['name1']);
    $name2=htmlspecialchars($_POST['name2']);
    $dist=htmlspecialchars($_POST['dist']);
    $price1=array($_POST["priceCat1St1"],$_POST["priceCat2St1"],$_POST["priceCat3St1"]);
    $price2=array($_POST["priceCat1St2"],$_POST["priceCat2St2"],$_POST["priceCat3St2"]);

    $verif = false;
    if (!( $linename && $name1 && $name2 )) $verif = "invalid names";
    if ((! $verif) && ($name1==$name2)) $verif= "Stations must be different";
    if ((! $verif ) && ($dist==0)) $verif="invalid distance";
    if ((! $verif ) && ((strlen(implode($price1))<3) || (strlen(implode($price2))<3))) $verif="Invalid Prices";

    // adding station if there is no input error
    if (! $verif ) $verif= addLine($linename,$name1,$name2,$dist,$price1,$price2);

    //if there is an error
    if($verif==true){
        //after a non success add its gone show this message and a hypertzxt to the dashboard page or reload this page
        $message='<div class="alert alert-warning">'.$verif.'</div>';


        require_once dirname(dirname(dirname(__FILE__)))."/interface/adminDashboard/addLine.php";

    } else {   //after a success add its gone show this message and a hypertzxt to the dashboard page
        $message="<div class='alert alert-success'> line successfully added  </div>";
        header('../../interface/operationSuccess');
    }
} else {

    require_once dirname(dirname(dirname(__FILE__)))."/interface/adminDashboard/addLine.php";

}
    
}
