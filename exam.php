<?php
include 'dbConnection.php';
session_start();
$email = $_SESSION['email'];
$pay = false;
$sql = "Select * from `userinformation` WHERE Email='$email' and ExamAccess='1'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) == 1) {
    $pay = true;
} else {
    header("location:pay.php");
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    if ($pay) {
        echo "qn.1";
        echo"questions here";
    }
    ?>
</body>

</html>