<?php
session_start();
if (!isset($_SESSION['loggedin']) || isset($_SESSION['loggedin']) != true) {
  header("location: login.php");
  exit;
} ?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Order</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <link rel="stylesheet" href="Style.css">


</head>

<body style="background-color: #abb8ae;">
  <?php require './partials/Header.php' ?>



  <?php
  // Assuming you have a connection to your database
  require './partials/_dbconnect.php';

  // Fetch total number of items
  $sql = "SELECT COUNT(*) as TotalItems FROM `productlist`;";
  $result = $conn->query($sql);
  $row = $result->fetch_assoc();
  $totalItems = $row['TotalItems'];

  // Fetch total number of types
  $sql = "SELECT COUNT(DISTINCT Type) as TotalTypes FROM `productlist`;";
  $result = $conn->query($sql);
  $row = $result->fetch_assoc();
  $totalTypes = $row['TotalTypes'];

  // Display total number of items and types
  echo '<div class="container text-center py-5">';
  echo '<h2>Total Items: ' . $totalItems . '</h2>';
  echo '<h2>Total Categories: ' . $totalTypes . '</h2>';
  echo '</div>';

  // Fetch data from ProductList table
  $sql = "SELECT * FROM `productlist` ORDER BY `Type`;";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    $currentType = '';
    // Output data for each row
    while ($row = $result->fetch_assoc()) {

      if ($currentType != $row["Type"]) {
        if ($currentType != '') {
          // Close previous row and container if not first type
          echo '</div></div>';
        }
        // Start new container and row for new type
        echo '<div class="container"><h2>' . $row["Type"] . '</h2><div class="row">';
        $currentType = $row["Type"];
      }
      // Generate product card
      echo '
            <div class="col-md-4">
                <div class="card my-3" style="width: 18rem;">
                    <img src="./image/product.png" class="card-img-top" alt="Product Image">
                    <div class="card-body">
                        <h5 class="card-title">' . $row["Name"] . '</h5>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
                        </p>
                        <button class="btn btn-success add-to-cart" data-product-id="' . $row["ProductID"] . '">Add to Cart</button>
                    </div>
                </div>
            </div>';
    }
    // Close last row and container
    echo '</div></div>';
  } else {
    echo "No products found";
  }


  $conn->close();
  ?>



</body>

</html>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
  $(document).ready(function() {
    $(".add-to-cart").click(function() {
      var button = $(this);
      var productId = button.data("product-id");
      $.ajax({
        url: "add_to_order.php",
        type: "post",
        data: {
          product_id: productId
        },
        success: function(response) {
          console.log(response)
          console.log(response == "success")
          if (response === "success") {
            button.text("Remove Item");
            button.removeClass("btn-primary");
            button.addClass("btn-danger");


          } else {
            alert("Failed to add item to cart");
          }
        }
      });
    });
  });
</script>

<?php
?>