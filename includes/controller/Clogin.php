<?php

session_start();
header("Refresh:0");

require_once  dirname(dirname(__FILE__)) . "/API/AuthorisationAPI.php";



if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $login = htmlspecialchars($_POST['agentLogin']);
    $pwd = htmlspecialchars($_POST['agentPwd']);
    $type = htmlspecialchars($_POST['radioPriviledges']);
    $_SESSION['errorMessages'] = "";

    $function = "authorise" . $type;
    $autho = $function($login, $pwd);
    if ($autho) {
        $_SESSION['errorMessages'] = $autho;
        header('location: ../../interface/login.php');
    } else {
        $_SESSION['SessionType'] = $type;
        header("location: ../../interface/". strtolower($type)."Dashboard.php");
    }

}

?>