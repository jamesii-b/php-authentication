<?php
$db='korea';
$servername = "localhost";
$user = "root";
$pass = "";

$conn = new mysqli($servername, $user, $pass,$db);
    if(!$conn){

        echo"failed to connect".$conn->connect_error;
    }else{

        echo"connected succes";
    }
       
?>