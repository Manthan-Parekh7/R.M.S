<?php
if (isset($_POST['email'])) {
    $server = "127.0.0.1";
    $username = "root";
    $password = "";
    $db_name = "registered users";

    $link = mysqli_connect($server, $username, $password, $db_name);

    if ($link === false) {
        die("ERROR : - connection to this database failed due to" . mysqli_connect_error());
    }
}
?>