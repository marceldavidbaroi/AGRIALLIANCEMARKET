<?php
session_start();
require './partials/_dbconnect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $phone = $_SESSION['phone'];

    if (isset($_POST['order_id'])) {
        $orderId = $_POST['order_id'];

        // Delete the order from the Orders table
        $sql = "DELETE FROM Orders WHERE id = ? AND phone = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("is", $orderId, $phone);

        if ($stmt->execute()) {
            // Redirect to myOrder.php after successful removal
            header("Location: myOrder.php");
            exit;
        } else {
            echo "Error removing order: " . $stmt->error;
        }

        $stmt->close();
    }
}

$conn->close();
