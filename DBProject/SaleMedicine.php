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
  <script src="printPage.js"></script>
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
      <div class="row" style="margin-bottom: 6px;">
        <div class="col-xs-2">
          <label for="id1">Staff ID</label>
        </div>
        <div class="col-xs-5">
          <input class="form-control" type="number" name="get1" id="get1" placeholder="Staff ID" />
          <?php
          session_start();
          echo "
          <script>
            document.getElementById('get1').value =".$_SESSION["userid"]." ;
          </script>
            ";
          ?>
        </div>
      </div>
      <div class="row" style="margin-bottom: 6px;">
        <div class="col-xs-2">
          <label for="id2">Customer ID</label>
        </div>
        <div class="col-xs-5">
          <input class="form-control" type="text" name="get2" id="get2" placeholder="Customer ID" />
          <?php
          session_start();
          echo "
          <script>
            document.getElementById('get2').value =".$_SESSION["cIdName"].";
          </script>
            ";
          ?>
        </div>
      </div>
      <div class="row" style="margin-bottom: 6px;">
        <div class="col-xs-2">
          <label for="get3">Doctor ID</label>
        </div>
        <div class="col-xs-5">
          <input class="form-control"  type="number" name="get3" id="get3" placeholder="Doctor ID" />
          <?php
          session_start();
          echo "
          <script>
            document.getElementById('get3').value =".$_SESSION["cDcName"].";
          </script>
            ";
          ?>
          </datalist>
        </div>
      </div>
      <div class="row" style="margin-bottom: 6px;">
        <div class="col-xs-2">
          <label for="id">Medicine Name</label>
        </div>
        <div class="col-xs-5">
          <input class="form-control" list="names" type="text" name="get4" id="get4" placeholder="Medicine Name" />
          <datalist id="names">
            <?php
                  $server = "localhost";
                  $user = "root";
                  $pass = "1234";
                  $db = "MedicineManagement";
                  $conn1 = mysqli_connect($server,$user,$pass,$db);
                  $query = "select med_name from medarrival";
                  $result = mysqli_query($conn1,$query);
                  while($row = mysqli_fetch_array($result)) {
                      echo '<option value="'.$row["med_name"].'">';
                  }
              ?>
          </datalist>
        </div>
      </div>
      <div class="row">
        <div class="col-xs-2">
          <label for="qua">Quantity</label>
        </div>
        <div class="col-xs-4">
          <input class="form-control" type="number" name="get5" id="get5" placeholder="Quantity" />
        </div>
        <div class="col-xs-3">
          <button style="width:27%;" class="btn btn-primary">Add</button>
        </div>
      </div>
    </form>
    <table class="table table-bordered">
      <thead>
        <tr>
          <td>
            <strong>Medicine ID</strong>
          </td>
          <td>
            <strong>Medicine Name</strong>
          </td>
          <td>
            <strong>Quantity</strong>
          </td>
          <td>
            <strong>Price</strong>
          </td>
        </tr>
      </thead>
      <tbody>
        <?php
            $name = $_POST["get4"];
            $quan = $_POST["get5"];
            $server = "localhost";
            $user = "root";
            $pass = "1234";
            $db = "MedicineManagement";
            $conn1 = mysqli_connect($server,$user,$pass,$db);
            $query = "select * from stockremainder s  where med_name ='".$name."'";
            $result = mysqli_query($conn1,$query);
            $row = mysqli_fetch_array($result);
            $v = strcmp($name,"");
            if($v != 0) {
            $query = "  insert into temp values(".$row["med_id"].",'".$name."',".$quan.",".$row["price"] * $quan.")";
            mysqli_query($conn1,$query);
            }
            $query = "select * from temp";
            $result = mysqli_query($conn1,$query);
            while($row = mysqli_fetch_array($result)) {     
              echo "<tr>";
              echo "<td>".$row["id"]."</td>";
              echo "<td>".$row["name"]."</td>";
              echo "<td>".$row["quantity"]."</td>";
              echo "<td>".$row["price"]."</td>";
              echo "</tr>";
            }
         ?>
          </tr>
      </tbody>
    </table>
    <?php
       $server = "localhost";
       $user = "root";
       $pass = "1234";
       $db = "MedicineManagement";
       $conn1 = mysqli_connect($server,$user,$pass,$db);
       $query = "select * from temp";
       $result = mysqli_query($conn1,$query);
       $x = 0.0;
       $y = 0;
       while($row = mysqli_fetch_array($result)) {
          $y = $y + $row["price"];
       }

       $x = $y * 0.08 ;
       echo "<h3> SGST : ".($x/2)."</h3>";
       echo "<h3> CGST : ".($x/2)."</h3>";
       echo "<h3> Total : ".($x + $y)."</h3>";
    ?>
  </div>
    <button onClick="someFunction()" class='btn btn-lg btn-primary center-block'> Finish </button>
</body>

</html>