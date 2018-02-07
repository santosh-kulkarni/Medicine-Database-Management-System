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
  <title>Alert Medicine</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body style="margin-top:60px;">
<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="HomePage.php">Medicine Management</a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="HomeMedicine.php"><strong>Home</strong></a></li>
      <li><a href="SaleMedicine.php"><strong>Sale Medicine</strong></a></li>
      <li><a href="AddMedicine.php"><strong>Add Medicine</strong></a></li>
      <li class="active"><a href="AlertMedicine.php"><strong>Alerts</strong></a></li>
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#"><strong>Extras</strong>
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
       
        <li><a href="DeleteMedicine.php"><strong>Delete Medicine</strong></a></li>
        <li><a href="SaleHistoryMedicine.php"><strong>Sale Histroy</strong></a></li>
        </ul>
      </li>
      <li><a href="AboutMedicine.php"><strong>About Us</strong></a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
    <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
        <span class="glyphicon glyphicon-user"></span>
        <?php
            session_start();
            echo "<strong>".$_SESSION["username"]."</strong>";
        ?>
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
        <li><a href="AddCustomer.php"><strong>Add Customer</strong></a></li>
        <li><a href="Log_Out.php"><strong>Log Out</strong></a></li>
        </ul>
      </li>
    </ul>
  </div>
</nav>
<div class="container-fluid" id="demo">
    <h3 class="text-center"><u>Medicines which are less in quantity</u></h3>
    <table class="table table-bordered">
      <thead>
        <tr>
          <td><strong>Medicine ID</strong></td>
          <td><strong>Medicine Name</strong></td>
          <td><strong>Quantity Left</strong></td>
        </tr>
      </thead>
      <tbody>
        <?php
            $server = "localhost";
            $user = "root";
            $pass = "1234";
            $db = "MedicineManagement";
            $conn = mysqli_connect($server,$user,$pass,$db);
            $query = "select * from stockremainder";
            $result = mysqli_query($conn,$query);
            while($row = mysqli_fetch_array($result)) {
              if($row["quantity"] < 33) {
                echo "<tr>";
                echo "<td>".$row["med_id"]."</td>";
                echo "<td>".$row["med_name"]."</td>";
                echo "<td>".$row["quantity"]."</td>";
                echo "<tr>";
              }
            }
        ?>
      </tbody>
    </table>
    <h3 class="text-center"><u>Medicines which are expired</u></h3>
    <table class="table table-bordered">
        <thead>
          <tr>
            <td><strong>Medicine ID</strong></td>
            <td><strong>Medicine Name</strong></td>
            <td><strong>Expiry Date</strong></td>
          </tr>
        </thead>
        <tbody>
        <?php
            $server = "localhost";
            $user = "root";
            $pass = "1234";
            $db = "MedicineManagement";
            $conn = mysqli_connect($server,$user,$pass,$db);
            $query = "select * from medarrival";
            $result = mysqli_query($conn,$query);
            while($row = mysqli_fetch_array($result)) {
              $date1=date_create($row["exp_date"]);
              $date2=date_create(date("Y-m-d"));
              $diff=date_diff($date1,$date2);
              $v =  $diff->format("%R%a days");
              if($v >= 0) {
                echo "<tr>";
                echo "<td>".$row["med_id"]."</td>";
                echo "<td>".$row["med_name"]."</td>";
                echo "<td>".$row["exp_date"]."</td>";
                echo "<tr>";
              }
            }
          ?>
        </tbody>
      </table>
</div>
</body>
</html>
