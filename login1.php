<?php
require_once 'config.php';

    $email = $_POST['email'];
    $password = $_POST['password'];
    // $showError = false;

    $stmt = mysqli_prepare($link, "SELECT * FROM `registration` WHERE email = ? AND `conf.password` = ?");
    mysqli_stmt_bind_param($stmt, "ss", $email, $password);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    
    if (mysqli_num_rows($result) > 0) { //if user exist
        header("Location: index.html");
        exit();
    } else {    //User not exist in data base or entered wrong password
        function alert1($message) {
            echo "<script>alert('$message');
            window.location.href='login.html'
            </script>";
        }
        alert1("You are not registered yet or entered worng password!!");
        // $showError = "You are not registered yet or entered wrong password";
    }
    
    mysqli_stmt_close($stmt);
    mysqli_close($link);
?>