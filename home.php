<?php
//after login succedd
session_start();
if(!isset($_SESSION['loggedin'])|| $_SESSION['loggedin']!=true){
    echo"Please login to continue";
    // include'login.php';
    header("refresh:0.5;url=login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
    <a href="welcome.php">Go to home</a>
    <a href="logout.php">Logout</a><br>
    <div>
        Welcome to Dashboard
    </div>
    <a href="exam.php">Take me to exam</a>
</body>
</html>