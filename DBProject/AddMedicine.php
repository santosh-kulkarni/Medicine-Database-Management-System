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
  <title>Add Medicine</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="printPage.js"></script>
</head>

<body style="margin-top:55px;">
  <nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="HomePage.php">Medicine Management</a>
      </div>
      <ul class="nav navbar-nav">
        <li>
          <a href="HomeMedicine.php">
            <strong>Home</strong>
          </a>
        </li>
        <li>
          <a href="GetCustomer.php">
            <strong>Sale Medicine</strong>
          </a>
        </li>
        <li class="active">
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
  <div class="container-fluid">
    <div class="panel panel-info">
      <div class="panel-heading">Add Medicine</div>
      <div class="panel-body">
        <form method="post">
          <div class="row" style="margin-bottom: 5px;">
            <div class="col-xs-2">
              <label for="id">Medicine Id</label>
            </div>
            <div class="col-xs-5">
              <input class="form-control" type="number"  name="inp1" id="inp1" placeholder="Medicine Id" required/>
            </div>
          </div>
          <div class="row" style="margin-bottom: 5px;">
            <div class="col-xs-2">
              <label for="name">Medicine Name</label>
            </div>
            <div class="col-xs-5">
              <input class="form-control" type="text"  name="inp2" id="inp2" placeholder="Medicine Name" required/>
            </div>
          </div>
          <div class="row" style="margin-bottom: 5px;">
            <div class="col-xs-2">
              <label for="date1">Arrival Date</label>
            </div>
            <div class="col-xs-5">
              <input class="form-control" type="date"  name="inp3" id="inp3" placeholder="Arrival Date" required/>
            </div>
          </div>
          
          <div class="row" style="margin-bottom: 5px;">
            <div class="col-xs-2">
              <label for="date2">Manufacture Date</label>
            </div>
            <div class="col-xs-5">
              <input class="form-control" type="date" name="inp4" id="inp4" placeholder="Manufacture Date" required/>
            </div>
          </div>
          <div class="row" style="margin-bottom: 5px;">
            <div class="col-xs-2">
              <label for="date3">Expiry Date</label>
            </div>
            <div class="col-xs-5">
              <input class="form-control" type="date" name="inp5" id="inp5" placeholder="Expiry Date" required/>
            </div>
          </div>
          <div class="row" style="margin-bottom: 5px;">
            <div class="col-xs-2">
              <label for="quantity">Quantity</label>
            </div>
            <div class="col-xs-5">
              <input class="form-control" type="number" name="inp6" id="inp6" placeholder="Quintity" required/>
            </div>
          </div>
          <div class="row" style="margin-bottom: 5px;">
            <div class="col-xs-2">
              <label for="price">Price</label>
            </div>
            <div class="col-xs-5">
              <input class="form-control" type="number" name="inp7" id="inp7" placeholder="Price for one medicine" required/>
            </div>
          </div>
          <div class="row" style="margin-bottom: 5px;">
            <button type="submit" class="btn btn-primary" style="position: relative; left : 44%;">Add Medicine</button>
            
          </div>
        </form>
        <button onClick = "clearFields()" class="btn btn-danger" style="position : absolute; left:52.8%; top: 58.2%;">clear</button>
      </div>
    </div>
  </div>
  <?php
      $submit = $_POST;
      if($submit) {
        $i1 = $_POST["inp1"];
        $i2 = $_POST["inp2"];
        $i3 = $_POST["inp3"];
        $i4 = $_POST["inp4"];
        $i5 = $_POST["inp5"];
        $i6 = $_POST["inp6"];
        $i7 = $_POST["inp7"];
        $server = "localhost";
        $user = "root";
        $pass = "1234";
        $db = "MedicineManagement";
        $conn1 = mysqli_connect($server,$user,$pass,$db);
        $conn2 = mysqli_connect($server,$user,$pass,$db);
        $query = "insert into medarrival values(".$i1.",'".$i2."','".$i3."','".$i4."','".$i5."')";
        if (mysqli_query($conn1, $query)) {
          echo "<h1>New record Added successfully</h1>";
        } else {
          echo "<h1>"."Error: " . $sql . "<br>" . mysqli_error($conn)."</h2>";
        }
        $query = "insert into stockremainder values(".$i1.",".$i6.",".$i7.",'".$i2."')";
        if (mysqli_query($conn2, $query)) {
          echo "";
        } else {
          echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
      }
  ?>
</body>
</html>