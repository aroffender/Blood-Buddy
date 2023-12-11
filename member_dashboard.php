<?php 

session_start();
if (isset($_SESSION['emailOrRegNo'])) {
    $emailOrRegNo = $_SESSION['emailOrRegNo'];
} else {
    echo "Variable not set in the session.";
}
?>


<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "blood manager";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$memberEmail = $emailOrRegNo;
$sql = "SELECT `Name`, `Times donated` FROM `member` WHERE `Email` = '$memberEmail'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $memberName = $row['Name'];
    $timesDonated = $row['Times donated'];

} else {
    echo "Member not found!";
}

$conn->close();
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Member Dashboard</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f2f2f2;
        }

        .dashboard {
            max-width: 600px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        .welcome-heading {
            font-size: 28px;
            font-weight: bold;
            color: #333;
            margin-bottom: 20px;
        }

        .donation-info {
            background-color: #dff0d8;
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 8px;
            border: 1px solid #d6e9c6;
        }

        .donation-info p {
            margin: 0;
            font-size: 18px;
            color: #3c763d;
        }

        .dashboard-buttons {
            display: flex;
            flex-direction: column;
        }

        .dashboard-buttons button {
            margin-bottom: 15px;
            padding: 12px;
            font-size: 18px;
            cursor: pointer;
            background-color: #337ab7;
            color: #fff;
            border: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .dashboard-buttons button:hover {
            background-color: #286090;
        }
   </style>
</head>



<body>
    <div class="dashboard">       
        <div class="welcome-heading">
            Welcome back, <?php echo $memberName; ?>!
        </div>

        <div class="donation-info">
            <p>You donated <?php echo $timesDonated; ?> bags of blood.</p>
        </div>

        <div class="dashboard-buttons">
            <a href="approved_blood_request.php" class="dashboard-button">Donate Blood</a>
            <a href="approved_event_requests.php" class="dashboard-button">See Upcoming Events</a>
            <a href="blood_request_submission_form.php" class="dashboard-button">Request for Blood</a>
            <a href="blood_donation_varification.php" class="dashboard-button">Request to verify your blood donaiton</a>
            <a href="approval_page_of_receiver.php" class="dashboard-button">varify your donner</a>
        </div>
    </div>
</body>
</html>
