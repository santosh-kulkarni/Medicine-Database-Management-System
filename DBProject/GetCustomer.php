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
  <title>Sale Medicine</title>
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
        <li>
          <a href="HomeMedicine.php">
            <strong>Home</strong>
          </a>
        </li>
        <li class="active">
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
      <form method="post">
        <h3 class="text-center"> Enter the Customer ID and Doctor ID to Continue <h3>
        <div class="row" style="margin-bottom: 6px;">
          <input type="number" list="cname" name="cinp1" class="form-control" style="position:absolute; width :50%; left : 25%;" placeholder="Customer ID"/>
          <datalist id="cname">
            <?php
                  $server = "localhost";
                  $user = "root";
                  $pass = "1234";
                  $db = "MedicineManagement";
                  $conn1 = mysqli_connect($server,$user,$pass,$db);
                  $query = "select * from customer";
                  $result = mysqli_query($conn1,$query);
                  while($row = mysqli_fetch_array($result)) {
                      echo '<option value="'.$row["id"].'" label="'.$row["name"].'">';
                  }
              ?>
        </div>
        <div class="row" style="margin-bottom: 6px;">
        <input type="number" list="dname" name="cinp2" class="form-control" style="position:absolute; width: 50%; left:25%; top: 25%;" placeholder="Doctor ID"/>
        <datalist id="dname">
            <?php
                  $server = "localhost";
                  $user = "root";
                  $pass = "1234";
                  $db = "MedicineManagement";
                  $conn1 = mysqli_connect($server,$user,$pass,$db);
                  $query = "select * from doctor";
                  $result = mysqli_query($conn1,$query);
                  while($row = mysqli_fetch_array($result)) {
                      echo '<option value="'.$row["id"].'" label="'.$row["name"].'">';
                  }
              ?>
        </div>
        <div class="row" style="margin-bottom: 6px;">
        <button type="submit" style=" position:absolute; top :31%; left : 45%;" class="btn btn-lg btn-primary center-block">Continue</button>
      </div>
</form>
  	    <h3 class="text-center" style="position:absolute; top: 37%; left:37%;" id="print"></h3>
<?php
    $submit = $_POST;
    if($submit) {
        $val1 = $_POST["cinp1"];
        $val2 = $_POST["cinp2"];
        $server = "localhost";
        $user = "root";
        $pass = "1234";
        $db = "MedicineManagement";
        $conn = mysqli_connect($server,$user,$pass,$db);
        $query = "select * from customer";
        $result = mysqli_query($conn,$query);
        $found = 0;
        session_start();
        while($row = mysqli_fetch_array($result)) {
            if($row["id"] == $val1) {
                $_SESSION["cIdName"] = $row["id"];
                $found = $found + 1; 
            }
        }
        $query = "select * from doctor";
        $result = mysqli_query($conn,$query);
        while($row = mysqli_fetch_array($result)) {
          if($row["id"] == $val2) {
              $_SESSION["cDcName"] = $row["id"];
              $found = $found +1; 
          }
        }
        if($found == 2) {
          echo "
              <script>
                  window.location.href='SaleMedicine.php';
              </script>
          ";
        }
        else {
          echo "
          <script>
                document.getElementById('print').innerHTML = 'Invalid Doctor ID or Customer Id';
          </script>
          ";
        }
        $query = "delete from temp";
        $result = mysqli_query($conn,$query);
    }
?>
</body>
</html>