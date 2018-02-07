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
    <title>Add Customer</title>
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
                <li class="dropdown active">
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
        <h2 class="text-center"><u>Add Customer</u></h2>
        <div class="panel panel-info" style="position:absolute; left:25%; width:50%;">
      <div class="panel-heading">Add Medicine</div>
      <div class="panel-body">
        <form method="post">
          <div class="row" style="margin-bottom: 5px;">
            <div class="col-xs-3">
              <label for="id">Customer Id</label>
            </div>
            <div class="col-xs-5">
              <input class="form-control" type="number"  name="inp1" placeholder="Customer Id" required/>
            </div>
          </div>
          <div class="row" style="margin-bottom: 5px;">
            <div class="col-xs-3">
              <label for="name">Customer Name</label>
            </div>
            <div class="col-xs-5">
              <input class="form-control" type="text"  name="inp2" placeholder="Customer Name" required/>
            </div>
          </div>
          <div class="row" style="margin-bottom: 5px;">
            <div class="col-xs-3">
              <label for="date1">Age</label>
            </div>
            <div class="col-xs-5">
              <input class="form-control" type="number"  name="inp3" placeholder="Age" required/>
            </div>
          </div>
          <div class="row" style="margin-bottom: 5px;">
            <div class="col-xs-3">
              <label for="date2">Gender</label>
            </div>
            <div class="col-xs-5">
              <input class="form-control" type="text" list="gender"  name="inp4" placeholder="Gender" required/>
              <datalist id="gender">
                  <option value="Male"></option>
                  <option value="Female"></option>
              </datalist>
            </div>
          </div>
          <div class="row" style="margin-bottom: 5px;">
            <div class="col-xs-3">
              <label for="date3">Mobile Number</label>
            </div>
            <div class="col-xs-5">
              <input class="form-control" type="number" name="inp5" placeholder="Mobile Number" required/>
            </div>
          </div>
          <div class="row" style="margin-bottom: 5px;">
            <button type="submit" class="btn btn-primary" style="position: relative; left : 47.55%;">Add Customer</button>
          </div>
        </form>
        <h3 class="text-center" id="setv"> </h3> 
      </div>
    </div>
    </div>
    <?php
        $submit = $_POST;
        if($submit) {
        $server = "localhost";
        $user = "root";
        $pass = "1234";
        $db = "MedicineManagement";
        $conn = mysqli_connect($server,$user,$pass,$db);
        $query = "insert into customer values(".$_POST["inp1"].",'".$_POST["inp2"]."',".$_POST["inp3"].",'".$_POST["inp4"]."',".$_POST["inp5"].")";
        if(mysqli_query($conn,$query)) {
                echo "
                    <script>
                        document.getElementById('setv').innerHTML = 'Customer Added Successfully';
                    </script>
                ";
        }
        else {
            echo "
            <script>
                document.getElementById('setv').innerHTML = 'Customer ID Exists';
            </script>
        ";
        }
    }
    ?>
</body>
</html>