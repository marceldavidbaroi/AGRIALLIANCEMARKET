<?php
session_start();
if (!isset($_SESSION['loggedin']) || isset($_SESSION['loggedin']) != true) {
    header("location: login.php");
    exit;
}

?>
<?php
session_start();

// Assuming you have a connection to your database
require './partials/_dbconnect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $phone = $_SESSION['phone'];

    // Update the order status in the database for all orders with the same phone number
    $sql = "UPDATE `Orders` SET `status`='confirmed' WHERE `phone` = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $phone);
    $stmt->execute();

    // Redirect back to the orders page
    header("Location: order_success.php");
    exit;
}
?>