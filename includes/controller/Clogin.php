<?php


require_once  dirname(dirname(__FILE__)) . "/API/AuthorisationAPI.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $login=htmlspecialchars($_POST['agentLogin']);
    $pwd=htmlspecialchars($_POST['agentPwd']);
    $type=htmlspecialchars($_POST['radioPriviledges']);
    
    $function = "authorise" . $type ;
    $autho = $function($login,$pwd);

    if ($autho) { echo '<p>' . $autho . '</p>' ;}
    else
    {   
        header("location: ".strtolower($type));    
    }

