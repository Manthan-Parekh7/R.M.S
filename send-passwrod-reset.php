<?php

$server = "127.0.0.1";
$username = "root";
$password = "";
$db_name = "registered users";

$link = mysqli_connect($server , $username , $password , $db_name);

if($link === false) {
    die("ERROR : - connection to this database failed due to". mysqli_connect_error());
}
else{
    echo "welcome";
}

$email = $_POST['email'];

$token = bin2hex(random_bytes(16));

$token_hash = hash("sha256" , $token);

$expiry = date("Y-m-d H:i:s" , time() + 60 * 30);

    $sql = "UPDATE `registration`
            SET reset_token_hash = ?,
                reset_token_expires_at = ?
            WHERE email = ?";

            $stmt = $mysqli->prepare($sql);

            $stmt->bind_param("sss" , $token_hash , $expiry , $email);

            $stmt->execute();
?>