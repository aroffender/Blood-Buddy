<?php
    $db_server="localhost";
    $db_user="root";
    $dp_pass="";
    $db_name="blood manager";
    $conn= "";

    $conn=mysqli_connect($db_server,$db_user,$dp_pass,$db_name);
    if($conn){
        echo "You are connected WITHg ";
        echo $db_name;
    }
    else{
        echo "You are not connected";
    }

?>