<?php 

session_start();


if($_SESSION['SessionType']=="Admin") {







} else {
	header("location:  ../../index.php")
}