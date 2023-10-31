<?php
session_start();
require_once 'user-utils.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    if(login($email, $password)){
        $data = userInfo($email);
        $_SESSION["email"] = $email;
        $_SESSION["userName"] = $data[1];
        $_SESSION["role"] = $data[3];
        $_SESSION["loggedIn"] = true;
        $_SESSION["message"] = 'Login successful.';
        header("Location: home.php");
        exit;
    }
    $_SESSION["message"] = 'Login credentials does not match.';
    header("Location: login.php"); // Redirect to the login page if not logged in
    exit;
}
?>
