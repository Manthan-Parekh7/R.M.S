<?php
    $server = "127.0.0.1";
    $username = "root";
    $password = "";
    $db_name = "registered users";

    $link = mysqli_connect($server , $username , $password , $db_name);

    if($link === false) {
        die("ERROR : - connection to this database failed due to". mysqli_connect_error());
    }

    $email = $_POST['email'];
    $password = $_POST['password'];
    
    $stmt = mysqli_prepare($link, "SELECT * FROM `registration` WHERE email = ? AND `conf.password` = ?");
    mysqli_stmt_bind_param($stmt, "ss", $email, $password);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    
    if (mysqli_num_rows($result) > 0) {
        // header("Location: index.html"); 
        // exit();
    } else {
        echo "<h1>You are not registered yet or you entered the wrong password</h1>";
    }
    
    mysqli_stmt_close($stmt);
    mysqli_close($link);
?>