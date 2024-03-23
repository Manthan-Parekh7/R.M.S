<?php
if(isset($_POST['email'])){
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
        function alert($message){
            echo "<script>
                alert('$message');
                window.location.href= 'signup.html'
            </script>";
        }
       alert("Failed to register because your password and confirm password not match");
    }
    else{
    $query = mysqli_query($link , "SELECT * FROM `registration` WHERE email = '$email'");
    if(mysqli_num_rows($query) > 0){
        function alert($message) {
            echo "<script>alert('$message');
            window.location.href='login.html'
            </script>";
        }
        alert("Email id already in use sending you at login page!!");
    }
    else{

    $sql = "INSERT INTO `registered users`.`registration` (`name`, `email`, `password`, `conf.password`, `dt`) VALUES ('$name','$email','$password','$confpassword', current_timestamp());";
    
    if($link->query($sql) == TRUE){
        function alert($message){
            echo "<script>alert('$message');
            window.location.href='index.html'
            </script>";
        }
        alert("You are registered successfully , Thank you for registration");
    }
    else {
        echo "ERROR : $sql <br> $link->error Data Not Entered";
    }
    }
}
    $link->close();
}
?>