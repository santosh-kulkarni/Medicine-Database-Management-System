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
    <title>Sale History</title>
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
                <li class="dropdown active">
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
        <h2 class="text-center">
            <u>Sale Histroy</u>
        </h2>
        <h3 class="text-center">Enter the Date to Continue</h3>
        <form method="post">
        <input type="date" class="form-control center-block" name="getName1" id="getName1" style="width:50%; margin-bottom:9px;"
            placeholder="Date of Sale" required/>
        <button class="btn btn-lg btn-primary center-block" style="margin-bottom:9px;">Show History</button>
        </form>
    </div>
    <table class="table table-bordered" style="margin-left:10px; width:98%;">
        <thead>
            <tr>
                <td>Medicine ID</td>
                <td>Medicine Name</td>
                <td>Quintity</td>
                <td>Price</td>
                <td>Customer Id</td>
            </tr>
        </thead>
        <tbody>
            <?php
                $name = $_POST["getName1"];
                $submit = $_POST;
                if($submit) {
                    $server = "localhost";
                    $user = "root";
                    $pass = "1234";
                    $db = "MedicineManagement";
                    $conn = mysqli_connect($server,$user,$pass,$db);
                    $query = "select * from salemedicine";
                    $result = mysqli_query($conn,$query);
                    $done = false;
                    $count = 0;
                    while($row = mysqli_fetch_array($result)) {
                        if($done == false) {
                            echo "<h2 class='text-center'>Date Of Sale : ".$name."</h2>";
                            $done = true;
                        }
                        $date1=date_create($row["date"]);
                        $date2=date_create($name);
                        $diff=date_diff($date1,$date2);
                        $v =  $diff->format("%R%a days");
                        if($v == 0) {
                            $count++;
                            echo "<tr>";
                            echo "<td>".$row["med_id"]."</td>";
                            echo "<td>".$row["med_name"]."</td>";
                            echo "<td>".$row["quantity"]."</td>";
                            echo "<td>".$row["price"]."</td>";
                            echo "<td>".$row["cusid"]."</td>";
                            echo "<tr>";
                        }
                      }
                      if($count == 0) {
                        echo "<h2 class='text-center'>No Records Found</h2>";
                      }
                }
            ?>
        </tbody>
    </table>
</body>

</html>