<?php
$showAlert = false;
$showError = false;
$showSuccess = false;
if (isset($_POST['email'])) {
    $server = "127.0.0.1";
    $username = "root";
    $password = "";
    $db_name = "registered users";

    $link = mysqli_connect($server, $username, $password, $db_name);

    if ($link === false) {
        die("ERROR : - connection to this database failed due to" . mysqli_connect_error());
    }

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confpassword = $_POST['cpassword'];   

    if ($password !== $confpassword) {
        $showAlert = true;
    } else{
        $query = mysqli_query($link, "SELECT * FROM `registration` WHERE email = '$email'");
        if (mysqli_num_rows($query) > 0) {
        $showError = true;
    } else {
        $stmt = mysqli_prepare($link, "INSERT INTO `registration` (`name`, `email`, `password`, `conf.password`, `dt`) VALUES (?, ?, ?, ?, current_timestamp())");

        // Bind parameters to the prepared statement
        mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $password, $confpassword);
        
        // Execute the prepared statement
        if (mysqli_stmt_execute($stmt)) {
            $showSuccess = true;
            } else {
                echo "Facing some technical issue sorry for this inconvinience caused!!";
            }
            // Close the prepared statement
            mysqli_stmt_close($stmt);
        }
    }
    $link->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="shortcut icon"
        href="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQmUUSo7THCDrJG629AyXKTeQr1Cl-CpU6jgQ4WD63gmZYyrvU6SrKx17XxiIH7D8z7M_w&usqp=CAU">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="signup1.css">
</head>

<body>
<?php
    if($showAlert) {
    echo '<h2 id="alert">Alert!!!Password And Confirm Password Do Not Match</h2>';
    }
    else if($showError) {
        echo '<h2 id="error">Error!!!This Email Id Already In use You Should Go To Login Page</h2>';
    }
    else if($showSuccess){
        echo '<h2 id="Success">Successfull!!!Your Registration Successfully Done Now You Can Login On Our Website</h2>';
     }
    ?>

    <div class="container1">
        <ul class="navbar">
            <div class="icon">
                <a href="index.html"><i class='bx bxs-home'></i></a>
            </div>
            <div class="">
                <a href=""></a>
            </div>
            <div class="">
                <a href=""></a>
            </div>
            <div class="">
                <a href=""></a>
            </div>
        </ul>
    </div>
        <div class="box">
            <div class="container">
            <form action="signup1.php" method="post">

                <h1>Sign Up</h1>
                <div class="name">

                    <input type="text" name="name" placeholder="Create User Name" autocomplete="off" required><i class='bx bx-user'></i>
                </div>
                <div class="email">

                    <input type="email" name="email" placeholder="Enter Your Email Address" autocomplete="off" required><i class='bx bxs-envelope'></i>
                </div>
                <div class="password">

                    <input type="password" name="password" placeholder="Create Password" autocomplete="off" required>
                </div>
                <div class="cpassword">

                    <input type="password" name="cpassword" placeholder="Confirm Password" autocomplete="off" required><i class='bx bxs-lock-alt'></i>
                </div>
                <div class="button">
                    <button type="submit">Sign Up</button>
                </div>
                <div class="account">Already Have an Account ?? <a href="login1.php">Log In</a></div>
            </form>
        </div>
    </div>
</body>

</html>