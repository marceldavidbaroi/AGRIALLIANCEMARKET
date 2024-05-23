<?php
session_start();
if (!isset($_SESSION['loggedin']) || isset($_SESSION['loggedin']) != true) {
    header("location: login.php");
    exit;
}

?>
<?php
require './partials/_dbconnect.php';


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $phone = $_SESSION['phone'];


    if (isset($_POST['product_id'])) {
        $productId = $_POST['product_id'];

        // Fetch product data from productlist table
        $sql = "SELECT `Name`, `Type`, `Price` FROM `productlist` WHERE `ProductID` = ?;";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $productId);
        $stmt->execute();
        $result = $stmt->get_result();
        $product = $result->fetch_assoc();
        // var_dump($product);

        if ($product) {
            // Insert product data and phone into orders table
            $sql = "INSERT INTO Orders (`phone`, `Pname`, `Ptype`, `Pprice`) VALUES (?, ?, ?, ?)";
            // $sql = "INSERT INTO Orders ( `Pname`, `Ptype`, `Pprice`) VALUES (?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sssd", $phone, $product['Name'], $product['Type'], $product['Price']);
            if ($stmt->execute()) {
                echo "success";
            } else {
                echo "Error: " . $stmt->error;
            }
        } else {
            echo "Product not found";
        }

        $stmt->close();
    }
}
$conn->close();
?>
