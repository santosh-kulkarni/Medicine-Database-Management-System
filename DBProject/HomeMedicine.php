<?php
    session_start();
    $name = $_SESSION["username"];
    if($name == "") {
      echo "
          <script>
              window.location.href='\Log_In.php';
          </script>
      ";
    }
?>
<html lang="en">

<head>
  <title>Description</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>
  <nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="HomePage.php">Medicine Management</a>
      </div>
      <ul class="nav navbar-nav">
        <li class="active">
          <a href="HomeMedicine.php">
            <strong>Home</strong>
          </a>
        </li>
        <li>
          <a href="GetCustomer.php">
            <strong>Sale Medicine</strong>
          </a>
        </li>
        <li>
          <a href="AddMedicine.php">
            <strong>Add Medicine</strong>
          </a>
        </li>
        <li>
          <a href="AlertMedicine.php">
            <strong>Alerts</strong>
          </a>
        </li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">
            <strong>Extras</strong>
            <span class="caret"></span>
          </a>
          <ul class="dropdown-menu">
           
            <li>
              <a href="DeleteMedicine.php">
                <strong>Delete Medicine</strong>
              </a>
            </li>
            <li>
              <a href="SaleHistoryMedicine.php">
                <strong>Sale Histroy</strong>
              </a>
            </li>
          </ul>
        </li>
        <li>
          <a href="AboutMedicine.php">
            <strong>About Us</strong>
          </a>
        </li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">
            <span class="glyphicon glyphicon-user"></span>
            <?php
            session_start();
            echo "<strong>".$_SESSION["username"]."</strong>";
        ?>
              <span class="caret"></span>
          </a>
          <ul class="dropdown-menu">
            <li>
              <a href="AddCustomer.php">
                <strong>Add Customer</strong>
              </a>
            </li>
            <li>
              <a href="Log_Out.php">
                <strong>Log Out</strong>
              </a>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </nav>
  <div class="container-fluid" id="demo">
    <img style="height: 63%; width: 1366px; margin-left: -15px;" src="photo2.jpg" alt="cant load"/>
  </div>
  <div class="jumbotron">
      <h1 style="margin-left: 20px;">Medicos</h1>
      <p style="margin-left: 20px;"><strong>Description</strong> - Medicos is a dispensary located in the heart of the city, offering medicines at economical prices to
        the citizens 24X7. We have a humongous database of medicines,hospitals and doctors records. We provide the customer
        with the best discounts and recommendations for first class treatment by some of the best hospitals in the town.
        Our huge library is dynamically updated whenever there is a new medicine or anti-tode introduced in the world of
        medical science. You can access our free to use commercial database to retrieve information about the medical practices,
        doctors, hospitals and the treatment they have to offer. Medicos in a trademark owned by Urban Pharmaceutical pvt.
        ltd.</p>
    </div>
</body>

</html>