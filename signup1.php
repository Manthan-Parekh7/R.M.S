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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Sign Up</title>
    <link rel="shortcut icon"
        href="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQmUUSo7THCDrJG629AyXKTeQr1Cl-CpU6jgQ4WD63gmZYyrvU6SrKx17XxiIH7D8z7M_w&usqp=CAU">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="signup1.css">
</head>

<body>
<?php
    if($showAlert) {
        echo '
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Alert!!</strong> Password And Confirm Password Do Not Match
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
  </button>
</div>';
    }
    else if($showError) {
        echo '
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!!</strong> Email Id Aleready In Use You Can Directly Log In To Our WebSite
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
  </button>
</div>';
    }
    else if($showSuccess){
        echo '
        <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Successfull!!</strong> Your Registeration Done Successfully You Can Login To Our WebSite
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
  </button>
</div>';
     }
    ?>

    <div class="container1">
        <ul class="navbar">
            <div class="icon">
                <a href="index.html"><i class='bx bxs-home'></i></a>
            </div>
            <div class="login">
                <a href="login1.php">Log In</a>
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
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr       .net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>