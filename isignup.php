<?php

$db_server="localhost";
    $db_user="root";
    $dp_pass="";
    $db_name="blood manager";
    $conn= "";

    $conn=mysqli_connect($db_server,$db_user,$dp_pass,$db_name);

#############################################
   /* $institutionname="Brac";
    $username="bu123";
    $password="1234";
    $address="Mohakhali";
    $mobile="015215323";
    $sql="INSERT INTO institution(name,username,password,address,mobile) 
           VALUES ('aBRAR','AB123','123456','AKDJHF','12345')";
    $sql = "INSERT INTO institution(name, username, password, address, mobile) 
                VALUES ('$institutionname', '$username','$password','$address', '$mobile')";
    mysqli_query($conn,$sql);
*/
###############################################
/*echo "sign up successfull";
$sql="INSERT INTO institution(name,username,password,address,mobile) 
           VALUES ('aBRAR','AB123','123456','AKDJHF','12345')";
mysqli_query($conn,$sql);
*/

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $Name = $_POST["Name"];
        $Regnum = $_POST["Regnum"];
        $Password = $_POST["Password"];
        $Address = $_POST["Address"];
        $Contact = $_POST["Contact"];
        
        
    
        $sql = "INSERT INTO bloodbank (Name, Regnum, Password, Address, Contact) 
                VALUES ('$Name', '$Regnum','$Password','$Address', '$Contact')";
        if ($conn->query($sql) === TRUE) {

        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

##########################################################




    mysqli_close($conn);

?>