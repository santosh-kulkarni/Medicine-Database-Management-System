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
    <title>About US</title>
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
                <li class="active">
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
        <h1 class="text-center">
            <u>About Us</u>
        </h1>
        <p>
            <img src="santosh.jpg" alt="can't Load" height="25%" width="10%" align="left" style="border-radius : 50%">
            <div class="row">
                <h2>Santosh Kulkarni</h2>
                <h4>Pesit South Campus</h4>
            </div>
        </p>
        <p>
            <img src="userimage.png" alt="can't Load" height="25%" width="10%" align="left" style="border-radius : 50%">
            <div class="row">
                <h2>Samarth Bansal</h2>
                <h4>Pesit South Campus</h4>
            </div>
        </p>
    </div>
</body>

</html>