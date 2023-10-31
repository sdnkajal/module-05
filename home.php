<?php
session_start();
require_once 'user-utils.php';

if (isset($_SESSION["loggedIn"]) && $_SESSION["loggedIn"] === true) {
    $data = null;
    $email = $_SESSION["email"];
    $userName = $_SESSION["userName"];
    $userRole = $_SESSION["role"];
    if ($userRole == 'admin') {
        $data = users();
    }
    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>Home page [<?= $userName ?>]</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
              integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
              crossorigin="anonymous">
    </head>
    </head>
    <body>
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-md-6">
                <h4 class="text-center mt-5 p-2 bg-success text-white"> <?= ucfirst($userRole) ?> Information</h4>
                <ul>
                    <li>Name: <?= $userName ?></li>
                    <li>Email: <?= $email ?></li>
                    <li>Role: <?= $userRole ?></li>
                </ul>
            </div>
            <a href="logout.php" class="btn btn-sm btn-primary">Logout</a>
        </div>
        <hr>



        <?php if ($userRole == 'admin') { ?>
            <a href="roles.php" class="btn btn-sm btn-primary">Role</a>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Role</th>

                </tr>
                </thead>
                <tbody>
                <?php foreach ($data as $row) { ?>
                    <tr>
                        <td><?= $row['name'] ?></td>
                        <td><?= $row['email'] ?></td>
                        <td><?= $row['role'] ?></td>
                        
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        <?php } ?>


    </div>
    </body>
    </html>
    <?php
} else {
    header("Location: login.php");
    exit;
}

/*
 * debnath@iubat.edu,debnath,$2y$10$B/AceHfY8yXn86rBbnt19OiLyh4SOtUf.ydKvx8PCIgpFDldykr2q,user
sanjib@iubat.edu,snajib,$2y$10$9/CvTqzIcPWcpSxQLbpzyOKLkWw.CzqbS5.H2h9dQC0OPNF32e.pW,admin
rana@iubat.edu,rana,$2y$10$pE//bNpFsCp5.mXxjwM7J.Fv.r7hAvJgth7rYWIyRNw3gArxoIQBy,user
raka@iubat.edu,raka,$2y$10$pE//bNpFsCp5.mXxjwM7J.Fv.r7hAvJgth7rYWIyRNw3gArxoIQBy,user
 */