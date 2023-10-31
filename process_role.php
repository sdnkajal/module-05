<?php
session_start();
require_once 'role-utils.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $rolename = $_POST["rolename"];
    $rolename = htmlspecialchars(strtolower($rolename));

    if (uniqueRole($rolename) && is_int(createRole($rolename))) {
        $_SESSION["message"] = 'Role has been created successful. Data saved.';
        header("Location: roles.php"); // Redirect to the login page if not logged in
        exit;
    } else {
        $_SESSION["message"] = 'Role is existed, please try again.';
    }
}
?>