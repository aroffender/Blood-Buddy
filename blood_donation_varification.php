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
    $sentTo = $_POST['sent_to'];
    $insertQuery = "INSERT INTO varification_req (sent_by, sent_to) VALUES ('$emailOrRegNo', '$sentTo')";
    if (mysqli_query($conn, $insertQuery)) {
        $success_message = "Submission successful!";
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
    <title>Email Verification Request</title>
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
        }

        h2 {
            text-align: center;
            color: #333;
            font-size: 24px;
            margin-bottom: 20px;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        label {
            font-weight: bold;
        }

        input {
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
        <h2>Blood donation Verification Request</h2>

        <?php if (isset($success_message)) : ?>
            <p><?= $success_message; ?></p>
        <?php endif; ?>

        <?php if (isset($error_message)) : ?>
            <p><?= $error_message; ?></p>
        <?php endif; ?>

        <form action="" method="post">
            <label for="sent_to">Please provide the email address/ registration number of the user to whom you donated blood.:</label>
            <input type="text" id="sent_to" name="sent_to" required>

            <button type="submit">Submit</button>
        </form>
    </div>
</body>

</html>

<?php


mysqli_close($conn);
?>

