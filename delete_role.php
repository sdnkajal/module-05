<?php

session_start();
require_once 'role-utils.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $rolename = $_POST["rolename"];
    $rolename = htmlspecialchars(strtolower($rolename));

    if(!deleteRole($rolename)) {
        header("Location: roles.php"); // Redirect to the login page if not logged in
        exit;
    } else {
        header("Location: roles.php"); // Redirect to the login page if not logged in
        exit;
    }
}
?>