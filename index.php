<?php
    $db_server="localhost";
    $db_user="root";
    $dp_pass="";
    $db_name="blood manager";
    $conn= "";

    $conn=mysqli_connect($db_server,$db_user,$dp_pass,$db_name);
    $sql ="INSERT INTO user(user,password)
            VALUES ('abrarw','xytz')";
    mysqli_query($conn,$sql);       
    mysqli_close($conn);
?>