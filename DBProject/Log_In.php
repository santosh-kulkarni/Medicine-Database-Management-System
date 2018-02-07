<?php
    session_start();
    $name = $_SESSION["username"];
    if($name != "") {
      echo "
          <script>
              window.location.href='\HomeMedicine.php';
          </script>
      ";
    }
?>
<html>
<head>
    <title>Log In</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body style="margin: 0px;">
    <div class="container-fluid">
        <img class="img-responsive center-block" src="pharmacy2.jpg" alt="Wrong Path" style="height:15%">
        <div class="row" style="margin-top:10px; margin-bottom: 20px;">
		    <div class="col-md-12" style="background:#F5EEE3">
		    	<h3 style="text-align:center;margin-bottom:20px;margin-top:20px;"> Medicine Management System </h3>
                <a href="TrackSession.php" style="position:absolute; top:0%; left:83%;"><h3>Track LogIn Session</h3></a>
		    </div>
        </div>
        <div style="position: absolute;  left: 25%; width:50%; background-color: #f7f7f7; box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);">
            <div>
                <h3 class="text-center"  style="margin-bottom:10px;"> Staff Log In </h3>
            </div>
            <img class="img-responsive center-block" src="userImage.png" alt="Wrong Path" style="height:15%">
            <form method="post">
                <div class="input-group" style="margin-bottom:10px; left: 20%; width: 60%;">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                    <input class="form-control" name="input1"id="input1" type="text" placeholder="Enter your Name" required/>
                </div>
                <div class="input-group" style=" left: 20%; width: 60%; margin-bottom:10px;">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                    <input class="form-control" name="input2" id="input2" type="password" placeholder="Enter your Password" required/>
                </div>
                <button class="btn btn-primary center-block"style=" width:20%;">Log In </button>
                <h4 class="text-center"><Strong><a href="stf_reg.php">Create new account</a></Strong></h4>
            </form>
        </div>
    </div>
        <?php
             $submit = $_POST;
             if($submit) {
                 $inputValue1 = $_POST["input1"];
                 $inputValue2 = $_POST["input2"];
                 $server = "localhost";
                 $user = "root";
                 $pass = "1234";
                 $db = "MedicineManagement";
                 $conn = mysqli_connect($server,$user,$pass,$db);
                 $query = "select * from Staff_Details";
                 $result = mysqli_query($conn,$query);
                 $found = false;
                 session_start();
                 $_SESSION["value"] = 3;
                 while($row = mysqli_fetch_array($result)) {
                     if($row["id"] == $inputValue1) {
                         if($row["pass"] == $inputValue2) {
                             $_SESSION["username"] = $row["name"];
                             $_SESSION["userid"] = $row["id"];
                             $q = "insert into track values(".$row["id"].",curdate(),curtime(),'".$row["name"]."')";
                             mysqli_query($conn,$q);
                             echo "
                                    <script type='text/javascript'>
                                        window.location.href = '\HomePage.php';
                                    </script>
                             ";
                        }
                        else {
                             echo "<h1 style='position: absolute; top:65%; left:40%;'>Wrong Password</h1>";
                        }
                        $found = true;
                    }
                }
                if($found == false) {
                    echo "<h1 style='position: absolute; top:65%; left:40%;'>User Not Found</h1>";
                }
            }
            ?>
</body>
</html>