<html>

<head>
    <title>Staff Registration</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="\classChange.js"></script>
</head>

<body>
    <div class="container">
        <h2><strong>Registration</strong></h2>
        <div class="panel panel-primary" style="box-shadow:0px 0px 2px 2px #888888;">
            <div class="panel-heading">Staff Registration</div>
            <div class="panel-body">
                <form method="post">
                    <div class="row" style="margin-bottom: 5px;">
                        <div class="input-group" style="margin-bottom:10px; left:25%; width: 50%;">
                            <span class="input-group-addon">ID</span>
                            <input class="form-control" type="number" maxlength="10" name="stfInp1" placeholder="Staff ID" required/>
                        </div>
                    </div>
                    <div class="row" style="margin-bottom:5px;">
                        <div class="input-group" style="margin-bottom:10px; left:25%; width: 50%;">
                            <span class="input-group-addon">
                                <i class="glyphicon glyphicon-user"></i>
                            </span>
                            <input class="form-control" type="text" name="stfInp2" placeholder="Staff Name" required/>
                        </div>
                    </div>
                    <div class="row" style="margin-bottom:5px;">
                        <div class="input-group" style="margin-bottom:10px; left:25%; width: 50%;">
                            <span class="input-group-addon">
                                <i class="glyphicon glyphicon-lock"></i>
                            </span>
                            <input class="form-control" type="password" id="pass1" name="stfInp3" placeholder="Password" required/>
                        </div>
                    </div>
                    <div class="row" style="margin-bottom:5px;">
                        <div class="input-group" style="margin-bottom:10px; left:25%; width: 50%;">
                            <span class="input-group-addon">
                                <i class="glyphicon glyphicon-lock"></i>
                            </span>
                            <div class="has-error" id="inpStyle">
                                <input class="form-control" onkeyup="script1()" id="pass2" type="password" name="stfInp6" placeholder="Re Enter Above Password"
                                    required/>
                            </div>
                        </div>
                    </div>
                    <div class="row" style="margin-bottom:5px;">
                        <div class="input-group" style="margin-bottom:10px; left:25%; width: 50%;">
                            <span class="input-group-addon">
                                <i class="glyphicon glyphicon-phone"></i>
                            </span>
                            <input class="form-control" type="number" maxlength="10" name="stfInp4" placeholder="Phone Number" required/>
                        </div>
                    </div>
                    <div class="row" style="margin-bottom:5px;">
                        <div class="input-group" style="margin-bottom:10px; left:25%; width: 50%;">
                            <span class="input-group-addon">
                                <i class="glyphicon glyphicon-home"></i>
                            </span>
                            <input class="form-control" type="text" name="stfInp5" placeholder="Address" required/>
                        </div>
                    </div>
                    <div class="row">
                        <button type="submit" class="btn btn-primary center-block" style="width: 25%;">Register</button>
                    </div>
                </form>
            </div>
        </div>
            <?php
                $submit = $_POST;
                if($submit) {
                $inputValue1 = $_POST["stfInp1"];
                $inputValue2 = $_POST["stfInp2"];
                $inputValue3 = $_POST["stfInp3"];
                $inputValue4 = $_POST["stfInp4"];
                $inputValue5 = $_POST["stfInp5"];
                $server = "localhost";
                $user = "root";
                $pass = "1234";
                $db = "MedicineManagement";
                $conn = mysqli_connect($server,$user,$pass,$db);
                $query = "insert into Staff_Details values('".$inputValue1."','".$inputValue2."','".$inputValue3."','".$inputValue4."','".$inputValue5."')";
                if (mysqli_query($conn, $query)) {
                    echo "<h1>New record created successfully</h1>";
                } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }
                
                mysqli_close($conn);
                }
        ?>
</body>

</html>