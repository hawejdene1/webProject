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

    $verif= addLine($linename,$name1,$name2,$dist,$price1,$price2);

    //if linename line exists errer
    if($verif==true){
        //after a non success add its gone show this message and a hypertzxt to the dashboard page or reload this page
        $_SESSION['message']="line already exits";
        echo '<p>line already exits</p>';
        require_once dirname(dirname(dirname(__FILE__)))."/interface/adminDashboard/addLine.php";

    } else {   //after a success add its gone show this message and a hypertzxt to the dashboard page
        $_SESSION['message']="line ajouter avec succes";
        header('../../interface/operationSuccess');
    }
} else {

    require_once dirname(dirname(dirname(__FILE__)))."/interface/adminDashboard/addLine.php";

}
    
}
