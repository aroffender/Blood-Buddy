<?php

$db_server="localhost";
    $db_user="root";
    $dp_pass="";
    $db_name="blood manager";
    $conn= "";

    $conn=mysqli_connect($db_server,$db_user,$dp_pass,$db_name);


    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $Name = $_POST["Name"];
        $Regnum = $_POST["Regnum"];
        $Password = $_POST["Password"];
        $Address = $_POST["Address"];
        $Contact = $_POST["Contact"];
        
        
    
        $sql = "INSERT INTO bloodbank (Name, Regnum, Password, Address, Contact) 
                VALUES ('$Name', '$Regnum','$Password','$Address', '$Contact')";
        if ($conn->query($sql) === TRUE) {
            include("sign_up_successfull.html");
        } else {
            echo "error";
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    mysqli_close($conn);

?>