
<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "blood manager";


$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


function approveRequest($conn, $id) {
    $query = "SELECT * FROM donation_requests WHERE id = $id";
    $result = mysqli_query($conn, $query);

    if ($row = mysqli_fetch_assoc($result)) {
        $insertQuery = "INSERT INTO approved_donation_request (id,email, contact, patient_gender, location, `Blood group`, `Trasportation fee`) 
                        VALUES ($id,'{$row['email']}', {$row['contact']}, '{$row['patient_gender']}', '{$row['location']}', '{$row['Blood group']}', '{$row['Trasportation fee']}')";
        
        if (mysqli_query($conn, $insertQuery)) {
            $deleteQuery = "DELETE FROM donation_requests WHERE id = $id";
            if (mysqli_query($conn, $deleteQuery)) {
                return true;
            }
        }
    }
    return false;
}


function deleteRequest($conn, $id) {
    $query = "DELETE FROM donation_requests WHERE id = $id";
    return mysqli_query($conn, $query);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['approve'])) {
        $id = $_POST['id'];
        if (approveRequest($conn, $id)) {
            header("Location: admin_dashboard.php"); 
        } else {
            $error_message = "Failed to approve request.";
        }
    } elseif (isset($_POST['delete'])) {
        $id = $_POST['id'];
        if (deleteRequest($conn, $id)) {
            header("Location: admin_dashboard.php"); 
        } else {
            $error_message = "Failed to delete request.";
        }
    }
}

$query = "SELECT * FROM donation_requests";
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
    <title>Admin Dashboard</title>
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

        .button-container {
            text-align: center;
        }

        form {
            display: inline-block;
            margin-right: 10px;
        }

        button {
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button.approve-btn {
            background-color: #4CAF50;
            color: white;
        }

        button.delete-btn {
            background-color: #f44336;
            color: white;
        }

        button:hover {
            background-color: #45a049;
        }

        p {
            color: red;
            text-align: center;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <h2 style="color: #4CAF50;">Manage Donation Requests</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Email</th>
            <th>Contact</th>
            <th>Patient Gender</th>
            <th>Location</th>
            <th>Blood Group</th>
            <th>Transportation Fee</th>
            <th>Action</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($result)) : ?>
            <tr id="row<?= $row['id']; ?>">
                <td><?= $row['id']; ?></td>
                <td><?= $row['email']; ?></td>
                <td><?= $row['contact']; ?></td>
                <td><?= $row['patient_gender']; ?></td>
                <td><?= $row['location']; ?></td>
                <td><?= $row['Blood group']; ?></td>
                <td><?= $row['Trasportation fee']; ?></td>
                <td class="button-container">
                    <form method="post" style="display: inline-block;">
                        <input type="hidden" name="id" value="<?= $row['id']; ?>">
                        <button type="submit" name="approve" class="approve-btn">Approve</button>
                    </form>
                    <form method="post" style="display: inline-block;">
                        <input type="hidden" name="id" value="<?= $row['id']; ?>">
                        <button type="submit" name="delete" class="delete-btn">Delete</button>
                    </form>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>

    <?php if (isset($error_message)) : ?>
        <p><?= $error_message; ?></p>
    <?php endif; ?>
</body>
</html>


<?php


mysqli_close($conn);
?>
