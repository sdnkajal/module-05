<?php
session_start();
require_once 'user-utils.php';
require_once 'role-utils.php';
if (isset($_SESSION["loggedIn"]) && $_SESSION["loggedIn"] === true && $_SESSION["role"] === 'admin') {
    $data = roles();
    ?>


    <!DOCTYPE html>
    <html>
    <head>
        <title>Role Form</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
              integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
              crossorigin="anonymous">
    </head>
    <body>
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-md-6">
                <h4 class="text-center mt-5 p-2 bg-success text-white">Role Form</h4>
                <form action="process_role.php" method="post">
                    <div class="mb-3">
                        <label for="role" class="form-label">Role Name:</label>
                        <input type="text" class="form-control" name="rolename" required>
                    </div>
                    <input type="submit" value="Role Create">
                </form>
            </div>
        </div>
        <hr>
        <a href="home.php" class="btn btn-sm btn-primary">Home</a>

        <table class="table">
            <thead>
            <tr>
                <th scope="col">Role</th>
                <th scope="col" colspan="2">Action</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($data as $row) { ?>
                <tr>
                    <td><?= $row['name'] ?></td>
                    <td>
                        <a class="btn btn-success btn-sm" href="/role_edit.php?role=<?= $row['name'] ?>">Edit</a>
                    </td>
                    <td>
                        <form action="/delete_role.php" method="post">
                            <input type="text" name="rolename" hidden value="<?= $row['name'] ?>">
                            <input type="submit" value="Delete">
                        </form>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>

    </body>
    </html>

    <?php
} else if (isset($_SESSION["loggedIn"]) && $_SESSION["loggedIn"] === true) {
    header("Location: home.php");
    exit;
} else {
    header("Location: login.php");
    exit;
}

?>