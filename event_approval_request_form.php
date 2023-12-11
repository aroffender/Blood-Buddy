<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "blood manager";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $reg_no = $_POST['reg_no'];
    $org_name = $_POST['org_name'];
    $event_name = $_POST['event_name'];
    $contact_no = $_POST['contact_no'];
    $location = $_POST['location'];
    $date = $_POST['date'];
    $time = $_POST['time'];


    $insertQuery = "INSERT INTO event (reg_no, Orgname, event_name, `Contact no.`, Location, Date, Time) 
                    VALUES ('$reg_no', '$org_name', '$event_name', '$contact_no', '$location', '$date', '$time')";

    if (mysqli_query($conn, $insertQuery)) {
        $success_message = "Event request submitted successfully!";
    } else {
        $error_message = "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Request Form</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .container {
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            max-width: 600px;
            width: 100%;
        }

        h2 {
            text-align: center;
            color: #333;
            font-size: 24px;
            margin-bottom: 20px;
        }

        form {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 15px;
        }

        label {
            font-weight: bold;
        }

        input,
        select {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            width: 100%;
        }

        button {
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #45a049;
        }

        p {
            color: <?= isset($success_message) ? 'green' : 'red'; ?>;
            text-align: center;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Event Request Form</h2>

        <?php if (isset($success_message)) : ?>
            <p><?= $success_message; ?></p>
        <?php endif; ?>

        <?php if (isset($error_message)) : ?>
            <p><?= $error_message; ?></p>
        <?php endif; ?>

        <form action="" method="post">
            <label for="reg_no">Registration Number:</label>
            <input type="text" id="reg_no" name="reg_no" required>

            <label for="org_name">Organization Name:</label>
            <input type="text" id="org_name" name="org_name" required>

            <label for="event_name">Event Name:</label>
            <input type="text" id="event_name" name="event_name" required>

            <label for="contact_no">Contact Number:</label>
            <input type="tel" id="contact_no" name="contact_no" required>

            <label for="location">Location:</label>
            <input type="text" id="location" name="location" required>

            <label for="date">Date:</label>
            <input type="date" id="date" name="date" required>

            <label for="time">Time:</label>
            <input type="time" id="time" name="time" required>

            <button type="submit">Submit Request</button>
        </form>
    </div>
</body>
</html>

<?php


mysqli_close($conn);
?>
