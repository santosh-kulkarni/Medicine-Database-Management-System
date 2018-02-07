<?php
     $server = "localhost";
     $user = "root";
     $pass = "1234";
     $db = "MedicineManagement";
     $conn1 = mysqli_connect($server,$user,$pass,$db);
     $query1 = "select * from temp";
     $result1 = mysqli_query($conn1,$query1);
     while($row = mysqli_fetch_array($result1)) {
         $id = $row["id"];
         $q = $row["quantity"];
         $tmp = "select quantity from stockremainder where med_id = ".$id;
         $res1 = mysqli_query($conn1,$tmp);
         $row1 = mysqli_fetch_array($res1);
         $query2 = "update stockremainder set quantity =".($row1["quantity"]-$row["quantity"])." where med_id=".$id;
         echo $query2;
         $res1 = mysqli_query($conn1,$query2);
     }
     session_start();
     $conn1 = mysqli_connect($server,$user,$pass,$db);
     $query1 = "select * from temp";
     $result1 = mysqli_query($conn1,$query1);
     $ch = false;
     while($row = mysqli_fetch_array($result1)) {
            $query2 = "insert into salemedicine values(".$row["id"].",'".$row["name"]."',".$row["quantity"].",".$row["price"].",'".date("Y-m-d")."',".$_SESSION["cIdName"].",".$_SESSION["cDcName"].",".$_SESSION["userid"].")";
            echo $query2."</br>";
            if(mysqli_query($conn1,$query2)) {
                $ch = true;
                echo "Success"."</br>";
            }       
            else {
                $ch = false;
                echo "<h2>fail".mysqli_error($con)."</br></h2>";
            }
     }
     if($ch == true) {
        echo "
                <script>
                    window.location.href = 'HomeMedicine.php';
                </script>
        ";
     }
     else {
         echo "<h2> Transaction Failed </h1>";
     }
     echo "
        <script>
            window.location.href= 'HomeMedicine.php';
        </script>
     ";
?>