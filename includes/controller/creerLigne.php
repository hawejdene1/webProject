<?php


require dirname(dirname(__FILE__)) . "/API/StationManagementAPI.php";

if ($_SESSION['SessionType']=="Admin") {


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

    $message= '<div class="alert alert-warning">line already exist </div>';

   }else

    {   $message= '<div class="alert alert-success">line added</div>';

    }
}} else {
    header("location: ../../index.php");
}
?>
