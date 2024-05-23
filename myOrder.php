<?php
session_start();
if (!isset($_SESSION['loggedin']) || isset($_SESSION['loggedin']) != true) {
    header("location: login.php");
    exit;
}

?>



<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome - </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="Style.css">

</head>

<body style="background-color: #abb8ae;">
    <?php require 'partials/Header.php' ?>
    <!-- Body Part -->
    <div class="container" style="height: auto;">
        <h2 class="py-5">All Orders</h2>
        <!-- Table -->
        <?php

        // Hide PHP warnings
        error_reporting(E_ERROR | E_PARSE);

        session_start();
        if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
            header("location: login.php");
            exit;
        }

        // Assuming you have a connection to your database
        require './partials/_dbconnect.php';

        // Fetch data from Orders table
        $phone = $_SESSION['phone'];
        $sql = "SELECT * FROM `Orders` WHERE `phone` = ?;";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $phone);
        $stmt->execute();
        $result = $stmt->get_result();

        echo '
<table class="table table-striped" style="background-color: white; box-shadow: 0px 0px 10px rgba(0,0,0,0.5); border-radius: 10px;">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Product Name</th>
            <th scope="col">Quantity</th>
            <th scope="col">Price</th>
        </tr>
    </thead>
    <tbody>';
        $totalPrice = 0;

        if ($result->num_rows > 0) {
            // Output data for each row
            while ($row = $result->fetch_assoc()) {
                if (isset($row["id"], $row["Pname"], $row["Pprice"])) {
                    echo '
        <tr>
            <th scope="row">' . $row["id"] . '</th>
            <td>' . $row["Pname"] . '</td>
            <td>1</td>
            <td>$' . $row["Pprice"] . '</td>
            <td>
            <form action="remove_order.php" method="post">
                <input type="hidden" name="order_id" value="' . $row["id"] . '">
                <button type="submit" class="btn btn-danger btn-sm">Remove</button>
            </form>
        </td>
        </tr>
       ';
                    $totalPrice += $row["Pprice"];
                }
            }
        } else {
            echo "No orders found";
        }

        echo '
    </tbody>
    <tfoot>
        <tr>
            <th colspan="3" scope="row">Total</th>
            <td><b>$' . $totalPrice . '</b></td>
            <td>
            <form action="confirm_order.php" method="post">
                <button type="submit" class="btn btn-success btn-sm">Confirm</button>
            </form>
        </td>
        </tr>
    </tfoot>
</table>';
        // Store totalPrice in session
        $_SESSION['totalPrice'] = $totalPrice;

        $stmt->close();
        $conn->close();

        ?>

    </div>

    <?php require 'partials/Footer.php' ?>




</body>

</html>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>