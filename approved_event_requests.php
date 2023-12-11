<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "blood manager";

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM approved_event";
$result = $conn->query($sql);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upcoming Events</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        h1 {
            text-align: center;
            color: #333;
            margin-top: 20px;
        }

        table {
            width: 80%;
            margin-top: 20px;
            border-collapse: collapse;
            margin-bottom: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            background-color: #fff;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        .no-events {
            text-align: center;
            color: #777;
        }
    </style>
</head>



<body>
    <h1>UPCOMING EVENTS</h1>
    <?php if ($result->num_rows > 0) : ?>
        <table>
            <tr>
                <th>ID</th>
                <th>Registration Number</th>
                <th>Organization Name</th>
                <th>Event Name</th>
                <th>Contact Number</th>
                <th>Location</th>
                <th>Date</th>
                <th>Time</th>
            </tr>
            <?php
            while ($row = $result->fetch_assoc()) :
                ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['reg_no']; ?></td>
                    <td><?php echo $row['org_name']; ?></td>
                    <td><?php echo $row['event_name']; ?></td>
                    <td><?php echo $row['contact']; ?></td>
                    <td><?php echo $row['location']; ?></td>
                    <td><?php echo $row['date']; ?></td>
                    <td><?php echo $row['time']; ?></td>
                </tr>
                <?php
            endwhile;
            ?>
        </table>
    <?php else : ?>
        <p class="no-events">No upcoming events found.</p>
    <?php endif; ?>
</body>
</html>

<?php


mysqli_close($conn);
?>
