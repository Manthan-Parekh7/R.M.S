<?php
session_start();

if (isset($_GET['eid'])) {
    $email = base64_decode(urldecode($_GET['eid']));
    $_SESSION['username'] = "user_" . md5($email);
    $allSessionVariables = $_SESSION;
    session_unset();
    session_destroy();
    if (isset($_COOKIE['email']) && $_COOKIE['email'] === $email) {
        setcookie("email", "", time() - 3600, "/");
    }
    if (isset($_COOKIE['pass'])) {
        setcookie("pass", "", time() - 3600, "/");
    }
    header("Location: login1.php?message=Your session has expired!! please login again");
    exit();
}
?>
