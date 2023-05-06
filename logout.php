<?php
session_start();
if(!isset($_SESSION["loggedin"])||($_SESSION["loggedin"]!=true)){

header("location:login.php");
exit;

}
session_unset();
session_destroy();
unset($_SESSION["username"]);
unset($_SESSION["password"]);
// header('Refresh: 2; URL = login.php');
header("location:login.php")
?>