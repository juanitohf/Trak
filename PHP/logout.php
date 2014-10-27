<?php


require_once "../assets/common.php";

session_start();
session_destroy();

$_SESSION['Email'] = "";
$_SESSION['Password'] ="";

header("location: ../index.php");



?>