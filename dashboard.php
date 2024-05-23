<?php
session_start();
if (!isset($_SESSION['loggedin']) || isset($_SESSION['loggedin']) != true) {
  header("location: login.php");
  exit;
}
?>
<?php
$showAlert = false;
$showError = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {

  include "partials/_dbconnect.php";

  $phone = $_SESSION['phone'];
  $totalPrice = $_SESSION['totalPrice'];



  //$exist=false;

  //check if the phone number is exis
  $existSql = "SELECT * FROM `order` WHERE phone='$phone'";
  $result = mysqli_query($conn, $existSql);
  $numberExistRows = mysqli_num_rows($result);

  if ($numberExistRows > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
      echo "Brand: " . $row["brand"] . " - Item: " . $row["item"] . "Quantity " . $row["quantity"] . "<br>";
    }
  } else {
    echo "0 results";
  }
}
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bootstrap demo</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
</head>

<body style="background-color: #abb8ae;">
  <?php require './partials/Header.php' ?>
  <div class="container2 px-5 py-5 ">
    <h1>Hey there,</h1>
    <h2>Hope you have a nice day!!!!</h2>

  </div>

  <div class=" container" style="height:100vh">
    <?php
    // Assuming you have a connection to your database
    require './partials/_dbconnect.php';

    // Fetch the last three orders from the Orders table
    $sql = "SELECT `Pname`, `Ptype` FROM `Orders` ORDER BY `id` DESC LIMIT 3;";
    $result = $conn->query($sql);

    echo '<div class="row">
    <div class="col-12 py-5">
    <h2 style="text-align: center;">Last Ordered Items</h2>

    <table class="table table-striped" style="width:50%; margin: auto; background-color: white; box-shadow: 0px 0px 10px rgba(0,0,0,0.5); border-radius: 10px;">
    <thead>
                <tr>
                    <th scope="col">Product Name</th>
                    <th scope="col">Type</th>
                </tr>
            </thead>
            <tbody>';


    if ($result->num_rows > 0) {
      // Output data for each row
      while ($row = $result->fetch_assoc()) {
        echo '<tr>
                <td>' . $row["Pname"] . '</td>
                <td>' . $row["Ptype"] . '</td>
              </tr>';
      }
    } else {
      echo '<tr><td colspan="2">No orders found</td></tr>';
    }

    echo '    </tbody>
            </table>
        </div>
    </div>';

    $conn->close();
    ?>


    <!-- Description Section -->

    <div class="container">
      <div class="jumbotron text-center">
        <h1>Welcome to our premier agricultural site</h1>
        <p>Where we blend tradition with innovation to bring you the finest in farm products and services. Our offerings are a testament to our commitment to excellence and sustainability.</p>
      </div>

      <div class="row">
        <div class="col-md-4">
          <h2>Pesticide-Free Animal Feed</h2>
          <p>Our animal feeds are formulated with the utmost care, ensuring that every morsel is free from harmful pesticides. We believe in nurturing livestock the natural way, which is why our feeds are composed of high-quality, organic ingredients that promote health and vitality. With our feed, your animals will not only thrive but also produce the best quality milk and meat.</p>
        </div>
        <div class="col-md-4">
          <h2>Premium Farm Products</h2>
          <p>Dive into the richness of farm-fresh produce with our array of premium products. Our milk is a creamy delight, sourced from contented cows that graze on lush pastures. It's pure, wholesome, and packed with natural goodness. As for our meat, it's the result of ethical farming practices, where animals are raised in stress-free environments, ensuring tender, flavorful cuts every time.</p>
        </div>
        <div class="col-md-4">
          <h2>Sustainable Practices</h2>
          <p>Sustainability is at the heart of what we do. We employ eco-friendly farming techniques that not only yield superior products but also contribute to a healthier planet. From conserving water to enhancing soil fertility, we take every step to ensure our farm's legacy endures for generations.</p>
        </div>
      </div>

      <div class="jumbotron text-center">
        <h2>Join us on a journey to rediscover the true essence of farm-to-table living.</h2>
        <p>Experience the difference that comes with products nurtured by nature and handled with care. Because here, we don't just produce food; we cultivate a lifestyle. </p>
      </div>
    </div>







  </div>

  </main>
  <?php require './partials/Footer.php'; ?>



  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>