<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOME</title>
</head>

<body>
    <?php
    session_start();
    if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
        echo `
<a href="signup.php">signup</a>   
<a href="login.php">login</a> `;
    }
    else{
        echo `
        
        <a href="home.php">Dashboard</a>
        `
        ;
    }

    ?>
<a href="login.php">login</a>
<a href="signup.php">signup</a>
<a href="home.php">dashboard</a>
    <h1>
        WELCOME
    </h1>
</body>

</html>