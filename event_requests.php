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
    if (isset($_POST['approve'])) {
        $eventId = $_POST['approve'];
        $sql = "SELECT * FROM event WHERE event_id = $eventId";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();    
            $regNo = $row['reg_no'];
            $orgName = $row['Orgname'];
            $eventName = $row['event_name'];
            $contactNo = $row['Contact no.'];
            $location = $row['Location'];
            $date = $row['Date'];
            $time = $row['Time'];


            $insertQuery = "INSERT INTO approved_event (id,reg_no, org_name, event_name, contact, location, date, time) 
                            VALUES ('$eventId','$regNo', '$orgName', '$eventName', '$contactNo', '$location', '$date', '$time')";


            if (mysqli_query($conn, $insertQuery)) {
                $deleteQuery = "DELETE FROM event WHERE event_id = $eventId";
                $updatequery =" UPDATE bloodbank SET event_organized = event_organized + 1 WHERE Regnum = '$regNo'";
                $sort=  "SELECT * FROM `approved_event` ORDER BY `id` DESC";
                mysqli_query($conn, $sort);
                mysqli_query($conn, $deleteQuery);
                mysqli_query($conn, $updatequery);
            }
        }
    } elseif (isset($_POST['delete'])) {
        $eventId = $_POST['delete'];
        $deleteQuery = "DELETE FROM event WHERE event_id = $eventId";
        mysqli_query($conn, $deleteQuery);
    }
}



$sql = "SELECT * FROM event";
$result = $conn->query($sql);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Approval Requests</title>
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
            overflow-y: auto;
            max-height: 400px;
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

        form {
            text-align: center;
        }

        button {
            padding: 8px 16px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-right: 8px;
        }

        button:hover {
            background-color: #45a049;
        }

        .no-events {
            text-align: center;
            color: #777;
        }
    </style>
</head>



<body>
    <h1>Event Approval Requests</h1>
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
                <th>Action</th>
            </tr>
            <?php
            while ($row = $result->fetch_assoc()) :
                ?>
                <tr>
                    <td><?php echo $row['event_id']; ?></td>
                    <td><?php echo $row['reg_no']; ?></td>
                    <td><?php echo $row['Orgname']; ?></td>
                    <td><?php echo $row['event_name']; ?></td>
                    <td><?php echo $row['Contact no.']; ?></td>
                    <td><?php echo $row['Location']; ?></td>
                    <td><?php echo $row['Date']; ?></td>
                    <td><?php echo $row['Time']; ?></td>
                    <td>
                        <form method="post">
                            <button type="submit" name="approve" value="<?php echo $row['event_id']; ?>">Approve</button>
                            <button type="submit" name="delete" value="<?php echo $row['event_id']; ?>">Delete</button>
                        </form>
                    </td>
                </tr>
                <?php
            endwhile;
            ?>
        </table>
    <?php else : ?>
        <p class="no-events">No event approval requests found.</p>
    <?php endif; ?>
</body>
</html>

<?php


mysqli_close($conn);
?>
