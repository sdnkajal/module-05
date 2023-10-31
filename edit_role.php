<?php

session_start();
require_once 'role-utils.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $rolename = $_POST["rolename"];
    $oldname = $_POST["oldname"];
    $rolename = htmlspecialchars(strtolower($rolename));
    $oldname = htmlspecialchars(strtolower($oldname));

    if(!editRole($rolename, $oldname)) {
        header("Location: roles.php"); // Redirect to the login page if not logged in
        exit;
    } else {
        header("Location: roles.php"); // Redirect to the login page if not logged in
        exit;
    }
}
?>