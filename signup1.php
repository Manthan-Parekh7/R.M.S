<?php
require_once 'config.php';

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confpassword = $_POST['cpassword'];
    $username_error = null;
    $email_error = null;
    $password_error = null;
    $cpassword_error = null;

    if ($password !== $confpassword) {
        function alert($message)
        {
            echo "<script>
                alert('$message');
                window.location.href= 'signup.html'
            </script>";
        }
        alert("Failed to register because your password and confirm password not match");
    } 

    else if(empty(trim($name))){
        echo $username_error = "Field user name is empty";
    }
    else if(empty(trim($email))){
        echo $email_error = "Field email is empty";
    }
    else if(empty(trim($password))){
        echo $password_error = "Field password is empty";
    }
    else if(empty(trim($email))){
        echo $cpassword_error = "Field confirm password is empty";
    }
    else{
        $query = mysqli_query($link, "SELECT * FROM `registration` WHERE email = '$email'");
        if (mysqli_num_rows($query) > 0) {
            function alert($message)
            {
                echo "<script>alert('$message');
            window.location.href='login.html'
            </script>";
            }
            alert("Email id already in use sending you at login page!!");
        } else {
            $stmt = mysqli_prepare($link, "INSERT INTO `registration` (`name`, `email`, `password`, `conf.password`, `dt`) VALUES (?, ?, ?, ?, current_timestamp())");

            // Bind parameters to the prepared statement
            mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $password, $confpassword);

            // Execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                function alert($message)
                {
                    echo "<script>alert('$message');
                window.location.href='index.html'
                </script>";
                }
                alert("You are registered successfully , Thank you for registration");
            } else {
                echo "ERROR: Unable to execute $sql. " . mysqli_error($link);
            }

            // Close the prepared statement
            mysqli_stmt_close($stmt);
        }
    }
    $link->close();
?>
