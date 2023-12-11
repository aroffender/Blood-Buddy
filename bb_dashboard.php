

<?php 
session_start();
if (isset($_SESSION['emailOrRegNo'])) {
    $emailOrRegNo = $_SESSION['emailOrRegNo'];

} else {
    echo "Variable not set in the session.";
}
?>



<?php

$db_server = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "blood manager";


$conn = new mysqli($db_server, $db_user, $db_pass, $db_name);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$regnumToRetrieve = $emailOrRegNo; 
$sql = "SELECT Name, blood_bags, event_organized FROM bloodbank WHERE Regnum = $regnumToRetrieve";
$result = $conn->query($sql);


if ($result->num_rows > 0) {

    $row = $result->fetch_assoc();
    $name = $row["Name"];
    $bloodBags = $row["blood_bags"];
    $eventsOrganized = $row["event_organized"];

} else {
    echo "No data found for the specified Regnum in the bloodbank table.";
}

$conn->close();
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .dashboard-container {
            max-width: 800px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
        }

        .welcome-heading {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .action-buttons {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }

        .dashboard-button {
            flex: 0 0 48%;
            padding: 15px;
            text-align: center;
            background-color: #3498db;
            color: #fff;
            text-decoration: none;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .dashboard-button:hover {
            background-color: #2980b9;
        }
    </style>
</head>

<body>

    <div class="dashboard-container">
        <div class="welcome-heading">
        Welcome, <?php echo $name; ?>! You provided <?php echo $bloodBags; ?> bags of blood and arranged <?php echo $eventsOrganized; ?> events.
        </div>
        <div class="action-buttons">
            <a href="event_approval_request_form.php" class="dashboard-button">Arrange event</a>
            <a href="approved_blood_request.php" class="dashboard-button">See donation requests</a>
            <a href="blood_request_submission_form.php" class="dashboard-button">Request for blood</a>
            <a href="approval_page_of_receiver.php" class="dashboard-button">Verify donors request</a>
            <a href="blood_donation_varification.php" class="dashboard-button">Request to verify your blood donation </a>

        </div>
    </div>

</body>

</html>
