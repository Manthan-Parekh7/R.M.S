<?php
if(isset($_POST['name'])){
    $server = "127.0.0.1";
    $username = "root";
    $password = "";
    $db_name = "registered users";

    $link = mysqli_connect($server , $username , $password , $db_name);

    if($link === false) {
        die("ERROR : - connection to this database failed due to". mysqli_connect_error());
    }
    $name = $_POST['name'];
    $email = $_POST['email']; 
    $password = $_POST['password'];
    $confpassword = $_POST['cpassword'];
    
    if($password !== $confpassword) {
        echo "<h2>Please check the password<h2><br><h2>Confirm password and password must be same.</h2>";
    }
    else{
    $query = mysqli_query($link , "SELECT * FROM `registration` WHERE email = '$email'");
    if(mysqli_num_rows($query) > 0){
        echo "<h1>Email id already in use</h1><br>";
        echo "<h2>Go to login page</h2>";
    }
    else{

    $sql = "INSERT INTO `registered users`.`registration` (`name`, `email`, `password`, `conf.password`, `dt`) VALUES ('$name','$email','$password','$confpassword', current_timestamp());";
    
    if($link->query($sql) == TRUE){
        echo "<h1>Successfully Done Your Registration</h1>";
        echo "<h3>Thank you for Registration!!!</h3>";
        header("Location: index.html"); 
        exit();
    }
    else {
        echo "ERROR : $sql <br> $link->error Data Not Entered";
    }
    }
}
    $link->close();
}
?>