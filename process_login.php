<?php
$db_server="localhost";
$db_user="root";
$dp_pass="";
$db_name="blood manager";

// Create connection
$conn = new mysqli($db_server, $db_user, $dp_pass, $db_name);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to sanitize user inputs
function sanitize_input($input) {
    return htmlspecialchars(stripslashes(trim($input)));
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usertype = sanitize_input($_POST["usertype"]);
    $emailOrRegNo = sanitize_input($_POST["emailOrRegNo"]);
    $dp_pass = sanitize_input($_POST["password"]);

    switch ($usertype) {
        case 'Member':
            $table = 'Member';
            $column1 = 'Email';
            $column2 = 'Password';
            break;
        case 'Bloodbank':
            $table = 'Bloodbank';
            $column1 = 'Regnum';
            $column2 = 'Password';
            break;
        case 'Admin':
            $table = 'Admin';
            $column1 = 'Email';
            $column2 = 'Password';
            break;
        default:
            die("Invalid user usertype");
    }

    // Query to check user credentials
    $sql = "SELECT * FROM $table WHERE $column1 = '$emailOrRegNo' AND $column2 = '$dp_pass'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "Login successful!";
    } else {
        echo "Invalid email/registration number or password.";
    }
}

// Close the database connection
$conn->close();
?>
