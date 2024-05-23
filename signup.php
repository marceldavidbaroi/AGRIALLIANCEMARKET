<?php


include "./partials/_dbconnect.php";


$showAlert = false;
$showError = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {


    $username = $_POST["Name"];
    $address = $_POST["Location"];
    $phone = $_POST["Phone"];
    $email = $_POST["Email"];
    $password = $_POST["Password1"];
    $cpassword = $_POST["Password2"];





    //check if the phone number is exist
    $existSql = "SELECT * FROM `users` WHERE `phone`='$phone'";
    $result = mysqli_query($conn, $existSql);
    $numberExistRows = mysqli_num_rows($result);

    if ($numberExistRows > 0) {
        $exist = true;
    } else {
        $exist = false;
    }

    if (($password == $cpassword) && $exist == false) {
        $sql = "INSERT INTO `users`(`name`, `location`, `email`, `phone`, `password`) VALUES ('$username','$address','$email','$phone','$password')";

        $result = mysqli_query($conn, $sql);
        if ($result) {
            $showAlert = true;
        }
    } else {
        $showError = true;
    }
}

//redirect to login page

if ($showAlert) {
    // Redirect to the login page
    header('Location: login.php');
    exit();
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup Page</title>
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

        .container2 {
            /* Replace 'background.jpg' with your image path */
            /* background-image: url('./image/Signup.png');
    background-repeat: no-repeat;
    background-size:cover ; 
    color: white; */
            padding: 30px;
        }
    </style>
</head>

<body style="background-color: #abb8ae;">

    <?php
    if ($showAlert) {
        echo '
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Signin successful!</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
        $showAlert = false;
    }
    if ($showError) {
        echo '
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Password not same or phone number already exist!</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';

        $showError = false;
    }
    ?>

    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-8 center-card">
                <div class="card shadow">
                    <div class="container2">
                        <div class="card-body">
                            <div class="card-body text-center">
                                <h2 class="card-title">Signup</h2>
                            </div>
                            <form action="./signup.php" method="post">
                                <div class="form-group">
                                    <label for="Name">Name</label>
                                    <input type="text" class="form-control" id="Name" placeholder="Enter name" name="Name">
                                </div>
                                <div class="form-group">
                                    <label for="Location">Location</label>
                                    <select class="form-control" id="Location" name="Location">
                                        <option>Select location</option>
                                        <!-- Add your locations here -->
                                        <option value="Barisal Division">Barisal Division</option>
                                        <option value="Chittagong Division">Chittagong Division</option>
                                        <option value="Dhaka Division">Dhaka Division</option>
                                        <option value="Khulna Division">Khulna Division</option>
                                        <option value="Mymensingh Division">Mymensingh Division</option>
                                        <option value="Rajshahi Division">Rajshahi Division</option>
                                        <option value="Rangpur Division">Rangpur Division</option>
                                        <option value="Sylhet Division">Sylhet Division</option>
                                    </select>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="Email1">Email address</label>
                                    <input type="email" class="form-control" id="Email1" aria-describedby="emailHelp" placeholder="Enter email" name="Email">
                                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                                </div>
                                <div class="form-group">
                                    <label for="Phone">Phone Number</label>
                                    <input type="tel" class="form-control" id="Phone" placeholder="Enter phone number" name="Phone">
                                </div>
                                <div class="form-group">
                                    <label for="Password1">Password</label>
                                    <input type="password" class="form-control" id="Password1" placeholder="Password" name="Password1">
                                </div>
                                <div class="form-group">
                                    <label for="Password2">Confirm Password</label>
                                    <input type="password" class="form-control" id="Password2" placeholder="Confirm Password" name="Password2">
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn" style="background-color: #2c4c25; color: white">Submit</button>
                                </div>
                            </form>
                        </div>
                        <div class="card-body text-center">
                            <p>Already have an account? <a href="login.php" style="color: #50443a; font-weight:bold">Login</a></p>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>


</html>