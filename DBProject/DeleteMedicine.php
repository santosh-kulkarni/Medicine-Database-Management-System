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
    <title>Delete Medicine</title>
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
            <u>Delete Medicine</u>
        </h2>
        <h3 class="text-center">Enter the Medicine ID to Continue</h3>
        <form method="post">
            <input type="number" class="form-control center-block" name="getMed1" id="getMed1" style="width:50%; margin-bottom:9px;"
                placeholder="Medidicne ID" />
            <button class="btn btn-lg btn-primary center-block" style="margin-bottom:9px;">Delete Medicine</button>
        </form>
        <div class="row">
            <h2 class="text-center" id="deleteid"></h2>
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
            $query1 = "delete from medarrival where med_id=".$_POST["getMed1"];
            $query2 = "select * from medarrival";
            $res = mysqli_query($conn,$query2);
            $found = false;
            while($row = mysqli_fetch_array($res)) {
                if($row["med_id"] == $_POST["getMed1"]) {
                    $found = true;
                }
            }
            if($found == true) {
                if(mysqli_query($conn,$query1)) {
                    echo "
                            <script>
                                document.getElementById('deleteid').innerHTML = 'Deleted Successfully';
                            </script>
                        ";
               }
            }
            else {
                echo "
                <script>
                    document.getElementById('deleteid').innerHTML = 'Medicine Not Found';
                </script>
            ";
            }
        }
    ?>
</body>

</html>