<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Header</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<body>
  <nav class="navbar navbar-expand-lg " style="background-color: #abb8ae;">
    <div class="container-fluid">
      <a class="navbar-brand" style="color : #335930 bold" href="index.php"><b>AgriAllianceMarket</b> </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">

        <?php
        $current_page = basename($_SERVER['PHP_SELF']);
        ?>
        <ul class="navbar-nav mx-auto">



          <li class="nav-item">
            <a class="nav-link <?php if ($current_page == 'dashboard.php') {
                                  echo 'active';
                                } ?>" aria-current="page" href="dashboard.php">Home</a>
          </li>

          <li class="nav-item">
            <a class="nav-link <?php if ($current_page == 'order.php') {
                                  echo 'active';
                                } ?>" aria-current="page" href="order.php">Shop</a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?php if ($current_page == 'myOrder.php') {
                                  echo 'active';
                                } ?>" aria-current="page" href="myOrder.php">My Cart</a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?php if ($current_page == 'aboutus.php') {
                                  echo 'active';
                                } ?>" aria-current="page" href="aboutus.php">About Us</a>
          </li>




        </ul>
        <!-- <button class="btn me-2 " type="button" style="background-color: #2c4c25; color: white">Main button</button> -->
        <?php
        $current_page = basename($_SERVER['PHP_SELF']);
        if ($current_page == 'index.php') {
          echo '<button class="btn me-2 " type="button" style="background-color: #2c4c25; color: white" onclick="location.href=\'signup.php\'">Signup/Login</button>';
        } else {
          echo '<button class="btn me-2 " type="button" style="background-color: #2c4c25; color: white" onclick = "window.location.href=\'logout.php\';">Logout</button>';
        }

        ?>
      </div>
    </div>
  </nav>

  </nav>

</body>

</html>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>