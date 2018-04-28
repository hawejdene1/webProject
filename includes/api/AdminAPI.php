<?php
require_once dirname(dirname(dirname(__FILE__))) . "\src\Admin\DBOperation.php";


function verifyAdmin($username,$pass){
   return verifyAdminDB($username,$pass);
}

function setAdminPass($username,$pass,$newpass){
    if (verifyAdmin($username,$pass)) {setAdminPassDB($newpass);return false;}
    else return "Invalid Credentials";
}

function setAdminUserName($username,$pass,$newusername){
    if ($username == $newusername) return false;
    if (verifyAdmin($username,$pass)) {setAdminUserNameDB($newusername);return false;}
    else return "Invalid Credentials";
}

?>