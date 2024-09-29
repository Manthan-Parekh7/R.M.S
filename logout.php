<?php
if (isset($_GET['eid'])) {
    // Decode the email from the URL
    $email = base64_decode(urldecode($_GET['eid']));

    // Start the session to ensure we have access to session variables
    session_start();

    // Clear all session variables
    $_SESSION = array();

    // Destroy the session
    session_unset(); // Unset session variables
    session_destroy(); // Destroy the session

    // Destroy session cookie (optional but can ensure session termination)
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000, $params["path"], $params["domain"],
            $params["secure"], $params["httponly"]);
    }

    // Clear the cookies if they exist
    if (isset($_COOKIE['email']) && $_COOKIE['email'] === $email) {
        setcookie("email", "", time() - 3600, "/");
        if (isset($_COOKIE['pass'])) {
            setcookie("pass", "", time() - 3600, "/");
        }
    }

    // Redirect the user to the login page with a message
    header("Location: login1.php?message=Your session has expired!! please login again");
    exit();
}
?>
