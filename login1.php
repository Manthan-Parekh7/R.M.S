<?php
$showError = false;
if (isset($_POST['email'])) {
    $server = "127.0.0.1";
    $username = "root";
    $password = "";
    $db_name = "registered users";

    $link = mysqli_connect($server, $username, $password, $db_name);

    if ($link === false) {
        die("ERROR : - connection to this database failed due to" . mysqli_connect_error());
    }
    $email = $_POST['email'];
    $password = $_POST['password'];
    $stmt = mysqli_prepare($link, "SELECT * FROM `registration` WHERE email = ? AND `conf.password` = ?");
    mysqli_stmt_bind_param($stmt, "ss", $email, $password);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    
    if (mysqli_num_rows($result) > 0) { //if user exist
        header("Location: index.html");
        exit();
    } else {    //User not exist in data base or entered wrong password
        $showError = true;
    }
    
    mysqli_stmt_close($stmt);
    mysqli_close($link);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Log In</title>
    <link rel="shortcut icon"
        href="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQmUUSo7THCDrJG629AyXKTeQr1Cl-CpU6jgQ4WD63gmZYyrvU6SrKx17XxiIH7D8z7M_w&usqp=CAU">
    <link rel="shortcut icon" href="signup favicon.png" type="image/x-icon">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="login1.css">
</head>

<body>
    <?php
    if($showError) {
        echo '
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!!</strong> You Are Not Registered Yet Or You Entered Wrong Password!!
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
        <div class="wrapper">
            <form action="login1.php" method="post">
                <h1>Login</h1>
                <div class="input-box">
                    <input type="email" name="email" placeholder="Enter Your user email" autocomplete="off" required>
                    <i class='bx bx-user'></i>
                </div>
                <div class="input-box">
                    <input type="password" name="password" placeholder="Enter Your Password" autocomplete="off" required>
                    <i class='bx bx-lock'></i>
                </div>
                <div class="remember-forgot">
                    <label><input type="checkbox" name="remember" id="remember">Remember Me</label>
                    <a href="forgot-password.php" target="_blank">Forgot Password</a>
                </div>
                <button type="submit" class="btn">Login</button>
                <div class="register-link">
                    <p>Don't Have An Account?? <a href="signup1.php">Register</a></p>
                </div>
            </form>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr       .net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>