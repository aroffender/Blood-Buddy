<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "blood manager";


$conn = new mysqli($servername, $username, $password, $dbname);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['event_id'])) {
        $eventID = $_POST['event_id'];

        $deleteQuery = "DELETE FROM approved_event WHERE id = '$eventID'";

        if (mysqli_query($conn, $deleteQuery)) {
            $success_message = "Event deleted successfully!";
        } else {
            $error_message = "Error: " . mysqli_error($conn);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Event</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f2f2f2;
        }

        .form-container {
            max-width: 400px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        h2 {
            font-size: 24px;
            font-weight: bold;
            color: #333;
            margin-bottom: 20px;
            text-align: center;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 8px;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            box-sizing: border-box;
        }

        button {
            padding: 12px;
            font-size: 18px;
            cursor: pointer;
            background-color: #d9534f;
            color: #fff;
            border: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #c9302c;
        }

        p {
            text-align: center;
            margin-top: 15px;
            color: <?php echo isset($success_message) ? 'green' : 'red'; ?>;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Please give event ID to delete from upcoming event list:</h2>

        <form action="" method="post">
            <label for="event_id">Event ID:</label>
            <input type="text" id="event_id" name="event_id" required>

            <button type="submit">Delete Event</button>
        </form>

        <?php if (isset($success_message) || isset($error_message)) : ?>
            <p><?php echo isset($success_message) ? $success_message : $error_message; ?></p>
        <?php endif; ?>
    </div>
</body>
</html>

<?php


mysqli_close($conn);
?>
