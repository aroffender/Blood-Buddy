<?php

    $db_server="localhost";
    $db_user="root";
    $dp_pass="";
    $db_name="blood manager";
    $conn= "";

    $conn=mysqli_connect($db_server,$db_user,$dp_pass,$db_name);
    if ($_SERVER["REQUEST_METHOD"] == "POST")
     {
        $Email = $_POST["Email"];
        $Password = $_POST["Password"];
        $Name = $_POST["Name"];
        $Address = $_POST["Address"];
        $Age = $_POST["Age"];
        $Phone = $_POST["Phone"];
        $NID = $_POST["NID"];
        $dob = $_POST["dob"];       
        $Bloodgroup = $_POST["Bloodgroup"];        

        $sql = "INSERT INTO Member (Email, Password, Name, Address, Age, Phone, NID,  dob,  Bloodgroup) 
                VALUES ('$Email', '$Password', '$Name', '$Address', '$Age', '$Phone', '$NID', '$dob', '$Bloodgroup' )";

        if ($conn->query($sql) === TRUE) {
            include("sign_up_successfull.html");
        } else {
            
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
     }
    
    mysqli_close($conn);


?>
