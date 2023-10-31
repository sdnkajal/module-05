<?php
session_start();
require_once 'user-utils.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Validate and sanitize the input data (you should perform more robust validation)
    $username = htmlspecialchars($username);
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    $password = password_hash($password, PASSWORD_DEFAULT);

    if (uniqueEmail($email) && is_int(userCreate($email,$username,$password))) {
        $_SESSION["message"] = 'Registration successful. Data saved.';
        header("Location: login.php"); // Redirect to the login page if not logged in
        exit;

    } else {
        $_SESSION["message"] = 'Email is existed, please try again.';
    }
}
?>