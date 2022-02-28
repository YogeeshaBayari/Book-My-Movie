<?php
    require('connection.php');
    $sql="Select * from shows";
    $res=mysqli_query($con,$sql);
    while($row=mysqli_fetch_assoc($res)){
        echo $row['T_id'] ." ". $row['M_id']." ". $row['time']; 
    }
?>
