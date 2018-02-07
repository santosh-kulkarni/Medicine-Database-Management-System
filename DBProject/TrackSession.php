
<html>
    <head>
        <title>Track Staff Log In Session</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    <body>
        <h3 class="text-center"><u>Staff LogIn Information</u></h3>
        <table class="table table-bordered table responsive" style="margin-left:2%; width:96%;">
            <thead>
                <tr>
                    <td>Staff ID</td>
                    <td>Staff Name</td>
                    <td>Date Of Log In</td>
                    <td>Time Of Log In</td>
                </tr>
            </thead>
            <tbody>
                <?php   
                     $server = "localhost";
                     $user = "root";
                     $pass = "1234";
                     $db = "MedicineManagement";
                     $conn = mysqli_connect($server,$user,$pass,$db);
                     $query = "select * from track";
                     $result = mysqli_query($conn,$query);
                     while($row = mysqli_fetch_array($result)) {
                            echo "<tr>";
                            echo "<td>".$row["stf_id"]."</td>";
                            echo "<td>".$row["name"]."</td>";
                            echo "<td>".$row["date"]."</td>";
                            echo "<td>".$row["time"]."</td>";
                            echo "</tr>";
                     }
                ?>
            </tbody>
        </table>
    </body>
</html>