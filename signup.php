 <?php

    $show_alert_created = false;
    $show_alert_exists = false;

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        include 'connection.php';
        $firstName = $_POST["firstName"];
        $lastName = $_POST["lastName"];
        $Email = $_POST["email"];
        $Password = $_POST["password"];
        $cPassword = $_POST["cpassword"];


        $sql = "Select * from userinformation where Email='$Email'";
        $result = mysqli_query($conn, $sql);
        // echo ($result);
        $num_rows = mysqli_num_rows($result);
        if ($num_rows == 0) {

            if ($cPassword == $Password) {
                // echo $firstName, $lastName, $Email, $Password,$cPassword;
                $hash = password_hash($Password, PASSWORD_DEFAULT);
                $sql = "INSERT INTO 'userinformation' ( `firstName`, `lastName`, `Email`, `Password`) VALUES ('$firstName', '$lastName', '$Email', '$hash')";
                $result = mysqli_query($conn, $sql);
                if ($result) {
                    echo "New record created successfully";
                    $show_alert_created = true;
                } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }
            } else {
                echo "password doesn't match";
            }
        } else {
            $show_alert_exists = true;
        }
    }


    ?>


 <!DOCTYPE html>
 <html lang="en">

 <head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Signup</title>
     <style>
         body {
             padding: 20px;
             text-align: center;
         }

         input {
             margin: 20px;
         }
     </style>
 </head>

 <body>
     <?php
        if ($show_alert_created) {
            echo '  <div class="alert_created">
New Account created succesfully. Please login to continue
</div>';
        }
        ?>
     <?php
        if ($show_alert_exists) {
            echo '<div class="alert_exists">
            Your account exists. Please login to continue
        </div>';
        }
        ?>


     <a href="/php/login.php">
         Log In
     </a>
     <div class="container">
         |Signup HERE|
         <br>
         <form action="/php/signup.php" method="post" autocomplete="off">
             Email:
             <input type="email" name="email" id="" autocomplete="off" required>
             <br>
             Password:
             <input type="password" name="password" id="" autocomplete="off" required>
             Confirm your Password:
             <input type="password" name="cpassword" id="" autocomplete="off" required>
             <br>
             FirstName:
             <input type="text" name="firstName" id="" autocomplete="off" required>
             <br>
             LastName:
             <input type="text" name="lastName" id="" autocomplete="off" required>
             <br>
             <button type="submit">Submit</button>
         </form>
 </body>
 </div>

 </html>