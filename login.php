<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <div class="row justify-content-md-center">
        <div class="col-md-6">
            <h4 class="text-center mt-5 p-2 bg-success text-white">Login</h4>
            <form action="process_login.php" method="post">
                <div class="mb-3">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" class="form-control" name="email" required>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password:</label>
                    <input type="password" class="form-control" name="password" required>
                </div>

                <input type="submit" value="Login">
            </form>
            <p class="text-center">
                <a href="registration.php" >Go to Registration page</a>
            </p>

        </div>
    </div>
</div>
</body>
</html>