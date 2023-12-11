<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "blood manager";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$query = "SELECT * FROM approved_donation_request";
$result = mysqli_query($conn, $query);

if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Approved Donation Requests</title>
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

        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
            font-size: 28px;
        }

        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background-color: #fff;
            max-height: 400px;
            overflow-y: auto; 
            display: block; 
        }

        th, td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #4CAF50;
            color: white;
            position: sticky;
            top: 0;
        }

        p {
            color: red;
            text-align: center;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <h2 style="color: #4CAF50;">Approved Donation Requests</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Email</th>
            <th>Contact</th>
            <th>Patient Gender</th>
            <th>Location</th>
            <th>Blood Group</th>
            <th>Transportation Fee</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($result)) : ?>
            <tr>
                <td><?= $row['id']; ?></td>
                <td><?= $row['email']; ?></td>
                <td><?= $row['contact']; ?></td>
                <td><?= $row['patient_gender']; ?></td>
                <td><?= $row['location']; ?></td>
                <td><?= $row['Blood group']; ?></td>
                <td><?= $row['Trasportation fee']; ?></td>
            </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>

<?php

mysqli_close($conn);
?>
