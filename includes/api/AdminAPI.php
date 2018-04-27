<?php
require_once dirname(dirname(dirname(__FILE__))) . "\src\Authorisation\DBOperations.php";


function verifyAdmin($user,$pass){
    return verifyAdminDB($user,$pass);
}

function addAdmin($user,$pass){
    if getAdminDB($user) return "admin already exists";
    addAdminDB($user,$pass);
    return false;
}

function deleteAdmin($user,$pass){
    if (getAdminsDB()==1) return "You can't delete all admins";
    deleteAdminDB($user,$pass);
    if ($_SESSION['admin']==$user) {
        session_unset(); 
        session_destroy(); 
    }
}