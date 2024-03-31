<?php
if(isset($_POST["email"])){
$server = "127.0.0.1";
$username = "root";
$password = "";
$db_name = "registered users";

$link = mysqli_connect($server, $username, $password, $db_name);

if ($link === false) {
    die("ERROR : - connection to this database failed due to" . mysqli_connect_error());
}

if(isset($_POST["cpassword"])) {
    if (isset($_POST["email"])) {
        // Get hidden input value
        $email = $_POST["email"];
        
        $password = $_POST["password"];

    $cpassword = $_POST["cpassword"];
    
    if ($password !== $cpassword) {
        function alert($message)
        {
            echo "<script>
            alert('$message');
            window.location.href= 'forgot-password.php'
            </script>";
        }
        alert("Failed to update because your password and confirm password not match");
    }
    else{
    $sql = "UPDATE `registration` SET 'password'=?, 'conf.password'=? WHERE 'email'=?";
    
    if ($stmt = mysqli_prepare($link, $sql)){
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "sss", $param_password, $param_confpassword , $param_email);
        
        // Set parameters
        $param_password = $password;
        $param_confpassword = $cpassword;
        $param_email = $email;
        
        // Attempt to execute the prepared statement
        if (mysqli_stmt_execute($stmt)) {
            // Records updated successfull function alert($message)
            function alert($message)
            {
                echo "<script>alert('$message');
                window.location.href='index.html'
                </script>";
            }
            alert("YOUR PASSWORD UPDATED SUCCESSFULLY REMEMBER IT FOR FUTURE!!!");
        } else {
            echo "Something went wrong. Please try again later.";
        }
        mysqli_stmt_close($stmt);
    }
}
    
    // Close connection
    mysqli_close($link);
}
}
}
?>
<html>
<head>
<style>
    body{
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            align-items: center;
            min-height: 100vh;
            font-family: "Poppins", sans-serif;
            background: url(https://img.freepik.com/premium-vector/night-scene-empty-road-with-forest-mountain_104785-806.jpg)no-repeat center center/cover;
            color: whitesmoke;
    }
</style>
</head>

<body>
    <h2>Update Record</h2>
    <p>You can update your password and remember for future.</p>
    <form action="send-password-reset.php" method="post">
        <label for="password">Enter New Password : </label>
        <input type="Password" name="password" id="password" required/><br>
        <label for="cpassword">Confirm Password : </label>
        <input type="password" name="cpassword" id="cpassword" required/><br>
        <input type="hidden" name="email" value="<?php echo '$email';?>"/>
        <input type="submit" value="Submit">
        <a href="login1.php">Remember Password?</a>
    </form>
</body>

</html>