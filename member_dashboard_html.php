<?php 

session_start();
if (isset($_SESSION['emailOrRegNo'])) {
    $emailOrRegNo = $_SESSION['emailOrRegNo'];
} else {
    echo "Variable not set in the session.";
}
?>


<?php 

$db_server="localhost";
$db_user="root";
$dp_pass="";
$db_name="blood manager";
$conn= "";


$conn=mysqli_connect($db_server,$db_user,$dp_pass,$db_name);
if($conn){
}
else{
    echo "You are not connected";
}
include("process_login.php");
$sql = "SELECT Name, `Times donated` FROM member WHERE Email = '$emailOrRegNo'"; 
$result = $conn->query($sql);

if ($result->num_rows > 0) {
while ($row = $result->fetch_assoc()) {
    $username = $row["Name"];
    $donationCount = $row["Times donated"];    
}
} else {
echo "0 results";
}
$conn->close();



?>
<!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>User Dashboard</title>
     <style>
         body {
             margin: 0;
             padding: 0;
             font-family: 'Arial', sans-serif;
             background-color: #f4f4f4;
             color: #333;
         }
 
         .container {
             max-width: 800px;
             margin: 20px auto;
             background-color: #fff;
             padding: 20px;
             box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
         }
 
         .headline {
             font-size: 24px;
             margin-bottom: 20px;
         }
 
         .congratulation-box {
             background-color: #f00;
             color: #fff;
             padding: 20px;
             border-radius: 8px;
             margin-bottom: 20px;
         }
 
         .dashboard-buttons {
             display: flex;
             justify-content: space-between;
         }
 
         .dashboard-button {
             flex: 1;
             background-color: #007bff;
             color: #fff;
             padding: 20px;
             margin: 0 10px;
             text-align: center;
             text-decoration: none;
             border-radius: 8px;
             transition: background-color 0.3s ease;
         }
 
         .dashboard-button:hover {
             background-color: #0056b3;
         }
 
         .change-password {
             margin-top: 20px;
             text-align: center;
         }
     </style>
 </head>
 <body>
     <div class="container">        
         <div class="headline">
             Welcome back, <span id="username"><?php echo $username; ?></span>
         </div>
         <div class="congratulation-box">
             Congratulations! You donated <span id="donationCount"><?php echo $donationCount; ?></span> bags of blood.
         </div>
         <div class="dashboard-buttons">
             <a href="approved_blood_request.php" class="dashboard-button">nate Blood</a>
             <a href="#" class="dashboard-button">See Upcoming Events</a>
             <a href="#" class="dashboard-button">Receive Blood</a>
         </div>
         <div class="change-password">
             <a href="#" id="changePasswordLink">Change Password</a>
         </div>
     </div>
 </body>
 </html>
 
