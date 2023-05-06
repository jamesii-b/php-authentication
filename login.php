<?php
include 'dbConnection.php';
$error = false;
$login = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = $_POST["email"];
    $password = $_POST["password"];

    $sql = "Select * from `userinformation` WHERE Email='$email' and Password='".md5($password)."'";
    echo $hash;
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) == 1 ) {
        $login = true;
        session_start();
        $_SESSION["loggedin"] = true;
        $_SESSION['email'] = $email;
        header("location: home.php");
    }
    else{
        $error=true;

    }
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
    if ($error) {

        echo "<div>
        Invalid email or password
        </div>";
    }
    if ($login) {

        echo "<div>
        You are logged in
        </div>";
    }
    ?>


    <form action="login.php" method="post">
        <label for="">Email here</label>
        <input type="text" name="email" id="">
        <br>
        <label for="">Password here</label>
        <input type="password" name="password" id="">
        <br>
        <button type="submit">LOGIN</button>

    </form>
    <a href="signup.php">
        Click here to signup
    </a>
</body>

</html>