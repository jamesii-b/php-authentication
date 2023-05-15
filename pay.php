<?php
include('dbConnection.php');
session_start();
if(!isset($_SESSION['loggedin'])|| $_SESSION['loggedin']!=true){
    header("refresh:0.25;url=login.php");
    exit;
}
echo "you are required to pay";
if($_SERVER['REQUEST_METHOD']='GET'){

    $invoiceNo=time();
    $createdAt=date('Y-M-D H:m:s');
    $sql="INSERT INTO `payment` (`invoiceNumber`, `time`, `Status`) VALUES ($invoiceNo, $createdAt, '0')";
    $result = mysqli_query($conn, $sql);
    
    // echo `$result`;
    if($result){

        echo $result;
        die("error");
    }
}
?>

<body>


    <ul>

        <form action="https://uat.esewa.com.np/epay/main" method="POST">
            <input value="100" name="tAmt" type="hidden">
            <input value="100" name="amt" type="hidden">
            <input value="0" name="txAmt" type="hidden">
            <input value="0" name="psc" type="hidden">
            <input value="0" name="pdc" type="hidden">
            <input value="EPAYTEST" name="scd" type="hidden">
            <input value="ee2c3ca1-696b-4cc5-a6be-2c40d929d453" name="pid" type="hidden">
            <!-- <input value="http://merchant.com.np/page/esewa_payment_success?q=su" type="hidden" name="su"> -->
            <input value="http://localhost/php/successPayment.php" type="hidden" name="su">
            <input value="http://localhost/php/cancelPayment.php" type="hidden" name="fu">
            <input type="image" src="./esewa.jpg" alt=""> 
           
        </form>
    </ul>
    <!-- <img src="/esewa.jpg" alt="">
    <div>
        continue with <img style="display: block;" src="./esewa.jpg" alt="">
    </div> -->

</body>