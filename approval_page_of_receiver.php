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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $emailOrRegNo = $_SESSION['emailOrRegNo'];

    if (isset($_POST['approve'])) {
        $code = $_POST['approve'];

        $sql = "SELECT * FROM varification_req WHERE code = $code";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $sentBy = $row['sent_by'];
            $sentTo = $row['sent_to'];

            $searchMember = "SELECT * FROM member WHERE Email = '$sentTo'";
            $resultMember = $conn->query($searchMember);

            if ($resultMember->num_rows > 0) {
                $updateMember = "UPDATE member SET `Times donated` = `Times donated` + 1 WHERE Email = '$sentBy'";
                $conn->query($updateMember);
            }

            $searchBloodBank = "SELECT * FROM bloodbank WHERE Regnum = '$sentBy'";
            $resultBloodBank = $conn->query($searchBloodBank);

            if ($resultBloodBank->num_rows > 0) {
                $updateBloodBank = "UPDATE bloodbank SET `blood_bags` = `blood_bags` + 1 WHERE Regnum = '$sentBy'";
                $conn->query($updateBloodBank);
            }

            $deleteQuery = "DELETE FROM varification_req WHERE code = $code";
            if ($conn->query($deleteQuery)) {
                $approval_message = "Request approved and row deleted successfully.";
            } else {
                $error_message = "Error deleting row: " . $conn->error;
            }
        }
    } elseif (isset($_POST['delete'])) {
        $code = $_POST['delete'];

        $deleteQuery = "DELETE FROM varification_req WHERE code = $code";
        if ($conn->query($deleteQuery)) {
            $success_message = "Request deleted successfully.";
        } else {
            $error_message = "Error deleting row: " . $conn->error;
        }
    }
}

$selectQuery = "SELECT * FROM varification_req WHERE sent_to = '$emailOrRegNo'";
$result = $conn->query($selectQuery);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verification Requests</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f2f2f2;
        }

        .verification-container {
            max-width: 800px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        .verification-heading {
            font-size: 28px;
            font-weight: bold;
            color: #333;
            margin-bottom: 20px;
        }

        .verification-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .verification-table th, .verification-table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        .verification-table th {
            background-color: #f2f2f2;
        }

        .verification-buttons {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }

        .verification-buttons button {
            padding: 12px;
            font-size: 16px;
            cursor: pointer;
            border: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .verification-buttons button.approve {
            background-color: #5cb85c;
            color: #fff;
        }

        .verification-buttons button.delete {
            background-color: #d9534f;
            color: #fff;
        }

        .message {
            margin-top: 20px;
            padding: 10px;
            border-radius: 5px;
        }

        .success-message {
            background-color: #dff0d8;
            border: 1px solid #d6e9c6;
            color: #3c763d;
        }

        .error-message {
            background-color: #f2dede;
            border: 1px solid #ebccd1;
            color: #a94442;
        }
    </style>
</head>
<body>
    <div class="verification-container">
        <div class="verification-heading">
            Please approve these requests
        </div>

        <?php if (isset($success_message)) : ?>
            <div class="message success-message">
                <?= $success_message; ?>
            </div>
        <?php endif; ?>

        <?php if (isset($error_message)) : ?>
            <div class="message error-message">
                <?= $error_message; ?>
            </div>
        <?php endif; ?>

        <table class="verification-table">
            <thead>
                <tr>
                    <th>Code</th>
                    <th>Sent By</th>
                    <th>Sent To</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()) : ?>
                    <tr>
                        <td><?= $row['code']; ?></td>
                        <td><?= $row['sent_by']; ?></td>
                        <td><?= $row['sent_to']; ?></td>
                        <td>
                            <form method="post" style="display: inline-block;">
                                <button type="submit" name="approve" value="<?= $row['code']; ?>" class="approve">Approve</button>
                            </form>
                            <form method="post" style="display: inline-block;">
                                <button type="submit" name="delete" value="<?= $row['code']; ?>" class="delete">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>
</html>

<?php
$conn->close();
?>
