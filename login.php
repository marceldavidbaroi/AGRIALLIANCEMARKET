<?php
$login = false;
$showError = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    include "partials/_dbconnect.php";
    $phone = $_POST["phone"];
    $password = $_POST["password"];



    $sql = "SELECT * FROM `users` WHERE `phone`='$phone' AND `password`='$password'; ";

    $result = mysqli_query($conn, $sql);

    $num = mysqli_num_rows($result);
    if ($num == 1) {
        $login = true;
        session_start();
        $_SESSION['loggedin'] = true;
        $_SESSION['phone'] = $phone;
        header("location: dashboard.php");
    } else {
        $showError = true;
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .center-card {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .shadow {
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        }
    </style>
</head>

<body style="background-color: #abb8ae;">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-8 center-card">
                <div class="card shadow">
                    <div class="card-body">
                        <div class="card-body text-center">
                            <h2 class="card-title">Login</h2>
                        </div>
                        <form action="./login.php" method="post">
                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <input type="tel" class="form-control" id="exampleInputEmail1" placeholder="Phone" name="phone">

                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Password</label>
                                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn " style="background-color: #2c4c25; color: white">Login</button>
                            </div>

                            <div class="card-body text-center">
                                <p>Don't have an account? <a href="signup.php" style="color: #50443a; font-weight:bold">Signin</a></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>


</html>