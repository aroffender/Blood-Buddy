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

function sanitize_input($input) {
    return htmlspecialchars(stripslashes(trim($input)));
}

$adminEmail = $emailOrRegNo;

$sql = "SELECT `Name` FROM `admin` WHERE `Email` = '$adminEmail'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $adminName = $row['Name'];
} else {
    $adminName = "Unknown Admin";
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #ecf0f1;
        }

        .dashboard {
            width: 80%;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .welcome-heading {
            font-size: 24px;
            margin-bottom: 20px;
            color: #3498db;
            text-align: center;
        }

        .button-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
        }

        .dashboard-button {
            background-color: #3498db;
            color: #fff;
            padding: 15px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 18px;
            transition: background-color 0.3s;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .dashboard-button:hover {
            background-color: #2980b9;
        }

        .additional-options {
            margin-top: 30px;
            border-top: 2px solid #3498db;
            padding-top: 20px;
            text-align: center;
        }

        .dashboard-button.additional {
            background-color: #e74c3c;
            margin-bottom: 10px; 
        }

        .dashboard-button.additional:hover {
            background-color: #c0392b;
        }
    </style>
</head>
<body>
    <div class="dashboard">
        <div class="welcome-heading">
            You are logged in into admin page as <?php echo $adminName; ?>.
        </div>

        <div class="button-container">
            <a href="event_requests.php" class="dashboard-button">Requests of event approval</a>
            <a href="blood_request.php" class="dashboard-button">Requests of blood seekers</a>
            <a href="delete_from_upcoming_event_list.php" class="dashboard-button">Delete event from upcoming list</a>
            
            <div class="additional-options">
                
            </div>
        </div>
    </div>
</body>
</html>
