<?php

session_start();

require "Connection.php" ;
require "ComputerAPI.php";


    $db = Connection::getInstance();

$cin=12345678;

addComputer($cin);
