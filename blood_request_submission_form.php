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
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $patient_gender = $_POST['patient_gender'];
    $location = $_POST['location'];
    $blood_group = $_POST['blood_group'];
    $transportation_fee = $_POST['transportation_fee'];

    $insertQuery = "INSERT INTO donation_requests (email, contact, patient_gender, location, `Blood group`, `Trasportation fee`) 
                    VALUES ('$email', '$contact', '$patient_gender', '$location', '$blood_group', '$transportation_fee')";


    if (mysqli_query($conn, $insertQuery)) {
        $success_message = "Blood request submitted successfully!";
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
    <title>Blood Request Form</title>
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
            overflow: hidden;
        }

        .container {
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow-y: auto; 
            max-height: 80vh; 
            width: 400px; 
            margin: 20px; 
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
        <h2>Blood Request Form</h2>

        <?php if (isset($success_message)) : ?>
            <p><?= $success_message; ?></p>
        <?php endif; ?>

        <?php if (isset($error_message)) : ?>
            <p><?= $error_message; ?></p>
        <?php endif; ?>

        <form action="" method="post">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="contact">Contact:</label>
            <input type="tel" id="contact" name="contact" required>

            <label for="patient_gender">Patient Gender:</label>
            <select id="patient_gender" name="patient_gender" required>
                <option value="male">Male</option>
                <option value="female">Female</option>
                <option value="other">Other</option>
            </select>

            <label for="location">Location:</label>
            <input type="text" id="location" name="location" required>

            <label for="blood_group">Blood Group:</label>
            <select id="blood_group" name="blood_group" required>
                <option value="A+">A+</option>
                <option value="A-">A-</option>
                <option value="B+">B+</option>
                <option value="B-">B-</option>
                <option value="AB+">AB+</option>
                <option value="AB-">AB-</option>
                <option value="O+">O+</option>
                <option value="O-">O-</option>
            </select>

            <label for="transportation_fee">Transportation Fee:</label>
            <select id="transportation_fee" name="transportation_fee" required>
                <option value="included">Included</option>
                <option value="not_included">Not Included</option>
            </select>

            <button type="submit">Submit Request</button>
        </form>
    </div>
</body>
</html>


<?php



mysqli_close($conn);
?>
